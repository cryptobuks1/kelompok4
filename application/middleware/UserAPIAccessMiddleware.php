<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Luthier\MiddlewareInterface;
use Rakit\Validation\Validator;

class UserAPIAccessMiddleware implements MiddlewareInterface{

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
		$ci->load->model('user/account/Login_Process');
		$ci->load->helper('response');

		$username = $ci->input->get("username");
		$token = $ci->input->get("token");

		$validation = $this->validator->make($ci->input->get(), [
			'username' => 'required|min:5|max:12',
			'token' => 'required|min:26|max:255'
		]);

		$validation->validate();
		if($validation->fails()){
			response(406, 
				["content_type" => 
							["type" => 'application/json', "encoding" =>'utf-8'], 
				"output" => json_encode(["msg" => $validation->errors()->all()])])->_display();
			
			exit;
		}else{
			//Is user token existing? if not, we notice to relogin otherwise deny the entry
			$user = $ci->Login_Process::select(['username', 'expire'])->where('username', '=', $username)->first();
			if($user != null){

				//we check the token for expire
				$tokens = $ci->Login_Process::where('username', '=', $user->username)->first();
				$d1 = date_create();
				$d2 = date_create($user->expire);
				$d3 = intval($d1->diff($d2)->format("%R%d"));

				if($d3 <= 0){
					response(400, 
							["content_type" => 
										["type" => 'application/json', "encoding" =>'utf-8'], 
							"output" => json_encode(["msg" => "Anda perlu login ulang"])])->_display();
				      		exit;
				}else{
					if($user !== null){
						if($tokens->cookies === $token){
							//Can continue the requests
						}else{
							response(400, 
								["content_type" => 
											["type" => 'application/json', "encoding" =>'utf-8'], 
								"output" => json_encode(["msg" => "Token salah"])])->_display();
					      		exit;	
						}
					}else{
						response(400, 
							["content_type" => 
										["type" => 'application/json', "encoding" =>'utf-8'], 
							"output" => json_encode(["msg" => "Token tidak ditemukan"])])->_display();
				      		exit;
					}
				}
			}else{
				response(400, 
							["content_type" => 
										["type" => 'application/json', "encoding" =>'utf-8'], 
							"output" => json_encode(["msg" => "Username salah"])])->_display();
				      		exit;
			}
		}
	}
}