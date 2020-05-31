<?php
class Upload extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_upload');
		// $this->load->library('upload');
	}

	function index(){
		$this->load->view('v_upload');	
	}

	function upload_image(){
		$d = $_POST;
		$this->db->insert("tb_file", ['jenis' => $d['jenis'], 'Deskripsi' => $d['Deskripsi']]);
		$id = $this->db->insert_id();
	    if(!empty($_FILES['filefoto']['name']))
	    {
			$count = count($_FILES['filefoto']['name']);
			for($i=0;$i<$count;$i++){
				$_FILES['file']['name'] = $_FILES['filefoto']['name'][$i];
				$_FILES['file']['type'] = $_FILES['filefoto']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['filefoto']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['filefoto']['error'][$i];
				$_FILES['file']['size'] = $_FILES['filefoto']['size'][$i];
				$config['upload_path'] = str_replace('system', 'assets', BASEPATH).'/images/'; //path folder
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf|zip|rar|doc|ppt|'; //type yang dapat diakses bisa anda sesuaikan
				$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
				$config['file_name'] = $_FILES['filefoto']['name'][$i];
				$this->load->library('upload',$config); 
				print_r($config);
				if($this->upload->do_upload('file')){
					$uploadData = $this->upload->data();

					$filename = $uploadData['file_name'];

		

					$data['totalFiles'][] = $filename;
					
					// echo "Upload Berhasil";
					$this->db->insert("tb_foto", ['id_master' => $id, 'foto' => $_FILES['filefoto']['name'][$i]]);

				}else{
	                echo "<script>alert('Gambar Gagal Upload. Gambar harus bertipe gif|jpg|png|jpeg|bmp!');history.go(-1);</script>";
	            }
			}
	                // $gbr = $this->upload->data();
	                // $gambar=$gbr['file_name']; //Mengambil file name dari gambar yang diupload
					// $jenis=strip_tags($this->input->post('jenis'));
					// // $this->m_upload->simpan_upload($jenis,$Deskripsi,$gambar);
					// echo "Upload Berhasil";
	                 
	        }else{
				echo "<script>alert('Silahkan Upload file Anda!');history.go(-1);</script>";

				
		}
		echo "<script>alert('Berhasil');history.go(-1);</script>";
				
	}
	
}