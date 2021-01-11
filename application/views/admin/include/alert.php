<?php
    $alert = $this->session->userdata("alert");
    if($alert){ ?>
         <div class='alert alert-<?php echo $alert["type"]; ?> alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <h4><i class='icon fa fa-<?php echo $alert["icon"]; ?>'></i> <?php echo $alert["title"]; ?></h4>
            <?php echo $alert["message"]; ?>
        </div>
    <?php  
   }
?>