<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as EModel;

class User_Details extends EModel{
	protected $table = 'user_detail';
	protected $primaryKey = 'username';
	protected $keyType = 'string';
	public $timestamps = false;
	protected $fillable = ['username', 'nama_lengkap', 'nomor_hp', 'no_ktp', 'ewallet_activated'];

}