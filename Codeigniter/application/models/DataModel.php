<?php

class DataModel extends CI_Model{

  public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function getWriter(){
    $query = $this->db->get('writer');
    return $query->result();
  }

  public function insertWriter($formData){
    return $this->db->insert('writer',$formData);
  }
}
