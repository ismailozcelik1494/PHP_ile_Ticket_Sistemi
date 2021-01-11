<?php

class SayfalamaModel extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->database();
      }

    function ticketler($baslangic, $limit)
    {
        $id="OID";

        $sql = "SELECT * FROM ticket ORDER BY $id DESC LIMIT $baslangic,$limit";
        $query = $this->db->query($sql);
        
        if( $query->num_rows() > 0 )
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
    }

    function ticket_adet()
    {
        $sql = "SELECT COUNT(*) as adet FROM ticket";
        $query = $this->db->query($sql);

        return (int)$query->row()->adet;
    }

}
