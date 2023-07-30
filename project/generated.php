<?php 
require('koneksi.php');
	$sql_tampil = "SELECT *, COUNT(id_masakan) AS jumlah FROM detail_order WHERE status_detail_order = 'sudah bayar' GROUP BY id_masakan";
	// var_dump($sql_tampil);
	$exe_tampil = mysqli_query($koneksi,$sql_tampil);
	
		   header("Content-type: application/vnd-ms-excel");
   			 header("Content-Disposition: attachment; filename=laporanPenjualan.xls");
	
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container mt-5">
	<div class="row">
	<table class="table table-hover table-bordered table-sm">
		<form method="POST">
		<thead class="thead-dark">
			<tr>
				<!-- <th>id_order</th> -->
				<th>id_masakan</th>
				<th>Jumlah</th>
			</tr>
		</thead>
		<?php foreach ($exe_tampil as $data) : ?>
		<tbody>
			<tr>
				<td><?= $data['id_masakan'];?></td>	
				<td><?= $data['jumlah']?></td>
			</tr>
		</tbody>
	<?php endforeach; ?>
	</form>
	</table>
	</div>
	</div>

</body>
</html>