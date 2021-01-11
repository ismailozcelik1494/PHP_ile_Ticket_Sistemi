<?php

class DataModel extends CI_Model{

  public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  // category tablosundaki verilerin tümü olsun ve verileri hangi kontrollerden talep geliyorsa geri dönderelim.
  public function CategoryList(){
    $result = $this->db->get('category');
    return $result->result();
  }
  
  public function TicketList(){
    $result = $this->db->get('ticket');
    return $result->result();
  }

  public function TicketKisiselList(){
    $result = $this->db->get('ticket_kisisel');
    return $result->result();
  }

  public function admin_get($where = array()){
		    $row = $this->db->where($where)->get("user")->row();
        return $row;
  }

  public function joinMetod($Join=array(), $select = ""){
    $this->db->select($select);
    $this->db->from("ticket");
    $this->db->join($Join['table'], $Join['condition']);
    return $this->db->get()->result();
  }

  public function search($key){
       $this->db->like('ticketID',$key);
       $query = $this->db->get('ticket');
       return $query->result();
  }

  public function list($ticketID){
    $this->db->select('*');
    $this->db->from('ticket');
    $this->db->join('ticket_kisisel','ticket_kisisel.ticketID1 = ticket.ticketID');
    $this->db->like('ticket.ticketID',$ticketID);
    return $this->db->get()->result();
  }

  public function JoinSearch($key/*, $Join=array() , $select = "" */){
    /* $this->db->select($select); */
    /* $this->db->select('*');
    $this->db->from("ticket");
    $this->db->join($Join['table'], $Join['condition']);
    $this->db->where('ticket.userame', $key);
    return $this->db->get()->result();
    $query = $this->db->get();
 */


$this->db->select('*');
$this->db->from('ticket');
$this->db->join('ticket_kisisel','ticket_kisisel.nameSurname = ticket.username');
$this->db->like('ticket.username',$key);

return $this->db->get()->result();






    

    /* return $this->db->get()->result();

      $this->db->like('ticketID',$key);
      $query = $this->db->get('ticket');
      return $query->result(); */


      

  }

}
