<?php
/* defined('BASEPATH') OR exit('No direct script access allowed'); */

class CategoryList extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('DataModel');
		$this->load->library('session');
		if(!$this->session->userdata("admin"))
			redirect('admin');
	}

	public function index()
	{
		$data['list'] = $this->DataModel->CategoryList();
		$this->load->view('admin/category/categoryList',$data);
	}

	public function categoryAdd1(){
		$this->load->view('admin/category/categoryAdd');
		
	}
    public function add(){
		$createdAt = date('Y-m-d H:i:s');
		$category_data=array(
			   "categoryName"      =>$this->input->post("categoryName"),
			   "isActive"      =>empty($this->input->post("isActive"))? 0:1,
			   "createdAt"   =>$createdAt,
		   );
		   $insert=$this->db->insert("category",$category_data);
		   if ($insert>0){
			$alert = array(
				"title"    =>  "İşlem Başarılı.",
				"message"  =>  "Kayıt Ekleme işleminiz başarı ile tamamlanmıştır.",
				"type"     =>  "success",
				"icon"     =>  "check"
			);
			   $this->session->set_flashdata('alert',$alert);
			   redirect(base_url("category/categoryList")); //Ekleme işlemi başarılıysa category list View' ine dönecek
			   die();
			}else{
				$alert = array(
					"title"    =>  "İşlem Başarısızdır!",
					"message"  =>  "Kayıt Ekleme işlemi başarısız.",
					"type"     =>  "danger",
					"icon"     =>  "ban"
				);
				$this->session->set_flashdata('alert',$alert);
				   redirect(base_url("category/categoryList/categoryAdd1")); // Ekleme işlemi başarısızsa ekleme sayfasında kalacaz
				   die();
			   }
	}

	public function delete($OID){
		$delete = $this->db->delete("category", array("OID" => $OID));
		if($delete){
			$alert = array(
				"title"    =>  "İşlem Başarılı.",
				"message"  =>  "Kayıt Silme işleminiz başarı ile tamamlanmıştır.",
				"type"     =>  "success",
				"icon"     =>  "check"
			);
			$this->session->set_flashdata('alert',$alert);
            redirect(base_url("category/categoryList"));
		}
		else{
            $alert = array(
				"title"    =>  "İşlem Başarısızdır!",
				"message"  =>  "Kayıt Silme işlemi başarısız.",
				"type"     =>  "danger",
				"icon"     =>  "ban"
			);
			$this->session->set_flashdata('alert',$alert);
		}
	}

	public function edit($OID){
		$viewData = new stdClass();
		$viewData->category = $this->db->where("OID",$OID)->get('category')->row();
		$this->load->view("admin/category/categoryEdit",$viewData);
	}

	public function update($OID){
		$categoryName = $this->input->post("categoryName");
		$isActive = $this->input->post("isActive");
		$isActive = ($isActive == "on") ? 1 : 0;
		$createdAt = date('Y-m-d H:i:s');
		/* $createdAt = $this->input->post("createdAt"); */
		$data = array(
			"categoryName" => $categoryName,
			"isActive" => $isActive,
			"createdAt" => $createdAt,
		);
		$update = $this->db->where("OID", $OID)->update("category",$data);
		if($update){
			$alert = array(
				"title"    =>  "İşlem Başarılı.",
				"message"  =>  "Kayıt Güncelleme işleminiz başarı ile tamamlanmıştır.",
				"type"     =>  "success",
				"icon"     =>  "check"
			);
			$this->session->set_flashdata('alert',$alert);
            redirect(base_url("category/categoryList"));
		}
		else{
            $alert = array(
				"title"    =>  "İşlem Başarısızdır!",
				"message"  =>  "Kayıt Güncelleme işlemi başarısız.",
				"type"     =>  "danger",
				"icon"     =>  "ban"
			);
			$this->session->set_flashdata('alert',$alert);
		}
	}
}