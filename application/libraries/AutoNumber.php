<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AutoNumber{
	public $kodeBarang;
	public $start;
	public $prefix; 
	public $end;

	public function __construct($param){
		$this->prefix = $param["prefix"];
		$this->end = $param["end"];
		$this->start = $param["start"];
	}

	public function existingCode($existing){
		$nourut = (int) substr($existing, $this->start, $this->end);
		$kodeBarangSekarang = $nourut + 1;
		$realLength = ($this->end - $this->start) + 1;
		$formatter = "%0".$realLength."s";
		return $this->prefix . sprintf($formatter, $kodeBarangSekarang);
	}
}