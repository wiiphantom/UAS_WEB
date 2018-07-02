<?php 
    $title = "Tambah Data Barang";
    $barang_tambah = "active";
    $title_section = "Tambah Barang";
    include "pengaturan/koneksi.php";
    include "pengaturan/header.php";
    include "pengaturan/header-menu.php";
    include "pengaturan/sidebar-menu.php";

    $id = $_GET['id_barang'];
    $query ="SELECT * FROM barang,merk,kategori,gudang WHERE 
    barang.id_merek=merk.id_merk AND
    barang.id_gudang=gudang.id_gudang AND
    barang.id_kategori=kategori.id_kategori AND     
    barang.id_barang='".$id."'";
    $sql = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($sql);
?>
<div class="content-wrapper">
    <?php include "pengaturan/content-header.php" ?> 
        <section class="content">
    <?php //include "pengaturan/content-section.php" ?> 
            
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Form Edit Barang</h3>
            </div>
            <!-- FORM TAMBAH DATA BARANG -->
            <form role="form" action="proses/proses_ubah.php?modul=barang" method="post" enctype="multipart/form-data">
              <div class="box-body">

                <div class="form-group">
                  <label for="id_kategori">ID Kategori</label>
                  <input type="text" class="form-control" id="id_barang" name="id_barang" placeholder="id Kategori" autocomplete="on" value="<?php echo $data['id_barang']; ?>" readonly/> 
                  <!-- Menggunakan Kode Otomatis Kategori -->
                </div>

                <div class="form-group">
                  <label for="product_image">Image</label>
                  <div class="kv-avatar">
                      <div class="file-loading">
                          <input id="product_image" name="product_image" type="file">
                          <i><font color="red">*kosongkan foto jika tidak diubah </font>
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="product_name">Nama Produk</label>
                  <input type="text" class="form-control" id="product_name" name="product_name" placeholder="nama produk" value="<?php echo $data['nama_barang']; ?>" autocomplete="on"/>
                </div>

                <div class="form-group">
                  <label for="sku">SKU</label>
                  <input type="text" class="form-control" id="sku" name="sku" placeholder="Enter sku" value="<?php echo $data['sku']; ?>" autocomplete="on" />
                </div>

                <div class="form-group">
                  <label for="qty">Qty</label>
                  <input type="text" class="form-control" id="qty" name="qty" placeholder="Enter Qty" value="<?php echo $data['stok']; ?>" autocomplete="on" />
                </div>

                <div class="form-group">
                  <label for="description">Deskripsi Produk</label>
                  <textarea type="text" class="ckeditor" id="deskripsi" name="deskripsi">
                  <?php echo $data['deskripsi']; ?>
                  </textarea>
                </div>

                <div class="form-group">
                  <label for="brands">Merek</label>
                  <select class="form-control select_group" id="brands" name="brands">   
                    <option value="<?php echo $data["id_merk"]; ?>"><?php echo $data["nm_merk"]; ?></option>
                    <?php //Menampilkan Data Merk Pada Drop Down
                    $query = "SELECT * FROM merk";
                    $sql = mysqli_query($koneksi, $query) or die("database error:". mysqli_error($koneksi));
                    while( $datamerk = mysqli_fetch_array($sql) ) {

                    ?>
                    <option value="<?php echo $datamerk["id_merk"]; ?>"><?php echo $datamerk["nm_merk"]; ?></option>
                    <?php 
                    }
                    //mysqli_close($koneksi);
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="category">Kategory</label>
                  <select class="form-control select_group" id="category" name="category">
                    <option value="<?php echo $data["id_kategori"]; ?>"><?php echo $data["nm_kategori"]; ?></option>
                  <?php //Menampilkan Data Kategori Pada Drop Down
                
                    $query2 = "SELECT * FROM kategori";
                    $sql = mysqli_query($koneksi, $query2) or die("database error:". mysqli_error($koneksi));
                    while( $datakategori = mysqli_fetch_array($sql) ) {

                    ?>
                    <option value="<?php echo $datakategori["id_kategori"]; ?>"><?php echo $datakategori["nm_kategori"]; ?></option>
                    <?php 
                    }
                    //mysqli_close($koneksi);
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="store">Gudang</label>
                  <select class="form-control select_group" id="store" name="store">
                    <option value="<?php echo $data["id_gudang"]; ?>"><?php echo $data["nama_gudang"]; ?></option>
                   <?php //Menampilkan Data Kategori Pada Drop Down
                
                    $query = "SELECT * FROM gudang";
                    $sql = mysqli_query($koneksi, $query) or die("database error:". mysqli_error($koneksi));
                    while( $datagu = mysqli_fetch_array($sql) ) {

                    ?>
                    <option value="<?php echo $datagu["id_gudang"]; ?>"><?php echo $datagu["nama_gudang"]; ?></option>
                    <?php 
                    }
                    //mysqli_close($koneksi);
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="store">Availability</label>
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