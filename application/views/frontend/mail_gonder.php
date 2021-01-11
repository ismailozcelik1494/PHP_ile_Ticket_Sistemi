<!Doctype html>
<html lang="tr">
<head>
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-tofit=no">
 <title>PHP - İpsizcambaz Destek Formu</title>
 <!-- Bootstrap CDN -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
 <!-- Style CSS -->
 <link rel="stylesheet" type="text/css" href="<?php echo base_url('assests/FrontEnd/'); ?>style.css">
 <link rel="icon" href="//www.ipsizcambaz.com/cdn/assets/images/favicon.png" type="image/x-icon">
</head>
<body style="padding-top: 25px;">
<div class="col-md-6 offset-md-3">
<?php
    $alert = $this->session->userdata("alert");
    if($alert){ ?>
         <div class='alert alert-<?php echo $alert["type"]; ?> alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <h4><i class='icon fa fa-<?php echo $alert["icon"]; ?>'></i> <?php echo $alert["title"]; ?></h4>
            <?php echo $alert["message"]; ?> Ticket ID Numaranız: <?php echo $alert["ticket_id"]; ?>
        </div>
    <?php  
   }
?>
<form action="<?php echo base_url("view/anasayfa/gonder")?>" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label for="exampleInputText2">Ad-Soyad:</label>
    <input type="text" class="form-control" name="nameSurname" id="nameSurname" placeholder="Adınız-Soyadınız">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">E-Posta Adresiniz:</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="E-Posta Adresi">
    <small id="emailHelp" class="form-text text-muted">Size ulaşabilmem için Lütfen E-Posta adresinizi giriniz.</small>
  </div>
  <div class="form-group">
   <label for="example-tel-input">Tel No:</label>
   <input class="form-control" type="tel" placeholder="+90-(555)-555-5555" name="telephone" id="telephone">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Kategori Seçiniz</label>
    <select class="form-control" id="exampleFormControlSelect1" name="categoryID">
      <?php
          foreach ($list as $Category){ ?>
              <option value="<?php echo $Category->OID ?>"><?php echo $Category->categoryName ?></option>
          <?php 
        }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputText1">Belirtmek istediğiniz Konu:</label>
    <input type="text" class="form-control" name="description" id="description" placeholder="Konu">
  </div>
  <div class="form-group">
    <label for="exampleInputText2">Belirtmek istediğiniz Mesaj:</label>
    <textarea id="textarea" rows="4" class="form-control" name="message" id="message" placeholder="Mesajınız..." ></textarea>
  </div>
  <div class="form-group">
    <div class="custom-file">
      <input type="file" class="custom-file-input" name="attechment" accept=".doc,.docx,.pdf,.png,.jpeg">
      <label class="custom-file-label" for="validatedInputGroupCustomFile" data-browse="Dosya Seç">Göndermek istediğiniz dosyayı seçiniz...</label>
    </div>
  </div>
  <!-- <button type="submit" class="btn btn-success">Ticket At</button> -->
  <input type="submit" class="btn btn-success" value="Ticket At">
</form>
</div>
</body>

<!--
<script type="text/JavaScript">

function kontrrol(){

if (document.frrm.kimden.value=="")
   {
alert("Kim Oldugunuzu Belirtiniz")
document.frrm.kimden.focus();
return false;
}

if (document.frrm.konu.value=="")
   {
alert("Konuyu Belirtiniz")
document.frrm.konu.focus();
return false;
}

if (document.frrm.mesaj.value=="")
   {
alert("Mesaj Yazmayi Unuttunuz")
document.frrm.mesaj.focus();
return false;
}

}
</script>
-->

</html>