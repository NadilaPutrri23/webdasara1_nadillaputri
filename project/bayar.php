 	 <?php 
	require('koneksi.php');
	session_start();
	//$id_user = $_SESSION['id_user'];
	// var_dump($id_user);

	$get_id = $_GET['keterangan'];
	$get_trans = $_GET['id_order'];

		var_dump($get_id);
		$sql_bayar = "UPDATE detail_order SET status_detail_order = 'sudah bayar' 
		WHERE keterangan  = '$get_id'";
		// var_dump($sql_bayar);
		$exe_bayar = mysqli_query($koneksi,$sql_bayar);
		// var_dump($exe_bayar);
		$sql_bayar2 = "UPDATE order_pesanan SET status_order = 'sudah bayar' 
		WHERE id_user  = '$get_id'";
		$exe_bayar2 = mysqli_query($koneksi,$sql_bayar2);
		if ($exe_bayar2) {
			echo "</br>berhasil";
			header('location:tampilan.php');
			$sql = "INSERT INTO transaksi (id_transaksi,id_user,id_order) VALUES
			 (null,$get_id,$get_trans)";
			 $exe = mysqli_query($koneksi,$sql);
			 var_dump($sql);
			 if ($exe) {
			 	echo "</br>berhasil trans";
			 }else{
			 	echo "</br>gagal trans";
			 }
		 }else{
		 	echo "gagal";
		}



 ?>