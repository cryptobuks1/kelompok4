<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeleteProductAPI extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model("product/Product_Info");
		$this->load->helper("response");
	}

	public function delete(){
		$inputs = json_decode($this->security->xss_clean($this->input->raw_input_stream), TRUE);
		$ids = $inputs["idBarang"];
		try{
			$result = $this->Product_Info::findOrFail($ids)->delete();

			response(200, 
			["content_type" => 
						["type" => 'application/json', "encoding" =>'utf-8'], 
			"output" => json_encode(["result" => "Berhasil dihapus"])])->_display();
			exit;
		}catch(Exception $e){
			response(400, 
			["content_type" => 
						["type" => 'application/json', "encoding" =>'utf-8'], 
			"output" => json_encode(["result" => "Gagal dihapus"])])->_display();
			exit;
		}


	}
}