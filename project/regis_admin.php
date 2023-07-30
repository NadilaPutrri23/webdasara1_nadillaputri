<?php 

	session_start();
	require ('koneksi.php');
  if (!isset($_SESSION['login'])) {
    header('location:login.php');
  }

	if (isset($_POST['daftar'])) {
		$username = $_POST['username'];
    $query = "SELECT username FROM users WHERE username='$username'";
    $exe = mysqli_query($koneksi,$query);
    $sama = mysqli_num_rows($exe);
    if ($sama >= 1) {
        // echo "sudah digunakan</br>";
        $msg = "<div class='alert alert-warning text-center'>Username Sudah Digunakan</div>";        
    }else{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_user = $_POST['nama'];
    $jabatan = $_POST['jabatan'];

    $sql = 
   "INSERT INTO users (id_user,username,password,nama_user,id_level)
  VALUES (null,'$username','$password','$nama_user','$jabatan')";
     
     if (mysqli_query($koneksi,$sql)) {
      header("refresh:1,url=login.php");
      echo "Berhasil";
     }else{
      header("refresh:1,url=login.php");
      echo "gagal";
     }
  }
}


 ?>


<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css"> 	
 </head>
 <body>
 	<div class="container">
 		<div class="row" style="margin-top: 80px;">
 			<div class="col-9 offset-2">
 				<div class="card">
 					<div class="card-header">
 					<h2>Registrasi</h2>
 					</div>
 					<div class="card-body">
<form method="POST">

	<div class="form-group">
    <div class="col-sm-10">
    <?php if(isset($msg)){echo $msg;} ?>
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nama" placeholder="Nama" autocomplete="off">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 col-form-label">Jabatan</label>
    <div class="col-sm-10">
    <select class="form-control" name="jabatan">
      <option value="1">Admin</option>
      <option value="2">Waiter</option>
      <option value="3">Kasir</option>
      <option value="4">Owner</option>
    </select>
  </div>
	</div>
<!-- 
 <fieldset class="form-group">
    <div class="row">
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
          <label class="form-check-label">
            First radio
          </label>
        </div>
    </div>
</div>
</fieldset> -->

  <div class="form-group mt-3">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary" name="daftar">Registrasi</button>
      <a href="login.php" class="btn btn-primary">Kembali</a>
    </div>
  </div>
</form>
</div>
</div>
</div>
</div>
</div>
 	
 	
 </body>
<script src="assets/js/jquery-slim.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.css"></script>
 </html>