<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model;

class Product_Image extends Model{
	protected $table = 'product_image';
	protected $primaryKey = 'kode_barang';
	protected $keyType = 'string';
	public $timestamps = false;
	protected $fillable = ['kode_barang', 'image_name'];
}