<?php 
    $title = "Data Merk Barang";
    $barang_tambah = "active";
    $title_section = "Merk Barang";
    include "pengaturan/koneksi.php";
    include "pengaturan/header.php";
    include "pengaturan/header-menu.php";
    include "pengaturan/sidebar-menu.php";
?>
<?php 
          $kode_total = "SELECT max(id_merk) as maxKode from merk"; // mencari kode barang dengan nilai paling besar
          $eksekusi1 = mysqli_query($koneksi,$kode_total);  // kueri eksekusi di php
          $data = mysqli_fetch_array($eksekusi1);
          $id_merk = $data['maxKode'];
          $id_urut = (int) substr($id_merk, 3, 3);
          $id_urut++;
          $char = "MRK";
          $id_merk = $char . sprintf("%03s", $id_urut);
          mysqli_close($koneksi);
          ?> 


<div class="content-wrapper">
    <?php include "pengaturan/content-header.php" ?> 
        <section class="content">
            <?php //include "pengaturan/content-section.php" ?> 
            
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Form Merk Barang</h3>
            </div>
            <!-- FORM TAMBAH DATA BARANG -->
            <form role="form" action="proses/proses_tambah.php?modul=merk" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="id_merk">ID MERK</label>
                  <input type="text" class="form-control" id="id_merk" name="id_merk" placeholder="id merk" autocomplete="on"  value="<?php echo $id_merk; ?>" readonly/>
                </div>

                <div class="form-group">
                  <label for="nm_merk">Nama Merk</label>
                  <input type="text" class="form-control" id="nm_merk" name="nm_merk" placeholder="Nama Merk" autocomplete="on" />
                </div>

                 <div class="form-group">
                  <label for="status">Status</label>
                  <select class="form-control" id="availability" name="status">
                    <option value="active">Aktif</option>
                    <option value="not-active">Tidak Aktif</option>
                  </select>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="merk.php" class="btn btn-warning">Back</a>
              </div>
            </form>
        </div>

        

        <section>
</div>
<?php include "pengaturan/footer.php";?>