<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Rakit\Validation\Validator;

class EwalletReload extends CI_Controller{

	private $validator;

	public function __construct(){
		parent::__construct();
		$this->load->helper('response');
		$this->validator = new Validator([
			'required' => ':attribute Harus diisi',
			'required_with' => ':attribute & :attribute harus diisi',
			'min' => ':attribute Minimal :min karakter',
			'max' => ':attribute Maksimal :max karakter',
		]);
		$this->load->model("user/payment/User_Payment");
		$this->load->model("user/account/User_Details");
		$this->load->model("user/payment/PaymentHistoryMaker");
	}

	public function reloadWallet(){
		$inputs = json_decode($this->security->xss_clean($this->input->raw_input_stream), TRUE);

		$validation = $this->validator->make($inputs, [
			'nomor_hp' => 'required|min:9|max:17',
			'nominal' => 'required|min:4|integer',
			'pin' => 'required|integer|min:6'
		]);


		$validation->validate();
		if($validation->fails()){
			response(400, 
			["content_type" => 
						["type" => 'application/json', "encoding" =>'utf-8'], 
			"output" => json_encode(["msg" => $validation->errors()->all()])])->_display();
			exit;
		}else{
			$userExist = $this->User_Details::where('nomor_hp', '=', $inputs['nomor_hp'])->first();
			try{
				if($userExist != null){
					if($userExist->ewallet_activated != 0){
						$userWallet = $this->User_Payment::where('username', '=', $userExist->username)->first();
						if($userWallet != null){
							if(((int)$inputs['nominal']) <= 0){
								throw new Exception("Nomimal dilarang dibawah samadengan 0");
							}
							$getCurrentWallet = ((int)$userWallet->remain_balance) + ((int)$inputs['nominal']);
								
							$this->User_Payment::where('username', '=', $userExist->username)->update(['remain_balance' => $getCurrentWallet]);
							$keyTrx = bin2hex($this->encryption->create_key(16));

							$trxCreator = $this->PaymentHistoryMaker::create([
								'trx_number' => $keyTrx,
								'trx_type' => 1,
								'trx_time' => date('Y-m-d H:i:s')
							]);

							if($trxCreator->save()){
								$text = "Penambahan saldo ke akun ".$inputs['nomor_hp']." sebesar Rp.".$inputs['nominal'].", Telah berhasil dilakukan. Nomor Ref : ".$keyTrx;
								response(200, 
								["content_type" => 
											["type" => 'application/json', "encoding" =>'utf-8'], 
								"output" => json_encode(["msg" => $text])])->_display();
								exit;
							}
						}else{	
							throw new Exception("User tidak ada pada E-Wallet");
						}
					}else{
						throw new Exception("User belum mengaktifasi E-Wallet");
					}
				}else{
					throw new Exception("User tidak ditemukan");
				}
			}catch(\Exception $e){
				response(400, 
				["content_type" => 
							["type" => 'application/json', "encoding" =>'utf-8'], 
				"output" => json_encode(["msg" => $e->getMessage()])])->_display();
				exit;
			}
		}

	}
}