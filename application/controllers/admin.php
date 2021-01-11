<?php
/* defined('BASEPATH') OR exit('No direct script access allowed'); */

class Admin extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->database();
	}

	public function index()
	{
		$this->load->library('session');

		$user = $this->session->set_userdata("admin");
        if(!$user){
          $this->load->view("admin/login");
        } else {
			$this->load->view("admin/panel");
        }
	}
	
	public function loginControl()
	{

		$user = $this->session->userdata("admin");

        if($user){
            redirect(base_url("admin"));
        } 

        $email   = $this->input->post("email");
        $password   = $this->input->post("password");

        if(!$email || !$password){

            //hata var.
		    $alert = array(
				"title"    =>  "İşlem Başarısızdır!",
				"message"  =>  "Lütfen Tüm alanları eksiksiz olarak doldurunuz.!!!",
				"type"     =>  "danger",
				"icon"     =>  "ban"
			);
			
        }else{

			// Database İşlemleri..
			$this->load->model("admin/adminModel");
			$where = array(
				"email"  => $email,
				"password"  => $password,
				/* "password"  => md5($password), */
				"isActive"  => 1,
				"userRole"  => 4
			);

			$row = $this->adminModel->get($where);

			if($row){

				$user = array(
					"id"     => $row->id,
				);

				$this->session->set_userdata('admin', $user);
				redirect(base_url("panel"));
				/* $this->load->view('admin/panel',$user); */

			}else{

				//hata var.
				$alert = array(
					"title"    =>  "İşlem Başarısızdır!",
					"message"  =>  "Böyle bir kullanıcı bulunamadı!!!",
					"type"     =>  "danger",
					"icon"     =>  "ban"
				);

			}

			$this->session->set_flashdata("alert", $alert);
			redirect(base_url("admin"));

        }
	}

	public function logOut(){

		$this->load->library('session');
		$this->session->unset_userdata("admin");
		
        $alert = array(
			"title"    =>  "İşlem Başarılı.",
			"message"  =>  "Çıkış işleminiz başarı ile tamamlanmıştır.",
			"type"     =>  "success",
			"icon"     =>  "check"
		);
		$this->session->set_flashdata('alert',$alert);
        redirect(base_url("admin"));
    }
	
}