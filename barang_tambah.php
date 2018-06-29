<?php 
    $title = "Tambah Data Barang";
    $barang_tambah = "active";
    $title_section = "Tambah Barang";
    include "pengaturan/koneksi.php";
    include "pengaturan/header.php";
    include "pengaturan/header-menu.php";
    include "pengaturan/sidebar-menu.php";
    

    $kode_total = "SELECT max(id_barang) as maxKode from barang"; // mencari kode barang dengan nilai paling besar
          $eksekusi1 = mysqli_query($koneksi,$kode_total);  // kueri eksekusi di php
          $data = mysqli_fetch_array($eksekusi1);
          $id_bar = $data['maxKode'];
          $id_urut = (int) substr($id_bar, 3, 3);
          $id_urut++;
          $char = "BRG";
          $id_bar = $char . sprintf("%03s", $id_urut);
          //mysqli_close($koneksi);
          ?>
?>
<div class="content-wrapper">
    <?php include "pengaturan/content-header.php" ?> 
        <section class="content">
 
            
        <div class="box">
            <div class="box-header">

                <h3 class="box-title">Form Tambah Barang</h3>
            </div>
            <!-- FORM TAMBAH DATA BARANG -->
            <form role="form" action="proses/proses_tambah.php?modul=barang" method="post" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="id_kategori">ID barang</label>
                  <input type="text" class="form-control" id="id_barang" name="id_barang" placeholder="id Kategori" autocomplete="on" value="<?php echo $id_bar; ?>" readonly/> 
                  <!-- Menggunakan Kode Otomatis Barang -->
              </div>
              
              <div class="box-body">
                <div class="form-group">
                  <label for="product_image">Image</label>
                  <div class="kv-avatar">
                      <div class="file-loading">
                          <input id="product_image" name="product_image" type="file">
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="product_name">Nama Produk</label>
                  <input type="text" class="form-control" id="product_name" name="product_name" placeholder="nama produk" autocomplete="on"/>
                </div>

                <div class="form-group">
                  <label for="sku">SKU</label>
                  <input type="text" class="form-control" id="sku" name="sku" placeholder="Enter sku" autocomplete="on" />
                </div>

                <div class="form-group">
                  <label for="qty">Qty</label>
                  <input type="text" class="form-control" id="qty" name="qty" placeholder="Enter Qty" autocomplete="on" />
                </div>

                <div class="form-group">
                  <label for="description">Deskripsi Produk</label>
                  <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter Description" autocomplete="off"></textarea>
                <script>CKEDITOR.replace('description');</script>
                </div>
                <div class="form-group">
                  <label for="brands">Merek</label>
                  <select class="form-control select_group" id="brands" name="brands">   
                    <?php //Menampilkan Data Merk Pada Drop Down
                    $query = "SELECT * FROM merk";
                    $sql = mysqli_query($koneksi, $query) or die("database error:". mysqli_error($koneksi));
                    while( $data = mysqli_fetch_array($sql) ) {

                    ?>
                    <option value="<?php echo $data["id_merk"]; ?>"><?php echo $data["nm_merk"]; ?></option>
                    <?php 
                    }
                    //mysqli_close($koneksi);
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="category">Kategory</label>
                  <select class="form-control select_group" id="category" name="category">
                  <?php //Menampilkan Data Kategori Pada Drop Down
                
                    $query2 = "SELECT * FROM kategori";
                    $sql = mysqli_query($koneksi, $query2) or die("database error:". mysqli_error($koneksi));
                    while( $data = mysqli_fetch_array($sql) ) {

                    ?>
                    <option value="<?php echo $data["id_kategori"]; ?>"><?php echo $data["nm_kategori"]; ?></option>
                    <?php 
                    }
                    //mysqli_close($koneksi);
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="store">Gudang</label>
                  <select class="form-control select_group" id="store" name="store">
                   <?php //Menampilkan Data Kategori Pada Drop Down
                
                    $query = "SELECT * FROM gudang";
                    $sql = mysqli_query($koneksi, $query) or die("database error:". mysqli_error($koneksi));
                    while( $data = mysqli_fetch_array($sql) ) {

                    ?>
                    <option value="<?php echo $data["id_gudang"]; ?>"><?php echo $data["nama_gudang"]; ?></option>
                    <?php 
                    }
                    //mysqli_close($koneksi);
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="store">Ketersedian</label>
                  <select class="form-control" id="availability" name="status">
                    <option value="1">Ada</option>
                    <option value="2">Tidak Ada</option>
                  </select>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="barang_master.php" class="btn btn-warning">Back</a>
              </div>
            </form>
        </div>

        

        <section>
</div>
<?php include "pengaturan/footer.php";?>