<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Dashboard extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		return view('admin.blank', ["name" => "sinyo"]);
	}
}