<?php
class Writer extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('DataModel');
    $this->load->helper('url');
  }

  public function getWriter(){
    $data['writer'] = $this->DataModel->getWriter();
    $this->load->view('writers',$data);
  }

  public function insert(){
    $formData = array(
      'Name' => $this->input->post('name'),
      'Title' => $this->input->post('title')
    );

    $result = $this->DataModel->insertWriter($formData);
    if ($result == 1 ) redirect('/Writer/getWriter');
    else echo $result;
  }
}
?>
