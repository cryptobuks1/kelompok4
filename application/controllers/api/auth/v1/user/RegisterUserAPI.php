<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPassLib\Hash\BCrypt;
use Rakit\Validation\Validator;

class RegisterUserAPI extends CI_Controller{

	private $validator;

	public function __construct(){
		parent::__construct();
		$this->load->model('user/account/Auth');
		$this->load->helper('response');
		$this->validator = new Validator([
			'required' => ':attribute Harus diisi',
			'email' => 'Email tidak valid',
			'min' => ':attribute Minimal :min karakter',
			'max' => ':attribute Maksimal :max karakter',
		]);
	}


	public function register(){
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$validation = $this->validator->make($this->input->post(), [
			'username' => 'required|min:5|max:12',
			'email' => 'required|email|min:5',
			'password' => 'required|min:8'
		]);

		$validation->validate();
		if($validation->fails()){
			response(406, 
				["content_type" => 
							["type" => 'application/json', "encoding" =>'utf-8'], 
				"output" => json_encode(["msg" => $validation->errors()->all()])])->_display();
			exit;
		}else{
			//Get Existing Username
			$existingUsername = false;
			$exUsername = $this->Auth::where('username', "=", $username)->get();
			if($exUsername->count() > 0)$existingUsername = true;

			//Get Existing Email
			$existingEmail = false;
			$exEmail = $this->Auth::where('email', "=", $email)->get();
			if($exEmail->count() > 0)$existingEmail = true;

			if(!$existingEmail && !$existingUsername){
				$this->Auth::create([
				'username' => $username,
				'email' => $email,
				'password' => BCrypt::hash($password, ['rounds' => 16])
				]);
				response(200, 
				["content_type" => 
							["type" => 'application/json', "encoding" =>'utf-8'], 
				"output" => json_encode(["msg" => "Akun berhasil didaftarkan"])])->_display();
				exit;
			}else{
				response(406, 
				["content_type" => 
							["type" => 'application/json', "encoding" =>'utf-8'], 
				"output" => json_encode(["msg" => "Username atau Email telah ada, silahkan mengisi yang lainnya"])])->_display();
				exit;
			}
		}
	}
}