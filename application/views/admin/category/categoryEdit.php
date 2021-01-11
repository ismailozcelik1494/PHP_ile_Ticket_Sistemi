<?php $this->load->view('admin/include/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kategori Düzenle
        <small>Opsiyonel Kategoriler</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('panel'); ?>"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
        <li class="active">Kategori Düzenle</li>
      </ol>
    </section>

    <!-- Main content -->
      <!--------------------------
        | Your Page Content Here |
        -------------------------->

  <section class="content">
  <?php $this->load->view('admin/include/alert'); ?>
     <div class="row">
     
     <div class="col-md-6">
  <form action="<?php echo base_url("category/categoryList/update/$category->OID")?>" method="post" >
     <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Kategori Düzenle</h3>
            </div>
            <div class="box-body">
              <!-- Date -->
              <div class="form-group">
                <label>Kategori Adı</label>
                <input type="text" class="form-control" name="categoryName" value="<?php echo $category->categoryName; ?>" placeholder="Başlık ...">
              </div>
              <!-- /.form group -->
              <div class="form-group">
                <label>Kategori Açıklama</label>
                <textarea class="form-control" rows="5" name="categoryDescription"><?php echo $category->categoryDescription; ?></textarea>
              </div>
              <!-- Date range -->
              <div class="form-group">
                <label>Durumu(Aktif/Pasif):</label> 
                <div class="checkbox">
                      <input type="checkbox" name="isActive" data-on="Aktif"
                      data-off="Pasif" data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                      <?php echo ($category->isActive ==1) ? "checked" : "" ;?>
                      />
                  </div>
                <div id="console-event"></div>
              </div>
              <!-- /.form group -->

              <!-- Date and time range -->
              <div class="form-group">
                <label>Eklenme Tarihi:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" disabled class="form-control pull-right" value="<?php echo $category->createdAt; ?>" name="<?php echo $createdAt = date('Y-m-d H:i:s'); ?>" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              </div>
              <!-- /.form group -->
              <div class="box-footer">
                <a href="<?php echo base_url("category/categoryList")?>" type="button" class="btn btn-danger">İptal</a>
                <button type="submit" value="Kaydet" class="btn btn-success pull-right">Kaydet</button>
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