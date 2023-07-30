<?php 
		
	require('koneksi.php');
	$get_id= $_GET['id_order'];
	$sql_hapus = "DELETE FROM detail_order WHERE id_order = '$get_id'";
	$exe_hapus = mysqli_query($koneksi,$sql_hapus);
	
	if ($exe_hapus) {
		echo "berhasil</br>";

			header('location:tampilan.php');
	$sql_hapus2 = "DELETE FROM order_pesanan WHERE id_order = '$get_id'";
			var_dump($sql_hapus2);
			$exe_hapus2 = mysqli_query($koneksi,$sql_hapus2);
			if ($exe_hapus2) {
				echo "</br>berhasil 2";
			}else{echo "</br>gagal 2";}
	}else{
	echo "gagal</br>";
	}
			// var_dump($exe_hapus2);]
	// if ($exe_hapus && $exe_hapus2) {
	// 	echo "Berhasil";
	// 	header('location:tampilan.php');
	// }else{
	// 	echo "gagal";
	// }


?>