<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListProduct extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model("product/Product_Grosir");
		$this->load->model("product/Product_Info");
		$this->load->helper('response');
		$this->load->model("product/ProductLists");
	}

	public function index(){

		$allData = [];
		$datas = $this->Product_Info::distinct()->get();

		foreach($datas as $key){
			$u = new ProductLists;
			$u->kodeBarang = $key["kode_barang"];
			$u->namaBarang = $key["nama_barang"];
			$u->kodeKategori = $key["kode_kategori"];
			$u->hargaSatuan = $key["harga_satuan"];
			$u->stok = $key["stok"];
			$u->grosir = [];
			$datas2 = $this->Product_Grosir::where("kode_barang", "=", $key["kode_barang"])->get();
			foreach($datas2 as $key2){
				array_push($u->grosir, ["minimum_pembelian" => $key2["min_pcs"], "harga" => $key2["prices"]]);
			}
			array_push($allData, (array) $u);
		}

		//print_r(json_encode($allData));



		response(200, 
		["content_type" => 
					["type" => 'application/json', "encoding" =>'utf-8'], 
		"output" => json_encode(["data" => $allData])])->_display();
		exit;

		// response(200, 
		// ["content_type" => 
		// 			["type" => 'application/json', "encoding" =>'utf-8'], 
		// "output" => json_encode($allData)])->_display();
	}
}