<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->output->cache(5);

	}

	public function loadHeadView(){
		$this->load->view("admin/components/head");
		$this->load->view("admin/components/panel");
	}

	public function index()
	{
		//$this->loadHeadView();
		return view('admin.blank', ["name" => "sinyo"]);
		//$this->load->view("admin/blank");
	}
}
