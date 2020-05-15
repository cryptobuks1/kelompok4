<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Rakit\Validation\Validator;
use Sinyo1015\AutoNumbering\AutoNumber;

class Admin_Add_Products extends CI_Controller{

	public $autonumber;

	public function __construct(){
		parent::__construct();
		$this->load->helper("response");
		$this->load->model("product/Product_Info");
		$this->autonumber = new AutoNumber("BAR_", 4, 8);
		
	}

	public function index(){

		$data = ["name" => $this->security->get_csrf_token_name(), 
				"key" => $this->security->get_csrf_hash(), 
				"kode_barang" => $this->autonumber->make($this->Product_Info::max('kode_barang')),
				"flashdata" => $this->session->flashdata()];
		return view('admin.categories.tambah_barang.add_product_admin', $data);
	}

	
}