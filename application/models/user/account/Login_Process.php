<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as EModel;

class Login_Process extends EModel{
	protected $table = 'user_cookies';
	protected $primaryKey = 'username';
	protected $keyType = 'string';
	public $timestamps = false;
	protected $dates = ['expire'];
	protected $fillable = ['username', 'cookies', 'expire'];

}