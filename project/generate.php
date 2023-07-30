<?php
	
	// require('koneksi.php');
	$sql_tampil = "SELECT *, COUNT(id_masakan) AS jumlah FROM detail_order WHERE status_detail_order = 'sudah bayar' GROUP BY id_masakan";
	// var_dump($sql_tampil);
	$exe_tampil = mysqli_query($koneksi,$sql_tampil);
	// var_dump($exe_tampil);
	

  ?>
   <h1 align="center">Laporan</h1>

	<div class="container mt-5">
	<div class="row">
	<table class="table table-hover table-bordered table-sm">
		<form method="POST">
		<thead class="thead-dark">
			<tr>
				<!-- <th>id_order</th> -->
				<th>id_masakan</th>
				<th>Jumlah</th>
				<!-- <th><input type="submit" name="generate" class="btn btn-secondary btn-block" value="generate"></th> -->
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
		<tr>
			<th colspan="2"><a href="generated.php" class="btn btn-secondary btn-block">Generate</a></th>
		</tr>
	</form>
	</table>
	</div>
	</div>