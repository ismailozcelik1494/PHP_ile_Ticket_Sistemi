<?php $this->load->view('admin/include/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Ticket Düzenle
        <small>Tüm Ticketlar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('panel'); ?>"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
        <li class="active">Ticket Düzenle</li>
      </ol>
    </section>

    <!-- Main content -->
      <!--------------------------
        | Your Page Content Here |
        -------------------------->

  <section class="content">
  <?php $this->load->view('admin/include/alert'); ?>

  <form action="<?php echo base_url('ticket/ticketList/update/'.$ticket->OID); ?>" method="post" >
<div class="row">
  <div class="col-md-6">
  
    <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Ticket Düzenle</h3>
            </div>
            <div class="box-body">
              
              <div class="form-group">
                <label>Ticket - Adsoyad</label>
                <input type="text" class="form-control" name="username" value="<?php echo $ticket->username; ?>">
              </div>
              
              <div class="form-group">
                <label for="exampleInputText2">Gelen Mesaj:</label>
                <textarea id="textarea" rows="4" disabled class="form-control"><?php echo $ticket->message; ?></textarea>
              </div>
              <div class="form-group">
                <label>Ticket - Dosya Yolu</label>
                <input type="text" disabled class="form-control" name="fileUrl" value="<?php echo $ticket->fileUrl; ?>">
              </div>
              <div class="form-group">
                <label>Ticket - Kategori Adı</label>
                <input type="text" disabled class="form-control" name="categoryID" value="<?php echo $ticket->categoryID; ?>">
              </div>
              <div class="form-group">
                <label>Ticket - Konu</label>
                <input type="text" disabled class="form-control" name="description" value="<?php echo $ticket->description; ?>">
              </div>
              <div class="form-group">
                <label>Ticket - Okunma Sayısı</label>
                <input type="text" disabled class="form-control" name="displayCount" value="<?php echo $ticket->displayCount; ?>">
              </div>
              </div>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
<div class="col-md-6">
<div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Ticket Bilgileri</h3>
            </div>
            <div class="box-body">
            <div class="form-group">
                <label>Ticket - ID</label>
                <input type="text" class="form-control" name="ticketID" value="<?php echo $ticket->ticketID; ?>">
              </div>
            <div class="form-group">
                <label>Durumu(Aktif/Pasif):</label> 
                <div class="checkbox">
                      <input type="checkbox" name="isActive" data-on="Aktif"
                      data-off="Pasif" data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                      <?php echo ($ticket->isActive ==1) ? "checked" : "" ;?>
                      />
                  </div>
                <div id="console-event"></div>
              </div>
              <div class="form-group">
                <label for="exampleInputText2">Göndermek istediğiniz Mesaj:</label>
                <textarea id="textarea" rows="4" class="form-control" name="message" id="message" placeholder="Mesajınız..." ></textarea>
              </div>
              <div class="form-group">
                <div class="custom-file">
                <label class="custom-file-label" for="validatedInputGroupCustomFile" data-browse="Dosya Seç">Göndermek istediğiniz dosyayı seçiniz...</label>
                  <input type="file" class="custom-file-input form-control" name="attechment" accept=".doc,.docx,.pdf,.png,.jpeg">
                </div>
              </div>
            </div>
            <div class="box-footer">
                <a href="<?php echo base_url("ticket/ticketList")?>" type="button" class="btn btn-danger">İptal</a>
                <button type="submit" value="Kaydet" class="btn btn-success pull-right">Kaydet</button>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
</div>


</div>
</div>
  </form>
  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  <?php $this->load->view('admin/include/footer'); ?>