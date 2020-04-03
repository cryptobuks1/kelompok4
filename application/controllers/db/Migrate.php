<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}

	public function upDatabase(){
		$this->load->library('migration');
		if (!$this->migration->version(1)) {
            show_error($this->migration->error_string());
        } else {
            echo 'Migration worked!';
        }
	}
}