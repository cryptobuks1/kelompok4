<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPassLib\Hash\BCrypt;
use Rakit\Validation\Validator;

class LoginUserAPI extends CI_Controller{

	private $validator;

	public function __construct(){
		parent::__construct();
		$this->load->model('user/account/Auth');
		$this->load->helper('response');
		$this->validator = new Validator([
			'required' => ':attribute Harus diisi',
			'email' => ':Email tidak valid',
			'min' => ':attribute Minimal :min karakter',
			'max' => ':attribute Maksimal :max karakter',
		]);
	}

	public function tryLogin(){

		if($this->input->method(TRUE) !== "POST"){
			response(405, 
				["content_type" => 
							["type" => 'application/json', "encoding" =>'utf-8'], 
				"output" => json_encode(["msg" => "Method Not Allowed"])])->_display();
      		exit;
		}else{
			$username = $this->input->post('username', true);
			$password = $this->input->post('password', true);


			$validation = $this->validator->make($this->input->post(), [
			'username' => 'required|min:5|max:12',
			'password' => 'required|min:8'
			]);

			$validation->validate();
			if($validation->fails()){
				response(406, 
				["content_type" => 
							["type" => 'application/json', "encoding" =>'utf-8'], 
				"output" => json_encode(["msg" => $validation->errors()->all()])]);
				exit;
			}else{
				$auth = $this->Auth::where('username', '=', $username)->orWhere('email', '=', $username)->first();
					if($auth != null){
						$localUser = $auth->username;
						$localPassword = $auth->password;
						if(BCrypt::verify($password, $localPassword)){
							$this->load->model('user/account/Login_Process');
							$keySession = bin2hex($this->encryption->create_key(16));
							$expireAdd = date('Y-m-d H:i:s', strtotime(date("Y-m-d H:i:s"). ' + 14 days'));
							$isKeyExist = $this->Login_Process::where('username', '=', $username)->first();
							if($isKeyExist != null){
								$d1 = date_create();
								$d2 = date_create($isKeyExist->expire);
								$d3 = intval($d1->diff($d2)->format("%R%d"));
								if($d3 <= 0){
									$this->Login_Process::where('username', '=', $username)->update(['cookies' => $keySession, 'expire' => $expireAdd]);
									response(200, ["content_type" =>
												["type" => 'application/json', "encoding" => 'utf-8'],
									"output" => json_encode([
										"msg" => "Authenticated",
										"keySession" => $keySession,
										"expire" => $expireAdd,
									])])->_display();
									exit;
								}else{
									response(200, ["content_type" =>
												["type" => 'application/json', "encoding" => 'utf-8'],
									"output" => json_encode([
										"msg" => "Authenticated",
										"keySession" => $isKeyExist->cookies,
										"expire" => $isKeyExist->expire->format("Y-m-d H:i:s"),
									])])->_display();
									exit;
								}
							}else{
								$this->Login_Process::create([
								'username' => $localUser,
								'cookies' => $keySession,
								'expire' => $expireAdd
								]);
							}
							response(200,
							["content_type" =>
										["type" => 'application/json', "encoding" => 'utf-8'],
							"output" => json_encode([
								"msg" => "Authenticated",
								"keySession" => $keySession,
								"expire" => gmdate($expireAdd)
							])])->_display();
							exit;
						}else{
							response(403, 
							["content_type" => 
										["type" => 'application/json', "encoding" =>'utf-8'], 
							"output" => json_encode(["msg" => "Username atau Password Salah"])])->_display();
				      		exit;
						}
					}else{
						response(403, 
							["content_type" => 
										["type" => 'application/json', "encoding" =>'utf-8'], 
							"output" => json_encode(["msg" => "Username atau Password tidak terdaftar"])])->_display();
				      		exit;
					}
				}
			}
		}
	}
