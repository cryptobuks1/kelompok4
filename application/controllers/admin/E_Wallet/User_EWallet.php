<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_EWallet extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		return view('admin.categories.user_ewallet.ewallet_index');
	}
}