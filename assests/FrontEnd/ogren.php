<!Doctype html>
<html lang="tr">
<head>
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-tofit=no">
 <title>PHP - İpsizcambaz Destek Formu</title>
 <!-- Bootstrap CDN -->
 <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
 <!-- Style CSS -->
 <link rel="stylesheet" type="text/css" href="/Ticket/Ticket.UI/Wiew/style.css">
 <link rel="icon" href="//www.ipsizcambaz.com/cdn/assets/images/favicon.png" type="image/x-icon">
</head>
<body>
<div class="form-group">
    <div class="custom-file">
      <input type="file" class="custom-file-input" name="dosya" id="dosya" required>
      <label class="custom-file-label" for="validatedInputGroupCustomFile" data-browse="Dosya Seç">Göndermek istediğiniz dosyayı seçiniz...</label>
    </div>
  </div>
</body>
</html>

<?php

   $file = $_FILES["profile_image_url"];
   print_r($file);

?>