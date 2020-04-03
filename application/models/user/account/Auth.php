<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as EModel;

class Auth extends EModel{
	protected $table = 'user_login';
	protected $primaryKey = 'username';
	protected $keyType = 'string';
	public $timestamps = false;
	protected $fillable = ['username', 'email', 'password'];

}