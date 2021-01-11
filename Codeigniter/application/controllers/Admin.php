<?php
class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index(){
    if (!empty($this->session->username)) {
        $this->load->view("admin");
    }else {
        redirect("Login/index");
    }
  }
}

 ?>
