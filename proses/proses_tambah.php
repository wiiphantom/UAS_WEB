<?php
//session_start();
include "../pengaturan/koneksi.php";

switch($_GET['modul']) {
	//--------------------------------------MEREK-----------------------------------------		
	case 'merk' :
		$id = $_POST["id_merk"];
		$nama = $_POST["nm_merk"];
		$stts = $_POST["status"];

		
		$query="INSERT INTO merk VALUES ('".$id."','".$nama."','".$stts."')";
		$sql = mysqli_query($koneksi,$query);
		if ($sql) {
			echo "<script language=javascript>alert('Berhasil Tambah Data'); document.location='../merk.php';</script>";
		} else {
			echo "<script language=javascript>alert('Gagal Tambah Data'); document.location='../merk.php';</script>";
		}
		mysqli_close($koneksi);
	break;

	//--------------------------------------KATEGORI-----------------------------------------		

	case 'kategori':
		$id = $_POST["id_kategori"];
		$nama = $_POST["nama_kategori"];
		$stts = $_POST["status"];

		
		$query="INSERT INTO kategori VALUES ('".$id."','".$nama."','".$stts."')";
		$sql = mysqli_query($koneksi,$query);
		if ($sql) {
			echo "<script language=javascript>alert('Berhasil Tambah Data'); document.location='../kategori.php';</script>";
		} else {
			echo "<script language=javascript>alert('Gagal Tambah Data'); document.location='../kategori.php';</script>";
		}
		mysqli_close($koneksi);
	break;

	//--------------------------------------BARANG-----------------------------------------		

	case 'barang':
		$id = $_POST["id_barang"];
		$nama = $_POST["product_name"];
		$sku = $_POST["sku"];
		$stok = $_POST["qty"];
		$deskripsi = $_POST["description"];
		$id_merk = $_POST["brands"];
		$id_kategori = $_POST["category"];
		$id_gudang = $_POST["store"];
		$status = $_POST["status"];

		
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
				move_uploaded_file($tmpname,"../assets/".$uploadfoto);
				$queryinsert ="INSERT INTO barang VALUES('".$id."','".$fotobaru."','".$sku."','".$nama."','".$id_kategori."','".$id_merk."','".$id_gudang."','".$stok."','".$deskripsi."','".$status."')";
				$sql = mysqli_query($koneksi,$queryinsert);
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

	break;

	//--------------------------------------TRANSAKSI BARANG MASUK-----------------------------------------		

	case 'tran_barang_masuk':
	if(isset($_POST["supplier"]))
	{
		$supplier=$_POST["supplier"];
		$product=$_POST["product"];
		$qty=$_POST["qty"];
		$query='';
		for($count=0; $count < count($supplier); $count++)
		{
			$supplier_clean=mysqli_real_escape_string($koneksi, $supplier[$count]);
			$product_clean=mysqli_real_escape_string($koneksi, $product[$count]);
			$qty_clean=mysqli_real_escape_string($koneksi, $qty[$count]);
			if($product_clean !='' && $supplier_clean != '' && $qty_clean != '')
			{
				$query .= '
				INSERT INTO detail_masuk VALUES("''","","'.$product_clean.'","'.$qty_clean.'","'.$supplier_clean.'");
				';

			}
		}
		if($query != ''){
			if(mysqli_multy_query($koneksi, $query)){
				echo "<script language=javascript>alert('Berhasil Tambah Data'); document.location='../merk.php';</script>";
			} else {
				echo "<script language=javascript>alert('Gagal Tambah Data'); document.location='../merk.php';</script>";
			}
		}else{
			echo "data tidak valid";
		}

	}
	break;

	//--------------------------------------MEREK-----------------------------------------		

	case '':
	$query="INSERT INTO merk VALUES ('".$id."','".$nama."','".$stts."')";
		$sql = mysqli_query($koneksi,$query);
		if ($sql) {
			echo "<script language=javascript>alert('Berhasil Tambah Data'); document.location='../merk.php';</script>";
		} else {
			echo "<script language=javascript>alert('Gagal Tambah Data'); document.location='../merk.php';</script>";
		}
		mysqli_close($koneksi);
	break;

	//--------------------------------------MEREK-----------------------------------------		


}
?>