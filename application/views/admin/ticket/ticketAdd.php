<?php $this->load->view('admin/include/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ticket Ekle
        <small>Opsiyonel Ticketler</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('panel'); ?>"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
        <li class="active">Ticket Ekle</li>
      </ol>
    </section>

    <!-- Main content -->
      <!--------------------------
        | Your Page Content Here |
        -------------------------->

  <section class="content">
     <div class="row">
     <?php $this->load->view('admin/include/alert'); ?>
     <div class="col-md-6">
  <form action="<?php echo base_url('ticket/ticketList/ticketAdd/'.$ticket->OID); ?>" method="post" >
     <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Ticket Ekle</h3>
            </div>
            <div class="box-body">
              <!-- Date -->
              <div class="form-group">
                <label>Ticket ID</label>
                <input type="text" class="form-control" name="ticketID" value="<?php echo $ticket->ticketID; ?>">
              </div>
              <div class="form-group">
                <label>Ticket Ad-Soyad</label>
                <input type="text" class="form-control" name="username" value="<?php echo $ticket->username; ?>">
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
                <label>Ticket Mesajı</label>
                <input type="text" class="form-control" name="message">
              </div>
              </div>
              <!-- /.form group -->
              <div class="box-footer">
                <a href="<?php echo base_url("ticket/ticketList")?>" type="button" class="btn btn-danger">İptal</a>
                <button type="submit" value="Kaydet" class="btn btn-success pull-right">Ekle</button>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
     </div>
  </form>
  </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  <?php $this->load->view('admin/include/footer'); ?>