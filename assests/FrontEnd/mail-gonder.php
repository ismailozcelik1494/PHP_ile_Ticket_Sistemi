<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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

if(isset($_POST['adsoyad']) && isset($_POST['eposta']) && isset($_POST['telno']) && isset($_POST['konu']) && isset($_POST['mesaj']) ) {

    if(empty($_POST['adsoyad']) || empty($_POST['eposta']) || empty($_POST['telno']) || empty($_POST['konu']) || empty($_POST['mesaj'])) {
    
        $alert = array(
            "title"    =>  "İşlem Başarısız.",
            "message"  =>  "Lütfen boş yer bırakmayın!",
            "type"     =>  "danger",
            "icon"     =>  "ban"
        );
        $this->session->set_flashdata('alert',$alert);
        
    } 
    else 
    {
        $ad = strip_tags($_POST['adsoyad']);
        $eposta = strip_tags($_POST['eposta']);
        $telno = strip_tags($_POST['telno']);
        $konu = strip_tags($_POST['konu']);
        $mesaj = strip_tags($_POST['mesaj']); 
    
        function turkce($metin){
            $aranan=array("ç","Ç","ğ","Ğ","ı","İ","ö","Ö","ş","Ş","ü","Ü"," ");
            $yerine=array("c","c","g","g","i","i","o","o","s","s","u","u","_");
            return str_replace($aranan,$yerine,$metin);
        }
        
    if(move_uploaded_file($file["tmp_name"],"Upload/Dosya/" . $file["name"] )){

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    
        $mail = new PHPMailer();
    
        $mail->isSMTP();  //PROTOKOL BELİRLEME
        $mail->SMTPKeepAlive = true; // Canlı tutma
        $mail->SMTPAuth = true;   // Doğrulama işlemi
        $mail->SMTPSecure = 'tls'; //ssl  // Şifreleme Yöntemi belirliyoruz
    
        $mail->Port = 587; //25 , 465 , 587  // Port no
        $mail->Host = "smtp.gmail.com"; // Gmail in sağlamış olduğu mail servisi 
    
        $mail->Username = "geredeli1299@gmail.com";  
        $mail->Password = "17026670100ismail";
    
        $mail->setFrom("geredeli1299@gmail.com");
        $mail->addAddress("ibrahimozcelik1497@gmail.com");
    
        $body = file_get_contents('./mail-template.html');
    
        $body1 = file_get_contents('./mail-template.html');

        $gelen = ["username","userID"];
        $giden = ["Mehmet",8];

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
        $mail->addAttachment("Upload/Dosya/" .$file["name"]);
    
        if ($mail->send()){
            echo "<font color='green'>Mail gonderimi basarili! Teşekkürler.</font>";
            echo 'Ticket ID Numaranız:' .($ticket_id);
            header("refresh:10;url=/Ticket/Ticket.UI/Wiew/index.php");
        }
        else
            echo "<font color='red'>Dosya gönderme işlemi başarısız.</font>";
            header("Location:/Ticket/Ticket.UI/Wiew/index.php");
        }  
    }
}

?>