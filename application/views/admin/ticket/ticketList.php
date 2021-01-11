<?php $this->load->view('admin/include/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gelen Ticket Listesi
        <small>Opsiyonel Ticketler</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('panel'); ?>"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
        <li class="active">Gelen Ticket Listesi</li>
      </ol>
    </section>

    <!-- Main content -->
      <!--------------------------
        | Your Page Content Here |
        -------------------------->
  <section class="content">
  
  <div class="row">
        <div class="col-xs-12">
        <?php $this->load->view('admin/include/alert'); ?>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Opsiyonel Ticketler</h3>
              <div class="box-tools">
                <form action="<?php echo base_url('ticket/ticketList/skeyword'); ?>" method="post" >
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Ad-Soyad ile Ara...">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                <tr>
                  <th>Ticket No</th>
                  <th>Ad-Soyad</th>
                  <th>E-Mail</th>
                  <th>Durum</th>
                  <th>Mesaj</th>
                  <th>Eklenme Tarihi</th>
                  <th style="width:13%;">Kategori İşlemleri</th>
                </tr>
				      <?php
                 foreach ($tickets as $Ticket){ ?>
                    <tr>
                    <td style="width: 10%"><?php echo $Ticket->ticketID; ?></td>
                      <td style="width: 10%"><?php echo $Ticket->nameSurname; ?></td>
                      <td><?php echo $Ticket->email; ?></td>
                      <td>
                        <input id="toggle-event"
                            data-onstyle="success"
                            data-size="midi"
                            data-on="Aktif"
                            data-off="Pasif"
                            datao-offstyle="danger"
                            type="checkbox"
                            data-toggle="toggle"
                        <?php echo ($Ticket->isActive == 1) ? "checked" : ""; ?>>   
                      </td>
                      <td><?php echo $Ticket->message; ?></td>
                      <td style="width: 13%"><?php echo $Ticket->createdAt; ?></td>
                      <td style="width: 13%">
                      <div class="btn-group-horizantal">
                        <a href="<?php echo base_url("ticket/ticketList/add/".$Ticket->OID); ?>" type=button class="btn btn-success"><i class="fa fa-reply-all"></i></a>
                        <a href="<?php echo base_url("ticket/ticketList/edit/".$Ticket->OID); ?>" type=button class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <a type="button" class="btn btn-danger" href="javascript:;" onclick="return confirm_Action('<?php echo base_url(); ?>ticket/ticketList/delete/<?php echo $Ticket->OID; ?>');" ><i class="fa fa-trash"></i></a>
                      </div>
                    </td>
                </tr>
               <?php }
              ?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

  </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('admin/include/footer'); ?>