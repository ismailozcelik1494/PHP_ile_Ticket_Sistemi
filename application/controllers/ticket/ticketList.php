<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class TicketList extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->database();
		$this->load->model('DataModel');
		$this->load->library('session');
		$this->load->helper('tools_helper');
		if(!$this->session->userdata("admin"))
		redirect('admin');
	}

	public function index()
	{
		$this->load->model('SayfalamaModel');

		$this->load->library('pagination');

		$data['sayfalama_linkleri'] = $this->sayfalama_linkleri($this->SayfalamaModel->ticket_adet());
        $data['ticketler'] = $this->SayfalamaModel->ticketler($this->uri->segment(3,0),3);
		

	  /*
	  
	 $this->load->model("DataModel");
	  $data['tickets'] = $this->DataModel->joinMetod(array(
		"table"          => "ticket_kisisel",
		"condition"      => "ticket_kisisel.nameSurname = ticket.username",
	     ),
	       "ticket_kisisel.nameSurname ticketName, ticket_kisisel.email ticketEmail, ticket.OID ticketid, ticket.isActive ticketAktif, ticket.message ticketMessage, ticket.ticketID ticketid, ticket.username ticketuser, ticket.createdAt ticketCreatedAt",
      );
	  */

	  $this->load->model("DataModel");
	  $data['tickets'] = $this->DataModel->joinMetod(array(
		"table"          => "ticket_kisisel",
		"condition"      => "ticket_kisisel.nameSurname = ticket.username",
	     ),
	       "ticket_kisisel.nameSurname, ticket_kisisel.email, ticket.OID, ticket.isActive, ticket.message, ticket.ticketID, ticket.username, ticket.createdAt",
      );

	  
	  $this->load->view('admin/ticket/ticketList',$data);
	}

	public function ticketAdd($OID){
		$createdAt = date('Y-m-d H:i:s');
		$ticket_data=array(
			   "ticketID"      =>$this->input->post("ticketID"),
			   "username"      =>$this->input->post("username"),
			   "isActive"      =>empty($this->input->post("isActive"))? 0:1,
			   "message"      =>$this->input->post("message"),
			   "createdAt"   =>$createdAt,
		   );
		   $insert=$this->db->insert("ticket",$ticket_data);
		   if ($insert>0){
			$alert = array(
				"title"    =>  "İşlem Başarılı.",
				"message"  =>  "Kayıt Ekleme işleminiz başarı ile tamamlanmıştır.",
				"type"     =>  "success",
				"icon"     =>  "check"
			);
			   $this->session->set_flashdata('alert',$alert);
			   redirect(base_url("ticket/ticketList"));
			   die();
			}else{
				$alert = array(
					"title"    =>  "İşlem Başarısızdır!",
					"message"  =>  "Kayıt Ekleme işlemi başarısız.",
					"type"     =>  "danger",
					"icon"     =>  "ban"
				);
				$this->session->set_flashdata('alert',$alert);
				   redirect(base_url("ticket/ticketList/edit"));
				   die();
			   }
	}

	public function delete($OID){
		$delete = $this->db->delete("ticket", array("OID" => $OID));
		if($delete){
			$alert = array(
				"title"    =>  "İşlem Başarılı.",
				"message"  =>  "Kayıt Silme işleminiz başarı ile tamamlanmıştır.",
				"type"     =>  "success",
				"icon"     =>  "check"
			);
			$this->session->set_flashdata('alert',$alert);
			redirect(base_url("ticket/ticketList"));
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
		$viewData->ticket = $this->db->where("OID",$OID)->get('ticket')->row();
		$this->load->view("admin/ticket/ticketEdit",$viewData);
	}

	public function add($OID){
		$viewData = new stdClass();
		$viewData->ticket = $this->db->where("OID",$OID)->get('ticket')->row();
		$this->load->view("admin/ticket/ticketAdd",$viewData);
	}

	public function skeyword(){

		/*
		$key = $this->input->post('table_search');
		$data['tickets'] = $this->DataModel->joinSearch($key,array(
			"table"          => "ticket_kisisel",
			"condition"      => "ticket_kisisel.nameSurname = ticket.username ",
			 ),
			   "ticket_kisisel.nameSurname ticketName, ticket_kisisel.email ticketEmail, ticket.OID ticketid, ticket.isActive ticketAktif, ticket.message ticketMessage, ticket.ticketID ticketid,  ticket.createdAt ticketCreatedAt ",
			   
		  );
		  $this->load->view('admin/ticket/ticketList',$data); */
		  

		  $key = $this->input->post('table_search');
		  $data['tickets'] = $this->DataModel->JoinSearch($key);
		  $this->load->view('admin/ticket/ticketAra',$data);


	}

	public function update($OID){
		$createdAt = date('Y-m-d H:i:s');
		/* $createdAt = $this->input->post("createdAt"); */
		$data = array(
			"ticketID"      =>$this->input->post("ticketID"),
			"isActive"      =>empty($this->input->post("isActive"))? 0:1,
			"message"      =>$this->input->post("message"),
			"createdAt" => $createdAt,
		);
		$update = $this->db->where("OID", $OID)->update("ticket",$data);
		if($update){
			$alert = array(
				"title"    =>  "İşlem Başarılı.",
				"message"  =>  "Kayıt Güncelleme işleminiz başarı ile tamamlanmıştır.",
				"type"     =>  "success",
				"icon"     =>  "check"
			);
			$this->session->set_flashdata('alert',$alert);
            redirect(base_url("ticket/ticketList"));
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

	function sayfalama_linkleri($toplam)
	{
		$config = array(
			'base_url'          => site_url('ticket/ticketList/'),
			'total_rows'        => $toplam,
			'per_page'          => 3,
			'num_links'         => 2,
			'page_query_string' => FALSE,
			'uri_segment'       => 3,
			'full_tag_open'     => '<div class="pagination">',
			'full_tag_close'    => '</div>',
			'first_link'        => 'İlk Sayfa',
			'first_tag_open'    => '',
			'first_tag_close'   => '',
			'last_link'         => 'Son Sayfa',
			'last_tag_open'     => '',
			'last_tag_close'    => '',
			'next_link'         => 'Sonraki',
			'next_tag_open'     => '',
			'next_tag_close'    => '',
			'prev_link'         => 'Önceki',
			'prev_tag_open'     => '',
			'prev_tag_close'    => '',
			'cur_tag_open'      => '<span class="current">',
			'cur_tag_close'     => '</span>',
			'num_tag_open'      => '',
			'num_tag_close'     => ''
			
		);
		
		$this->pagination->initialize($config);

		return $this->pagination->create_links();
	}


}