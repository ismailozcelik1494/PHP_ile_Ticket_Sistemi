<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>login</title>
  </head>
  <body>
    <form  action=<?php echo base_url().'Login/loginControl';?> method="post">
      <input type="text" name="username" value="" placeholder="Kullanıcı Adı"> <br>
      <input type="password" name="password" value="" placeholder="Parola"> <br>
      <input type="submit" name="login" value="Giriş">
    </form>
    <?php echo @$validation_error; ?>
  </body>
</html>
