<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Rakit\Validation\Validator;


class AddProductAPI extends CI_Controller{
	private $validator;
	public function __construct(){
		parent::__construct();
		$this->load->model('product/Product_Info');
		$this->load->helper('response');
		$this->validator = new Validator([
			'required' => ':attribute Harus diisi',
			'required_with' => ':attribute & :attribute harus diisi',
			'min' => ':attribute Minimal :min karakter',
			'max' => ':attribute Maksimal :max karakter',
		]);
	}

	public function postData(){
		$inputs = json_decode($this->security->xss_clean($this->input->raw_input_stream), TRUE);

		$validation = $this->validator->make($inputs, [
			'namaProduk' => 'required|min:4|max:32',
			'kategoriSel' => 'required',
			'hargaSatuan' => 'required|integer|min:3|max:12',
			'stokBarang' => 'required|integer|min:1|max:12'
		]);

		$validation->validate();
		if($validation->fails()){
			response(400, 
			["content_type" => 
						["type" => 'application/json', "encoding" =>'utf-8'], 
			"output" => json_encode(["msg" => $validation->errors()->all()])])->_display();
			exit;
		}

		try{
			$prodInf = $this->Product_Info::where('nama_barang', '=', $inputs["namaProduk"])->first();
			$prodInf2 = $this->Product_Info::where('kode_barang', '=', $inputs["kodeProduk"])->first();
			if($prodInf != null){
				throw new \Exception("Nama Produk tidak boleh sama");
			}else if($prodInf2){
				throw new \Exception("Kode Barang tidak boleh sama");
			}else{
				$productInfo = $this->Product_Info::create([
								'kode_barang' => $inputs["kodeProduk"],
								'nama_barang' => $inputs["namaProduk"],
								'kode_kategori' => $inputs["kategoriSel"],
								'harga_satuan' => $inputs["hargaSatuan"]
								]);
				if($productInfo->save()){
					response(200, 
					["content_type" => 
								["type" => 'application/json', "encoding" =>'utf-8'], 
					"output" => json_encode(["msg" => "success"])])->_display();
	
				}else{
					response(400, 
					["content_type" => 
								["type" => 'application/json', "encoding" =>'utf-8'], 
					"output" => json_encode(["msg" => "Failed, Please check log errors"])])->_display();
	
				}	
			}
		}catch(\Exception $e){
			response(400, 
			["content_type" => 
						["type" => 'application/json', "encoding" =>'utf-8'], 
			"output" => json_encode(["msg" => $e->getMessage()])])->_display();
			exit;
		}
		

		// foreach($inputs["grosirInput"] as $grosir){
		// 	echo $grosir."<br>";
		// }

		// foreach($inputs["grosirPrice"] as $gPrice){
		// 	echo $gPrice."<br>";
		// }

	}
}