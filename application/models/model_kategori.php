<?php

class Model_kategori extends CI_Model{
    
    public function alat_tulis(){
        return $this->db->get_where("tb_barang",array('kategori' => 'alat_tulis'));
    }

    public function elektronik(){
        return $this->db->get_where("tb_barang",array('kategori' => 'elektronik'));
    }
}