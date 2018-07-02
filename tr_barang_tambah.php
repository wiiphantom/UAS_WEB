<?php
include "pengaturan/koneksi.php";
if(isset($_POST["product"]))
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
				INSERT INTO detail_masuk VALUES("'..'","'..'","'.$product_clean.'","'.$qty_clean.'","'.$supplier_clean.'");
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

?>