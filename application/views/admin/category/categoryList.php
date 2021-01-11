<?php $this->load->view('admin/include/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kategori Listesi
        <small>Opsiyonel Kategoriler</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('panel'); ?>"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
        <li class="active">Kategori Listesi</li>
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
        <a href="<?php echo base_url("category/categoryList/categoryAdd1")?>" type="button" class="btn btn-primary">Ekle</a><p>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Opsiyonel Kategoriler</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Ara...">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>Kategori ID</th>
                  <th>Kategori Adı</th>
                  <th>Aktif/Pasif Durumu</th>
                  <th>Eklenme Tarihi</th>
                  <th>Kategori İşlemleri</th>
                </tr>
                <?php
                  foreach ($list as $Category){ ?>
                  <tr>
                  <td><?php echo $Category->OID; ?> </td>
                  <td><?php echo $Category->categoryName; ?> </td>
                  <td>
                  <input id="toggle-event"
                      data-onstyle="success"
                      data-size="midi"
                      data-on="Aktif"
                      data-off="Pasif"
                      datao-offstyle="danger"
                      type="checkbox"
                      data-toggle="toggle"
                      <?php echo ($Category->isActive == 1) ? "checked" : ""; ?>
                    ><div id="console-event"></div>
                    <label id="label_event" ></label>
                  </td>
                  <td><?php echo $Category->createdAt; ?></td>
                  <td>
                    <div class="btn-group-horizantal">
                      <a href="<?php echo base_url("category/categoryList/$Category->OID"); ?>" type=button class="btn btn-success"><i class="fa fa-eye"></i></a>
                      <a href="<?php echo base_url("category/categoryList/edit/$Category->OID"); ?>" type=button class="btn btn-warning"><i class="fa fa-edit"></i></a>
                      <a type="button" class="btn btn-danger" href="javascript:;" onclick="return confirm_Action('<?php echo base_url(); ?>category/categoryList/delete/<?php echo $Category->OID; ?>');" ><i class="fa fa-trash"></i></a>
                    </div>
                </td>
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