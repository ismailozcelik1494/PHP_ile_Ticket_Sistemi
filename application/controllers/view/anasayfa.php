<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Anasayfa extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel');
	}

    public function index(){
        $this->load->view('frontend/anasayfa');
    }

    public function mail_gonder(){
        $data['list'] = $this->DataModel->CategoryList();
		$this->load->view('frontend/mail_gonder',$data);
    }

    public function template(){
        $this->load->view('frontend/mail-template');
    }

    public function gonder(){
        
        /*
        Dosya Kontrol edildi.
        if(isset($_FILES['attechment'])){
            $file = $_FILES["attechment"];
            print_r($file);
        }else{
           echo ('Yanlış bilgi');
        }
        */
        
        $file = $_FILES["attechment"];
        
        if(isset($_POST['nameSurname']) && isset($_POST['email']) && isset($_POST['telephone']) && isset($_POST['description']) && isset($_POST['message']) ) {
        
            if(empty($_POST['nameSurname']) || empty($_POST['email']) || empty($_POST['telephone']) || empty($_POST['description']) || empty($_POST['message'])) {
            
                $alert = array(
					"title"    =>  "İşlem Başarısız.",
					"message"  =>  "Lütfen boş yer bırakmayın!",
					"type"     =>  "danger",
					"icon"     =>  "ban"
				);
				$this->session->set_flashdata('alert',$alert);
            
            } else {
                $nameSurname = strip_tags($_POST['nameSurname']);
                $email = strip_tags($_POST['email']);
                $telephone = strip_tags($_POST['telephone']);
                $description = strip_tags($_POST['description']);
                $message = strip_tags($_POST['message']); 
            
                function turkce($metin){
                    $aranan=array("ç","Ç","ğ","Ğ","ı","İ","ö","Ö","ş","Ş","ü","Ü"," ");
                    $yerine=array("c","c","g","g","i","i","o","o","s","s","u","u","_");
                    return str_replace($aranan,$yerine,$metin);
                 }
                
            if(move_uploaded_file($file["tmp_name"],"assests/FrontEnd/Upload/Dosya/" . $file["name"] )){
        
            require 'assests/FrontEnd/PHPMailer/src/Exception.php';
            require 'assests/FrontEnd/PHPMailer/src/PHPMailer.php';
            require 'assests/FrontEnd/PHPMailer/src/SMTP.php';
            
                $mail = new PHPMailer();
            
                $mail->isSMTP();  //PROTOKOL BELİRLEME
                $mail->SMTPKeepAlive = true; // Canlı tutma
                $mail->SMTPAuth = true;   // Doğrulama işlemi
                $mail->SMTPSecure = 'tls'; //ssl  // Şifreleme Yöntemi belirliyoruz
            
                $mail->Port = 587; //25 , 465 , 587  // Port no
                $mail->Host = "smtp.gmail.com"; // Gmail in sağlamış olduğu mail servisi 
            
                $mail->Username = "ŞİRKET MAİL ADRESİ";  
                $mail->Password = "ŞİRKET MAİL ADRESİ ŞİFRESİ";
            
                $mail->setFrom("KİMDEN GELDİĞİNİ BİLDİRİR");
                $mail->addAddress("GİDLECEK MAİL ADRESİ");
            
                $body = file_get_contents(base_url("view/anasayfa/template"));
            
                $body = file_get_contents(base_url("view/anasayfa/template"));
        
                $gelen = ["nameSurname"];
                $giden = $nameSurname;
        
                date_default_timezone_set('Europe/Istanbul');
            
                $gun= date('d');
                $ay= date('m');
                $yil= date('Y');
                $saat= date('H');
                $dakika= date('i');
                $saniye= date('s');
            
                $ticket_id= $gun.$ay.$yil.$saat.$dakika.$saniye;
                
                $gelenticket_id = ["TicketID"];
                $gidenticket_id = [" . $ticket_id "];
        
                $body = str_replace($gelenticket_id,$gidenticket_id,$body);
                $body1 = str_replace($gelen,$giden,$body);
            
                $mail->isHTML(true);
                $mail->Subject = "ipsizcambaz Destek Birimi";
                $mail->Body = $body;
                $mail->Body = $body1;
                $mail->addAttachment("assests/FrontEnd/Upload/Dosya/" .$file["name"]);
            
                if ($mail->send()){

                    $isActive = 1;
                    $createdAt = date('Y-m-d H:i:s');
                    $fileUrl = ("assests/FrontEnd/Upload/Dosya/" .$file["name"]);
                    
                    $post_data = array(
                        "nameSurname"      =>$this->input->post("nameSurname"),
                         "email"            =>$this->input->post("email"),
                         "telephone"        =>$this->input->post("telephone"), 
                         "sifre"           =>$ticket_id,
                         "messageID"       =>$ticketID,
                         "isActive"        =>$isActive,
                         "createdAt"       =>$createdAt,
                         "ticketID1"         =>$ticket_id
                    );
                    
                    $insert=$this->db->insert("ticket_kisisel",$post_data);

                    if ($insert>0 ){
                        $displayCount = 0;
                        $post_data1=array(
                            "displayCount"     =>$displayCount,
                            "description"      =>$this->input->post("description"),
                            "categoryID"         =>$this->input->post("categoryID"),
                            "message"          =>$this->input->post("message"),
                            "isActive"         =>$isActive,
                            "fileUrl"          =>$fileUrl,
                            "createdAt"        =>$createdAt,
                            "ticketID"         =>$ticket_id,
                            "username"         =>$this->input->post("nameSurname"),
                            /* $this->db->insert_id('ticket_kisisel') */
                        );

                        $insert1=$this->db->insert("ticket",$post_data1);

                        if($insert1>0){
                            $alert = array(
                                "title"      =>  "İşlem Başarılı.",
                                "message"    =>  "Mail ve Dosya gönderme işleminiz başarı ile tamamlanmıştır.",
                                "type"       =>  "success",
                                "icon"       =>  "check",
                                'ticket_id'  =>  $ticket_id,  
                            );
                            $this->session->set_flashdata('alert',$alert);
                            redirect(base_url("view/anasayfa/mail_gonder"));  //Gönderme işlemi başarılıysa mail gönder View' ine dönecek
                        }else{
                            $alert = array(
                                "title"    =>  "İşlem Başarısız.",
                                "message"  =>  "Mail ve Dosya gönderme işleminiz başarısızlıkla sonuçlanmıştır.",
                                "type"     =>  "danger",
                                "icon"     =>  "ban"
                            );
                            $this->session->set_flashdata('alert',$alert);
                            redirect(base_url("view/anasayfa/mail_gonder")); // Gönderme işlemi başarısızsa gönderme sayfasında kalacaz
                        }
                    }else{
                        $alert = array(
                            "title"    =>  "İşlem Başarısız.",
                            "message"  =>  "Mail ve Dosya gönderme işleminiz başarısızlıkla sonuçlanmıştır.",
                            "type"     =>  "danger",
                            "icon"     =>  "ban"
                        );
                        $this->session->set_flashdata('alert',$alert);
                        redirect(base_url("view/anasayfa/mail_gonder")); // Gönderme işlemi başarısızsa gönderme sayfasında kalacaz
                    }

                    
                }
                else
                    $alert = array(
                        "title"    =>  "İşlem Başarısız.",
                        "message"  =>  "Mail ve Dosya gönderme işleminiz başarısızlıkla sonuçlanmıştır.",
                        "type"     =>  "danger",
                        "icon"     =>  "ban"
                    );
                    $this->session->set_flashdata('alert',$alert);
                    redirect(base_url("view/anasayfa/mail_gonder"));
                }  
            }
        }

    }

}
?>