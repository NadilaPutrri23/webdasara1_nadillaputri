<?php
	
	$sql_tampil = "SELECT *, COUNT(id_masakan) AS jumlah FROM detail_order WHERE keterangan = keterangan AND status_detail_order = 'sedang dipesan/(belum bayar)' GROUP BY keterangan";
	// var_dump($sql_tampil);
	$exe_tampil = mysqli_query($koneksi,$sql_tampil);
	// var_dump($exe_tampil);


  ?>
	<h1 align="center" class="mt-5">Transaksi</h1>
	<div class="container mt-5">
	<div class="row">
	<table class="table table-hover table-bordered table-sm">
		<form method="POST">
		<thead class="thead-dark">
			<tr>
				<!-- <th>id_order</th> -->
				<th>id_user</th>
				<th>status_detail</th>
				<th>Jumlah</th>
				<th colspan="2"></th>
			</tr>
		</thead>
		<?php while ($data = mysqli_fetch_array($exe_tampil)) : ?>
		<tbody>
			<tr>
				<!-- <td><?= $data['id_order'];?></td>	 -->
				<td><?= $data['keterangan'];?></td>	
				<td><?= $data['status_detail_order'];?></td>
				<td><?= $data['jumlah'];?></td>
				<td><a href="bayar.php?
				keterangan=<?= $data['keterangan'];?>
				&id_order=<?= $data['id_order'];?>" class="btn btn-warning btn-block btn-sm" name="bayar">Bayar</a></td>
			</tr>
		</tbody>
	<?php endwhile; ?>
	</form>
	</table>
	</div>
	</div>