<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();

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

		//TWIG
		// $view = view('admin/blank');
		// echo $view->render();
		//$this->load->view('admin/blank', ["test" => "WOW"]);
	}

	public function getToken(){
		$res = json_encode(["csrf_name" => $this->security->get_csrf_token_name(), "csrf_key" => $this->security->get_csrf_hash(), JSON_PRETTY_PRINT]);
	$this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output($res)
      ->_display();
      exit;
	}
}
