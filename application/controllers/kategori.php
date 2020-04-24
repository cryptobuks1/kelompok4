<?php

class Kategori extends CI_Controller{
    public function alat_tulis()
    {
        $data['alat_tulis'] = $this->model_kategori->alat_tulis()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('alat_tulis',$data);
        $this->load->view('templates/footer');
    }

    public function elektronik()
    {
        $data['elektronik'] = $this->model_kategori->elektronik()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('elektronik',$data);
        $this->load->view('templates/footer');
    }
}