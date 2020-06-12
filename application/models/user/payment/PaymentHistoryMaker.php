<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as EModel;

class PaymentHistoryMaker extends EModel{
	protected $table = 'trx_ewallet_history';
	protected $primaryKey = 'id_trx';
	protected $keyType = 'int';
	public $timestamps = false;
	protected $dates = ['trx_time'];
	protected $fillable = ['trx_number', 'trx_type', 'trx_time'];
}

