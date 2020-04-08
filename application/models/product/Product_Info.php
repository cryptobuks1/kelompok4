<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;


class Product_Info extends Model{


	protected $table = 'product_info';
	protected $primaryKey = 'kode_barang';
	protected $keyType = 'string';
	public $timestamps = false;
	protected $fillable = ['kode_barang', 'nama_barang', 'kode_kategori', 'harga_satuan'];


}