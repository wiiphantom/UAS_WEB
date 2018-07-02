<?php
$koneksi=mysqli_connect("localhost", "root", "", "z_uas_web");
$number=count($_POST['hidden_id_masuk']);
if($number>0){
	for ($i=0; $i < $number ; $i++) { 
		/*if(trim($_POST["hidden_id_masuk"]) !=''){

			$id_masuk= $_POST["hidden_id_masuk"];
			$nama_barang= $_POST["hidden_nama_barang"];
			$qty=$_POST["hidden_qty"];
		*/
			$data = array('id_masuk' => $_POST["hidden_id_masuk"][$i],
				 'nama_barang' => $_POST["hidden_nama_barang"][$i],
				'qty' => $_POST["hidden_qty"][$i]);

			$query="INSERT INTO detail_masuk VALUES ('','".$data['id_masuk']."','".$data['nama_barang']."','".$data['qty']."','')";
			$sql = mysqli_query($koneksi,$query);

		/*}*/
	}
}

?>