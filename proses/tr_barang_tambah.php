<?php
$koneksi=mysqli_connect("localhost", "root", "", "z_uas_web")

if(isset($_POST["product"]))
	{
		$product=$_POST["product"];
		$qty=$_POST["qty"];
		$query='';
		for($count=0; $count < count($product); $count++)
		{
			$product_clean=mysqli_real_escape_string($koneksi, $product[$count]);
			$qty_clean=mysqli_real_escape_string($koneksi, $qty[$count]);
			if($product_clean !='' && $qty_clean != '')
			{
				$query .= '
				INSERT INTO detail_masuk(id_barang,qty) VALUES("'.$product_clean.'","'.$qty_clean.'");
				';

			}
		}
		if($query != ''){
			if(mysqli_multy_query($koneksi, $query)){
				echo "sukses>";
			} else {
				echo "gagal";
			}
		}else{
			echo "data tidak valid";
		}

	}

?>