<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PriceRangeFotoCopy extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        echo json_encode(["status" => "Testing"]);
    }

    public static function post(){
    	echo json_encode(["wow" => true]);
    }
}