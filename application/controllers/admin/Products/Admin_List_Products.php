<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_List_Products extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data = ["name" => $this->security->get_csrf_token_name(), "key" => $this->security->get_csrf_hash()];
		return view("admin.categories.list_barang.list_barang", $data);
	}
}