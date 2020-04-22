<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Rakit\Validation\Validator;
use PHPassLib\Hash\BCrypt;

class EwalletProvider extends CI_Controller{

	private $validator;

	public function __construct(){
		parent::__construct();
		$this->load->model("user/payment/User_Payment");
		$this->load->helper('response');
		$this->validator = new Validator([
			'required' => ':attribute Harus diisi',
			'email' => 'Email tidak valid',
			'min' => ':attribute Minimal :min karakter',
			'max' => ':attribute Maksimal :max karakter',
		]);
	}

	public function getSaldo(){
		$username = $this->input->get("username");
		$saldo = $this->User_Payment::select('remain_balance')->where("username", "=", $username)->first();
		
		response(200, 
				["content_type" => 
							["type" => 'application/json', "encoding" =>'utf-8'], 
				"output" => json_encode(["balance" => $saldo->remain_balance])])->_display();
		exit;
	}

	public function changePIN(){
		$username = $this->input->post("username");
		$oldpin = $this->input->post("pin");
		$newpin = $this->input->post("newpin");

		$validation = $this->validator->make($this->input->post(), [
			'username' => 'required|min:5|max:12',
			'pin' => 'required|min:6|max:255',
			'newpin' => 'required|min:6|max:255'
		]);

		$validation->validate();
		if($validation->fails()){
			response(406, 
				["content_type" => 
							["type" => 'application/json', "encoding" =>'utf-8'], 
				"output" => json_encode(["msg" => $validation->errors()->all()])])->_display();
			
			exit;
		}

		if($username !== $this->input->post("username")){
			response(200, 
					["content_type" => 
								["type" => 'application/json', "encoding" =>'utf-8'], 
					"output" => json_encode(["msg" => "Username tidak valid"])])->_display();
			exit;
		}

		try{
			$catcher = $this->User_Payment::select('pin')->where("username", "=", $username)->first();
			if($catcher == null) throw new EPaymentAuthException("Terjadi Error !");

			$grabPin = $catcher->pin;



			//Cocokkan dengan yang lama
			if(BCrypt::verify($oldpin, $grabPin)){

				//Eits, jangan samakan pin lama dengan yang baru
				if($oldpin == $newpin){
					throw new EPaymentAuthException("Pin baru tidak boleh sama dengan Pin lama");
				}

				//Ganti Pinnya
				$this->User_Payment::where("username", "=", $username)->update(['pin' => BCrypt::hash($newpin, ['rounds' => 16])]);
				response(200, 
						["content_type" => 
									["type" => 'application/json', "encoding" =>'utf-8'], 
						"output" => json_encode(["msg" => "Pin berhasil diganti"])])->_display();
				exit;		
			}else{
				//Pin salah
				throw new EPaymentAuthException("Pin tidak valid");
			}

		}catch(Exception $e){
			response(406, 
				["content_type" => 
							["type" => 'application/json', "encoding" =>'utf-8'], 
				"output" => json_encode(["msg" => $e->getMessage()])])->_display();
			exit;
		}

	}
}