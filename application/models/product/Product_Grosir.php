<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

class Product_Grosir extends Model{
	protected $table = 'product_grosir';
	protected $primaryKey = 'kode_barang';
	protected $keyType = 'string';
	public $timestamps = false;
	protected $fillable = ['kode_barang', 'min_pcs', 'prices'];
}