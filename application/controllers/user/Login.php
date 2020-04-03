<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPassLib\Hash\BCrypt;

class Login extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$secData = ["name" => $this->security->get_csrf_token_name(), "key" => $this->security->get_csrf_hash(), "error" => $this->session->flashdata('errors')];
		return view('user.login', ['msg' => $this->session->flashdata('msg'), 'err' => $this->session->flashdata('error'), "secData" => $secData]);
	}

	public function doLogin(){
		$auth = $this->input->post('username');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('username', 'Username', 'required', [
			'required' => "Username harus terisi"
		]);

		$this->form_validation->set_rules('password', 'Password', 'required', [
			'required' => "Password harus terisi"
		]);

		if($this->form_validation->run() != false){
			//Get from database
			//Make sure it precise
			$this->load->model('user/account/auth');
			$auth = $this->auth::where('username', '=', $auth)->orWhere('email', '=', $auth)->first();
			if($auth->username != null){
				$localUser = $auth->username;
				$localPassword = $auth->password;
				if(BCrypt::verify($password, $localPassword)){
					echo "Fuck You dah bisa login :V";
				}else{
					$this->session->set_flashdata('error', "Username atau Password salah");
					redirect('user/login');
				}
			}else{
				$this->session->set_flashdata('error', "Username atau Password tidak terdaftar");
				redirect('user/login');
			}
		}else{
			$this->session->set_flashdata('error', validation_errors());
			redirect('user/login');
		}
	}
}