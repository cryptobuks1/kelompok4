<?php
class M_upload extends CI_Model{

	function simpan_upload($jenis,$gambar){
		$hasil=$this->db->query("INSERT INTO tb_file(jenis,Deskripsi,gambar ,) VALUES ('$jenis','$Deskripsi','$gambar')");
		
	
		return $hasil;
	}
	
}