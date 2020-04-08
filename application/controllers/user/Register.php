<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPassLib\Hash\BCrypt;

class Register extends CI_Controller{

	public $secData;
	public $sess;

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$secData = ["name" => $this->security->get_csrf_token_name(), "key" => $this->security->get_csrf_hash(), "error" => $this->session->flashdata('errors')];
		return view('user.register', $secData);
	}

	public function doRegister(){
		$username = $this->input->post('username', TRUE);
		$email = $this->input->post('email', TRUE);
		$password = $this->input->post('password', TRUE);


		$this->form_validation->set_rules('username','Username','required|min_length[5]|max_length[17]|alpha_numeric', [
			'required' => "Username harus terisi",
			'min_length' => "Username minimal 5 karakter",
			'max_length' => "Username maksimal 17 karakter",
			'alpha_numeric' => "Username hanya boleh angka & huruf"
		]);
		$this->form_validation->set_rules('email','Email','required|valid_email|min_length[9]', [
			'required' => "Email harus terisi", 
			'valid_email' => "Format email harus benar",
			'min_length' => "Email minimal 9 karakter"
		]);
		$this->form_validation->set_rules('password','Password','required|min_length[8]',[
			'required' => "Password harus terisi",
			'min_length' => "Password minimal 8 karakter"
		]);

		if($this->form_validation->run() != false){
			$this->load->model("user/account/auth");
			$this->load->model("user/payment/User_Payment");
			//Get Existing Username
			$existingUsername = false;
			$exUsername = $this->auth::where('username', "=", $username)->get();
			if($exUsername->count() > 0)$existingUsername = true;

			//Get Existing Email
			$existingEmail = false;
			$exEmail = $this->auth::where('email', "=", $email)->get();
			if($exEmail->count() > 0)$existingEmail = true;

			if(!$existingEmail && !$existingUsername){
				//Create credentials
				$this->auth::create([
				'username' => $username,
				'email' => $email,
				'password' => BCrypt::hash($password, ['rounds' => 16])
				]);

				//Create E_Wallet
					$this->User_Payment::create([
						'username' => $username
					]);

				$this->session->set_flashdata('msg', "Akun anda telah terdaftarkan");
				redirect('user/login');
			}else{
				$this->session->set_flashdata('errors', "Username atau Password sudah ada");
				redirect('user/register');
			}
		}else{
			$this->session->set_flashdata('errors', validation_errors());
			redirect('user/register');
		}

	}
}