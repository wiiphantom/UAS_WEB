<?php
//session_start();
include "../pengaturan/koneksi.php";

switch($_GET['modul']) {
	//--------------------------------------MEREK-----------------------------------------		
	case 'merk' :
		$id = $_GET["id"];
		
		$sql = "DELETE FROM merk WHERE id_merk = '".$id."' ";
		mysqli_query($koneksi,$sql);
		if($sql){
		echo '<script language="javascript">';
		echo 'alert("Data Dihapus"); document.location="../merk.php";';
		echo '</script>';
		//header("location: kategori.php");
		}else{
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='../merk.php'>Kembali</a>";
		}
		mysqli_close($koneksi);
	break;

	//--------------------------------------KATEGORI-----------------------------------------		

	case 'kategori':
		$id = $_GET["id"];
		
		$sql = "DELETE FROM kategori WHERE id_kategori = '".$id."' ";
		mysqli_query($koneksi,$sql);
		if($sql){
		echo '<script language="javascript">';
		echo 'alert("Data Dihapus"); document.location="../kategori.php";';
		echo '</script>';
		//header("location: kategori.php");
		}else{
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menghapus data.";
		echo "<br><a href='../kategori.php'>Kembali </a>";
		}
		mysqli_close($koneksi);
	break;

	//--------------------------------------MEREK-----------------------------------------		

	case '':
		case 'barang':
		$id = $_GET["id"];
		$query = "SELECT * FROM barang WHERE id_barang='".$id."'";
    	$sql = mysqli_query($koneksi, $query);
    	$data = mysqli_fetch_array($sql);
		$sql = "DELETE FROM barang WHERE id_barang = '".$id."' ";
		mysqli_query($koneksi,$sql);
		if($sql){
		unlink("../assets/images/".$data['gambar']);
		echo '<script language="javascript">';
		echo 'alert("Data Dihapus"); document.location="../barang_master.php";';
		echo '</script>';
		//header("location: kategori.php");
		}else{
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menghapus data...";
		echo "<br><a href='../master_barang.php'>Kembali</a>";
		}
		mysqli_close($koneksi);
	break;

	//--------------------------------------MEREK-----------------------------------------		

	case '':
	break;

	//--------------------------------------MEREK-----------------------------------------		

	case '':
	break;

	//--------------------------------------MEREK-----------------------------------------		


}
?>