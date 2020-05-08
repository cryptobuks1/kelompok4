<?php
class M_upload extends CI_Model{

	function simpan_upload($judul,$gambar){
		$hasil=$this->db->query("INSERT INTO tbl_galeri(judul,gambar) VALUES ('$judul','$gambar')");
		
		if(!$hasil ){
			echo "<script>alert('Gagal di tambahkan!');history.go(-1);</script>";
			} else{
			echo "<script>alert('Data berhasil di tambahkan!');history.go(-1);</script>";
			}
		return $hasil;
	}
	
}