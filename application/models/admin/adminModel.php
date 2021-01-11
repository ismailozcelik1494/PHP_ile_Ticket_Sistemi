<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class adminModel extends CI_Model {
    
    public function get($where = array())
    {
		    $row = $this->db->where($where)->get("admin")->row();
        return $row;
    }
    
}
