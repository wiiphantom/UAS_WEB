<?php 
    $title = "Tambah Barang Masuk";
    $master = "active menu-open";
    $barang = "active";
    $barang_active="active open";
    $title_section = "Tambah Barang Masuk";
    include "pengaturan/koneksi.php";
    include "pengaturan/header.php";
    include "pengaturan/header-menu.php";
    include "pengaturan/sidebar-menu.php";
?>
<head>  
      <title>PHP - Sending multiple forms data through jQuery Ajax</title>  
    <link rel="stylesheet" href="assets/baru/jquery-ui.css">
    <link rel="stylesheet" href="assets/baru/bootstrap.min.css">
    <script src="assets/baru/jquery-1.12.4.js"></script>
    <script src="assets/baru/jquery-ui.js"></script>
</head>
<div class="content-wrapper">
    <!-- Untuk Menampilkan Breadcum Otomatis Sesuai Isi Halaman -->
    <?php include "pengaturan/content-header.php" ?> 
    <section class="content">
        <?php //include "pengaturan/content-section.php" ?> 
            <!-- <div id="messages"></div>
            <a href="barang_tambah.php"><button class="btn btn-primary" data-toggle="modal">Tambah Barang Masuk</button></a>
            <br>
            <br> -->
			
			

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

        <div id="messages"></div>

        

        <div class="box">
          <form method="post" id="detail_barang_masuk" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-12 control-label">Date: <?php echo date('Y-m-d') ?></label>
                </div>
                <div class="form-group">
                  <label class="col-sm-12 control-label">Date: <?php echo date('h:m a') ?></label>
                </div>

                <div class="col-md-4 col-xs-12 pull pull-left">
                  <div class="form-group">
                    <label class="col-sm-5 control-label" style="text-align:left;">ID Masuk</label>
                    <div class="col-sm-7">
                    <input type="text" class="form-control" id="id_barang" name="id_barang" placeholder="id masuk" autocomplete="on" value="<?php /*echo $id_bar;*/ ?>" readonly/> 
                  <!-- Menggunakan Kode Otomatis Barang -->
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-5 control-label" style="text-align:left;">Supplyer</label>
                    <div class="col-sm-7">
					           <select class="form-control select_group product" data-row-id="row_1" id="product_1" name="product[]" style="width:100%;" onchange="getProductData(1)" required>
                            <option value=""></option>
                            <option value="3">SUPPLIER 1</option>
                            <option value="2">SUPPLIER 2</option>
                        </select>
                    </div>
                  </div>
                </div>  

                <br /> <br/>

                <div class="table-responsive">
                <table class="table table-striped table-bordered" id="tambah_data">
                  <thead>
                    <tr>
                      <th style="width:50%">Product</th>
                      <th style="width:10%">Qty</th>
                      <th style="width:10%"><button type="button" name="add" id="add" class="btn btn-default"><i class="fa fa-plus"></i></button></th>
                    </tr>
                  </thead>

                   <tbody>
                     
                   </tbody>
                </table>
              </div>

                <br /> <br/>

                <div class="col-md-6 col-xs-12 pull pull-right">
				        <div class="form-group">
                    <label for="net_amount" class="col-sm-5 control-label">Total QTY</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="net_amount" name="net_amount" disabled autocomplete="off">
                      <input type="hidden" class="form-control" id="net_amount_value" name="net_amount_value" autocomplete="off">
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="insert" id="insert" class="btn btn-primary">SIMPAN</button>
                <a href="transaksi_brg_masuk.php" class="btn btn-warning">Back</a>
              </div>
            </form>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->
    

  </section>
  <!-- /.content -->

			
			
			
			
			
			


</div>

<?php include "pengaturan/footer.php";?>