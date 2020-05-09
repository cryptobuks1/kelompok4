<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Luthier\MiddlewareInterface;
use Rakit\Validation\Validator;
use PHPassLib\Hash\BCrypt;

class EPaymentAuthException extends \Exception{

}

class EPaymentPINAuth implements MiddlewareInterface{
	private $validator;

	public function __construct(){
		$this->validator = new Validator([
			'required' => ':attribute Harus diisi',
			'email' => 'Email tidak valid',
			'min' => ':attribute Minimal :min karakter',
			'max' => ':attribute Maksimal :max karakter',
		]);

	}

	public function run($args){
		$ci = ci();
		$ci->load->model("user/payment/User_Payment");
		$username = $ci->input->post("username");
		$pin = $ci->input->post("pin");

		$validation = $this->validator->make($ci->input->post(), [
			'username' => 'required|min:5|max:12',
			'pin' => 'required|min:3|max:255'
		]);
		$validation->validate();
		if($validation->fails()){
			response(406, 
				["content_type" => 
							["type" => 'application/json', "encoding" =>'utf-8'], 
				"output" => json_encode(["msg" => $validation->errors()->all()])])->_display();
			
			exit;
		}else{
			//Gonna use Try/Except avoid long typing, because I'm tired
			try{
				//Check if user is really exist in database
				$fetch = $ci->User_Payment::select("username")->where("username", "=", $username)->first();
				if($fetch == NULL) throw new EPaymentAuthException("Username tidak ditemukan!");

				//Pass the pin
				$pinDb = $ci->User_Payment::select("pin")->where("username", "=", $username)->first();
				if($pinDb == NULL){ 
					throw new EPaymentAuthException("Pin belum diset");
				}else{
					//Try to compare
					$pinL = $pinDb->pin;
					if(BCrypt::verify($pin, $pinL)){
						//Can Continue
					}else{
						throw new EPaymentAuthException("Pin salah");
					}
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
}


