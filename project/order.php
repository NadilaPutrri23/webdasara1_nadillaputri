k<?php 
   // require('koneksi.php');
 	  // var_dump($_SESSION);
    $table = 'masakan';
    $field = '*';
    $kondisi = '';
    $sql = "SELECT $field FROM $table $kondisi";
    $exe = mysqli_query($koneksi,$sql);

    // $tableOrder = 'order_pesanan';
    // $fieldOrder = '*';
    // $kondisiOrder = "WHERE id_user= $id_user AND WHERE status_order = 'sudah bayar'";
    // $dataOrder = read($tableOrder,$fieldOrder,$kondisiOrder);

    $sqlOrder = "SELECT * FROM order_pesanan WHERE id_user = $id_user
     AND status_order = 'dipesan/(belum bayar)'";
    $exe_order = mysqli_query($koneksi,$sqlOrder);
    // var_dump($id_user);

    if (isset($_POST['pesan'])) {
      // $id_order = $_SESSION['id_order'];
      // var_dump($id_order);
      $masakan = $_POST['masakan'];
      $table2 = 'order_pesanan';
      $field2 = array('id_masakan','id_user','status_order');
      $data2 = array("'$masakan'","'$id_user'","'dipesan/(belum bayar)'");
      create($table2,$field2,$data2);
      header('location:tampilan.php');
      // header('refresh:1;');
      $id_masakan = mysqli_insert_id($koneksi);
      $table3 = 'detail_order';
      $field3 = array('id_order','id_masakan','keterangan','status_detail_order'); 
      $data3 = array("'$id_masakan'","'$masakan'","'$id_user'","'sedang dipesan/(belum bayar)'");
      if (create($table3,$field3,$data3)) {
        echo "Berhasil";
      }else{  
        echo "Gagal";
      }
    }
 ?>
  <h1 align="center">Order</h1>
<div class="container">
 <div class="row" style="margin-top: 80px;">
  <div class="col-9 offset-2">
   <div class="card">
    <div class="card-header">
      <h2>Masakan</h2>
    </div>
    <div class="card-body">
      <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
        <div class="form-group">
          <!-- <label class="col-sm-2 col-form-label"></label> -->
          <div class="col-sm-10">
            <select class="form-control" name="masakan">
              <?php foreach ($exe as $data) :  ?>
                <option value="<?= $data['id_masakan']; ?>"><?= $data['nama_masakan'];?></option>
              <?php endforeach; ?>
            </select>
          </div>
<!--   <div class="form-group">
    <label for="keterangan">Keterangan</label>
    <input type="" name="">
  </div> -->
</div>

<div class="form-group mt-3">
  <div class="col-sm-10">
    <button class="btn btn-primary" name="pesan">Pesan</button>
  </div>
</div>
</form>

</div>
</div>
</div>
</div>
</div>


<div class="container">
  <div class="row"> 
    <div class="table mt-5"> 
      <table class="table table-hover table-bordered table-sm">
        <thead class="thead-dark">
          <tr>
            <th>id_order</th>
            <!-- <th>No Meja</th> -->
            <!-- <th>Tanggal</th> -->
            <th>id_user</th>
            <!-- <th>Keterangan</th> -->
            <!-- <th>Status Order</th> -->
            <th>Id Masakan</th>
            <th>Tanggal</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($exe_order as $order) : ?>
            <tr>
              <td><?= $order['id_order'];?></td>
              <td><?= $order['id_user'];?></td> 
              <td><?= $order['id_masakan'];?></td>
              <td><?= $order['tanggal'];?></td>
              <td><a href="delete.php?id_order=<?= $order['id_order'];?>"
               class="btn btn-danger btn-block">Batal</a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

