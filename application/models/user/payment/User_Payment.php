<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as EModel;

class User_Payment extends EModel{
	protected $table = 'user_payment';
	protected $primaryKey = 'username';
	protected $keyType = 'string';
	public $timestamps = false;
	protected $dates = ['last_update'];
	protected $fillable = ['username', 'remain_balance', 'last_update', 'pin'];
}