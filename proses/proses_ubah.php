<?php
//session_start();
include "../pengaturan/koneksi.php";

switch($_GET['modul']) {

	//--------------------------------------MEREK-----------------------------------------		

	case 'merk' :
		$id = $_POST["id_merk"];
		$nama = $_POST["nm_merk"];
		$stts = $_POST["status"];

		
		$query="UPDATE merk SET nm_merk='".$nama."', status='".$stts."' WHERE id_merk='".$id."'";
		$sql = mysqli_query($koneksi,$query);
		if ($sql) {
			echo "<script language=javascript>alert('Berhasil Ubah Data'); document.location='../merk.php';</script>";
		} else {
			echo "<script language=javascript>alert('Gagal Ubah Data'); document.location='../merk.php';</script>";
		}
		mysqli_close($koneksi);
	break;

	//--------------------------------------KATEGORI-----------------------------------------		

	case 'kategori':
		$id = $_POST["id_kategori"];
		$nama = $_POST["nama_kategori"];
		$stts = $_POST["status"];

		
		$query="UPDATE kategori SET nm_kategori='".$nama."', status='".$stts."' WHERE id_kategori='".$id."'";
		$sql = mysqli_query($koneksi,$query);
		if ($sql) {
			echo "<script language=javascript>alert('Berhasil Ubah Data'); document.location='../kategori.php';</script>";
		} else {
			echo "<script language=javascript>alert('Gagal Ubah Data'); document.location='../kategori.php';</script>";
		}
		mysqli_close($koneksi);
	break;

	//--------------------------------------MEREK-----------------------------------------		

	case 'barang':

		$id = $_POST["id_barang"];
		$nama = $_POST["product_name"];
		$skun = $_POST["sku"];
		$stokn = $_POST["qty"];
		$deskripsin = $_POST["description"];
		$id_merkn = $_POST["brands"];
		$id_kategorin = $_POST["category"];
		$id_gudangn = $_POST["store"];
		$statusn = $_POST["status"];

		if(empty($_FILES['product_image']['name'])){ 
		$query="UPDATE barang SET sku='".$skun."',nama_barang='".$nama."', id_kategori='".$id_kategorin."', id_merek='".$id_merkn."', id_gudang='".$id_gudangn."', stok='".$stokn."',deskripsi='".$deskripsin."',status='".$statusn."' WHERE id_barang='".$id."' ";
				$sql = mysqli_query($koneksi,$query);
				if ($sql) {
					echo "<script language=javascript>alert('Data Berhasil Disimpan');";
					echo "document.location='../barang_master.php';</script>";
				}
				else {
				echo "<script language=javascript>alert('Data gagal Disimpan');";
				echo "document.location='../barang_master.php';</script>";
				} 
       }else{
       	//baris untuk variabel upload foto
		$nama_folder = "images/"; //folder menyimpan foto siswa
		$namafoto = $_FILES['product_image']['name']; //nama foto yang akan diupload
		$ukuran = $_FILES['product_image']['size']; //ukuran foto yang akan diupload
		$type = $_FILES['product_image']['type']; //type foto yang akan diupload
		$tmpname = $_FILES['product_image']['tmp_name']; //tempat temporary foto yang akan disimpan di server
		$ex=explode(".", $_FILES['product_image']['name']);//mengambil extensi foto
		$fotobaru = $nama.'.'.end($ex); //mengubah nama foto
		$uploadfoto = $nama_folder . $fotobaru; //menggabungkan nama folder dan nama foto
		
		//$query_email=mysql_query("select * from siswa where nisn='$nisn' AND nama_siswa='$nama'");  
		//$cek=mysql_num_rows($query_email);  
		//if($cek>0){  
		//			echo "<script language=\"Javascript\">\n";  
		//			echo "confirmed = window.confirm('Maaf, Data sudah ada!!'); self.history.back()";  
		//			echo "</script>";  
		//			}
		//else{
        if($type != 'image/gif'  &&  $type != 'image/jpg'  && $type != 'image/jpeg' && $type != 'image/png') {  
        echo "<script language=Javascript>";  
        echo "confirmed = window.confirm('File Yang Di izinkan Hanya jpg,jpeg,png,gif!!');self.history.back()";  
        echo "</script>";  
							}
		else{  
        if($ukuran>10000000){  
         echo "<script language=Javascript>";  
         echo "confirmed = window.confirm('File Yang Di izinkan Hanya berukuran kurang dari 1MB!!');self.history.back()";  
         echo "</script>";  
			}
		else{
		if (($type == 'image/jpeg') || ($type == 'image/jpg') || ($type == 'image/png')) {

				$query = "SELECT * FROM barang WHERE id_barang='".$id."'";
    			$sql = mysqli_query($koneksi, $query);
    			$data = mysqli_fetch_array($sql);
				// Cek apakah file foto sebelumnya ada di folder images
    			//if(is_file("../assets/images/".$data['gambar'])) // Jika foto ada
      			unlink("../assets/images/".$data['gambar']); // Hapus file foto sebelumnya yang ada di folder images
				move_uploaded_file($tmpname,"../assets/".$uploadfoto);    
				$query ="UPDATE barang SET gambar='".$fotobaru."',sku='".$skun."',nama_barang='".$nama."', id_kategori='".$id_kategorin."',id_merek='".$id_merkn."',id_gudang='".$id_gudangn."',stok='".$stokn."',deskripsi='".$deskripsin."',status='".$statusn."' WHERE id_barang='".$id."'";
				$sql = mysqli_query($koneksi,$query);
				if ($sql) {
					echo "<script language=javascript>alert('Data Berhasil Disimpan');";
					echo "document.location='../barang_master.php';</script>";
				}
				else {
				echo "<script language=javascript>alert('Data gagal Disimpan');";
				echo "document.location='../barang_master.php';</script>";
				}
			}
		}
		}
		//}



       }
		

	break;

	//--------------------------------------MEREK-----------------------------------------		

	case '':
	break;

	//--------------------------------------MEREK-----------------------------------------		

	case '':
	break;

	
}
?>