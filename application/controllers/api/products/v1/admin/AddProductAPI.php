<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Rakit\Validation\Validator;
use Illuminate\Database\QueryException;
use Intervention\Image\ImageManager;


class AddProductAPI extends CI_Controller{
	private $validator;
	private $imageManager;
	public function __construct(){
		parent::__construct();
		$this->load->model('product/Product_Info');
		$this->load->model('product/Product_Grosir');
		$this->load->model('product/Product_Image');
		$this->load->helper('response');
		$this->load->helper('file');
		$this->imageManager = new ImageManager(['driver' => 'imagick']);
		$this->validator = new Validator([
			'required' => ':attribute Harus diisi',
			'required_with' => ':attribute & :attribute harus diisi',
			'min' => ':attribute Minimal :min karakter',
			'max' => ':attribute Maksimal :max karakter',
		]);
	}


	public function showDups($arr){
	  $array_temp = [];
	  $elementDups = [];

	  foreach($arr as $val){
	    if(!in_array($val, $array_temp)){
	      $array_temp[] = $val;
	    }else{
	      array_push($elementDups, $val);
	    }
	  }
	 return $elementDups;
	}

	public function comparator($array, $msg1, $msg2){
		$temp = 0;
		$msg = "";
		foreach($array as $loop){
		    if($temp == $loop){
			    $msg .= "$msg1 $temp tidak boleh sama dengan : $loop"."<br>";
			    // echo "Current $temp tidak boleh sama dengan $loop"."\n";
			    break;
		    }

		    if($temp>=$loop){
		    $msg .= "Input $msg2 $loop tidak boleh kurang dari : $temp"."<br>";
		    // echo "Current $loop tidak boleh kurang dari : $temp"."\n"; //here
		    break;
		    }else{
		    	$temp=$loop;
		    }
		}
		return $msg;
	}

	public function comparatorHarga($array){
		$temp = $array[0];
		$msg = "";
		foreach($array as $loop){

		    if($loop == $temp)continue;

		    if($temp<=$loop){
		    $msg .= "Harga $loop tidak boleh melebihi dari : $temp"."<br>"; //here
		    break;
		    }

		    else{
		    $temp=$loop;
		    }
		}
		return $msg;
	}


	public function postDataImage(){

		$validation = $this->validator->make($_POST + $_FILES, [
			'imageFile.*' => 'required|uploaded_file:0,5M,png,jpg,jpeg',
			'kodeProduk' => 'required|min:3'
		]);

		$validation->validate();
		if($validation->fails()){
			response(400, 
			["content_type" => 
						["type" => 'application/json', "encoding" =>'utf-8'], 
			"output" => json_encode(["msg" => $validation->errors()->all()])])->_display();
			exit;
		}

		$uploadLocationImage = FCPATH . 'products/' . $this->input->post("kodeProduk");

		$validate_image = ['upload_path' => $uploadLocationImage, 
							'allowed_types' => 'jpg|jpeg|png',
							'max_size' => 5120,
							'file_ext_tolower' => true,
							'encrypt_name' => true,
							];
		$this->load->library('upload', $validate_image);

		if(!is_dir($uploadLocationImage)){
				mkdir($uploadLocationImage);
		}

		$isSuccess = true;


		try{

			$checkIfExist = $this->Product_Image
									->join('product_info', 'product_info.kode_barang', '=', 'product_image.kode_barang')
									->where('product_image.kode_barang', '=', $this->input->post("kodeProduk"))
									->count();

			if($checkIfExist > 0){
				throw new \Exception("Gambar untuk produk : ".$this->input->post("kodeProduk")." sudah ada");
			}



			for($i = 0; $i < count($_FILES['imageFile']['name']); $i++){
				$_FILES['file']['name']       = $_FILES['imageFile']['name'][$i];
				$_FILES['file']['type']       = $_FILES['imageFile']['type'][$i];
				$_FILES['file']['tmp_name']   = $_FILES['imageFile']['tmp_name'][$i];
				$_FILES['file']['error']      = $_FILES['imageFile']['error'][$i];
				$_FILES['file']['size']       = $_FILES['imageFile']['size'][$i];

				$this->upload->initialize($validate_image);

				

				if($this->upload->do_upload('file')){
				     $imageData = $this->upload->data();
				     $this->imageManager->make($uploadLocationImage . "/". $imageData['file_name'])->save($uploadLocationImage . "/". $imageData['file_name'], 50);
				     $imageUpload = $this->Product_Image::create([
				     					'kode_barang' => $this->input->post("kodeProduk"),
				     					'image_name' => $imageData['file_name']
				     				]);
				     if(!$imageUpload->save()){
				     	throw new \Exception("Gambar gagal diupload, File : ".$imageData['orig_name']);
				     }
				 }
			}
		}catch(QueryException $e){
			delete_files($uploadLocationImage, true, false, 1);
			$isSuccess = false;
			response(400, 
			["content_type" => 
						["type" => 'application/json', "encoding" =>'utf-8'], 
			"output" => json_encode(["msg" => "Produk ".$this->input->post("kodeProduk")." Belum diupload"])])->_display();
			exit;
		}catch(\Exception $e){
			$isSuccess = false;
			response(400, 
			["content_type" => 
						["type" => 'application/json', "encoding" =>'utf-8'], 
			"output" => json_encode(["msg" => json_encode($e->getMessage())])])->_display();
			exit;
		}finally{
			if($isSuccess){
				$this->session->set_flashdata('productAddSuccess', "Produk berhasil ditambahkan");
				response(200, 
				["content_type" => 
							["type" => 'application/json', "encoding" =>'utf-8'], 
				"output" => json_encode(["msg" => "success"])])->_display();
				exit;
			}
		}



	}


	public function postData(){
		$inputs = json_decode($this->security->xss_clean($this->input->raw_input_stream), TRUE);

		$validation = $this->validator->make($inputs, [
			'namaProduk' => 'required|min:4|max:32',
			'kategoriSel' => 'required',
			'hargaSatuan' => 'required|integer|min:3|max:12',
			'stokBarang' => 'required|integer|min:1|max:12'
		]);


		foreach ($inputs["grosirInput"] as $key => $element) {
		    if ($element == "" || $element == null) {
		        unset($inputs["grosirInput"][$key]);
		    }
		}

		foreach ($inputs["grosirPrice"] as $key => $element) {
		    if ($element == "" || $element == null) {
		        unset($inputs["grosirPrice"][$key]);
		    }
		}


		$validation->validate();
		if($validation->fails()){
			response(400, 
			["content_type" => 
						["type" => 'application/json', "encoding" =>'utf-8'], 
			"output" => json_encode(["msg" => $validation->errors()->all()])])->_display();
			exit;
		}

		try{

			if($this->showDups($inputs["grosirInput"]) != null){
				$dups = implode(",", $this->showDups($inputs["grosirInput"]));
				throw new \Exception("Terdapat duplikat jumlah input grosir : ".$dups);
			}

			$compare = $this->comparator($inputs["grosirInput"], "Jumlah Grosir : ", "Jumlah Grosir : ");
			if($compare != "" || $compare != null){
				throw new \Exception($compare);
			}

			
			if($this->showDups($inputs["grosirPrice"]) != null){
				$dups = implode(",", $this->showDups($inputs["grosirPrice"]));

				throw new \Exception("Terdapat duplikat harga input grosir :".$dups);
			}

			$compareHarga = $this->comparatorHarga($inputs["grosirPrice"]);
			if($compareHarga != "" || $compareHarga != null){
				throw new \Exception($compareHarga);
			}


			$sortFirst = $inputs["grosirPrice"];
			rsort($sortFirst);
			if($sortFirst != null){
				if($sortFirst[0] >= $inputs["hargaSatuan"]){
					throw new \Exception("Harga Grosir : ".$sortFirst[0]." tidak boleh melebihi dari harga satuan : ".$inputs["hargaSatuan"]);
				}
			}

			$arrGrosir = [];
			$inGro = 0;
			foreach($inputs["grosirInput"] as $grosirInputs){
				array_push($arrGrosir, [$grosirInputs, $inputs["grosirPrice"][$inGro]]);
				$inGro++;
			}


			$prodInf = $this->Product_Info::where('nama_barang', '=', $inputs["namaProduk"])->first();
			$prodInf2 = $this->Product_Info::where('kode_barang', '=', $inputs["kodeProduk"])->first();
			if($prodInf != null){
				throw new \Exception("Nama Produk tidak boleh sama");
			}else if($prodInf2 != null){
				throw new \Exception("Kode Barang tidak boleh sama");
			}else{

					$productInfo = $this->Product_Info::create([
									'kode_barang' => $inputs["kodeProduk"],
									'nama_barang' => $inputs["namaProduk"],
									'kode_kategori' => $inputs["kategoriSel"],
									'stok' => $inputs["stokBarang"],
									'harga_satuan' => $inputs["hargaSatuan"]
									]);
					if($productInfo->save()){

						foreach($arrGrosir as $val){
							$productGrosir = $this->Product_Grosir::create([
												'kode_barang' => $inputs["kodeProduk"],
												'min_pcs' => $val[0],
												'prices' => $val[1]
											]);
							$productGrosir->save();
						}

						response(200, 
						["content_type" => 
									["type" => 'application/json', "encoding" =>'utf-8'], 
						"output" => json_encode(["msg" => "success"])])->_display();
						exit;
					}else{
						throw new \Exception("Failed, Please check log errors");
					}		
			}
		}catch(\Exception $e){
			response(400, 
			["content_type" => 
						["type" => 'application/json', "encoding" =>'utf-8'], 
			"output" => json_encode(["msg" => json_encode($e->getMessage())])])->_display();
			exit;
		}
		

		// foreach($inputs["grosirInput"] as $grosir){
		// 	echo $grosir."<br>";
		// }

		// foreach($inputs["grosirPrice"] as $gPrice){
		// 	echo $gPrice."<br>";
		// }

	}
}