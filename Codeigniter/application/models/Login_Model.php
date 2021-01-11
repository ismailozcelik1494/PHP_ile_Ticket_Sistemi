<?php
class Login_Model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  function loginControl($username,$password){
    $this->db->where('UserName',$username);
    $this->db->where('Password',$password);
    $query = $this->db->get('users');

    if ($query->num_rows() > 0) {
      return 1;
    }else {
      return 0;
    }
  }
}

 ?>
