<?php
class Login extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Login_Model');
  }

  public function index(){
    $this->load->view('login');
  }

  public function loginControl(){
    if (isset($_POST['login'])) {
      $this->form_validation->set_rules('username','Kullanıcı Adı','required');
      $this->form_validation->set_rules('password','Password','required');

      if ($this->form_validation->run() == TRUE) {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $result = $this->Login_Model->loginControl($username,$password);

        if ($result == 1) {
          $sessionData = array('username' => $username);
          $this->session->set_userdata($sessionData);
          redirect("Admin/index");
        }else {
          echo "giriş başarınız";
        }

      }else {
        $data['validation_error'] = "Tüm alanları doldurun";
        $this->load->view('login',$data);
      }
    }
  }

  public function logOut(){
    session_destroy();
  }
}

 ?>
