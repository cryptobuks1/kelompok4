<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductLists{
	public $kodeBarang;
	public $namaBarang;
	public $kodeKategori;
	public $hargaSatuan;
	public $stok;
	public $grosir;
	public $images;
	public $deskripsi;

	public function __get($property) {
	  if (property_exists($this, $property)) {
	    return $this->$property;
	  }
	}

	public function __set($property, $value) {
	  if (property_exists($this, $property)) {
	    $this->$property = $value;
	  }

	  return $this;
	}
}
