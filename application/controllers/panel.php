<?php

class Panel extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        $user = $this->session->userdata("admin");

        if(!$user){
            redirect(base_url("admin"));
        }

    }
    
    public function index(){
        
        $this->load->view('admin/panel');

    }

}
?>