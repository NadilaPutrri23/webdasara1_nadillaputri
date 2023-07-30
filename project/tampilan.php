  <?php 
    require ('koneksi.php');
    require ('function.php');

   session_start();
    if (!isset($_SESSION['login'])) {
      header('Location:login.php');
    }
    else{
      $username = $_SESSION['nama_user'];
      $level = $_SESSION['level'];
      $id_user = $_SESSION['id_user'];
      // var_dump($_SESSION);
      // var_dump($id_user);

  }
    



 ?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <style type="text/css">
    thead{
      background-color: #fff;
    }
  </style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  		<a class="navbar-brand" href="#"><?= $_SESSION['nama_user'];?></a>
 			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#garis" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
 			</button>
  <div class="collapse navbar-collapse" id="garis">
    <div class="navbar-nav x">
      <?php if ($_SESSION['level'] == 1) {
        header('location:index.php');
      } ?>


      <?php if ($_SESSION['level']== 2) { ?>
      <a class="nav-item nav-link" href="#">Entry Order</a>
      <!-- <a class="nav-item nav-link" href="#">Registrasi</a> -->
      <a class="nav-item nav-link" href="#">Generate laporan</a>
      <a class="nav-item nav-link" href="logout.php">Logout</a>
      </nav>
      <?php include('order.php'); ?>
      <?php include('generate.php'); ?>
      <?php } ?>

      <?php if ($_SESSION['level'] == 3) { ?>
      <a class="nav-item nav-link" href="transaksi.php">Entry Transaksi</a>
      <a class="nav-item nav-link" href="#">Generate laporan</a>
      <!-- <a class="nav-item nav-link" href="#">Registrasi</a> -->
      <a class="nav-item nav-link" href="logout.php">Logout</a>
      </nav>
      <?php include 'transaksi.php'; ?>
      <?php include('generate.php'); ?>
      <?php } ?>


      <?php if ($_SESSION['level'] == 4) { ?>
      <a class="nav-item nav-link" href="#">Generate laporan</a>
      <a class="nav-item nav-link" href="logout.php">Logout</a>
      </nav>
      <?php include('generate.php'); ?>
      <?php } ?>

      <?php if ($_SESSION['level'] == 5) { ?>
      <a class="nav-item nav-link" href="#">Entry Order</a>
      <a class="nav-item nav-link" href="logout.php">Logout</a>

    </div>
  </div>
</nav>
      
      <div class='alert alert-success col-md-5 mt-5' style="margin: auto;">
        <p>
            Nama : <?= $_SESSION['nama_user'];?>   
        </p>
      </div>
      <?php include('order.php'); ?>
      <?php } ?>
      
</body>
<script src="assets/js/jquery-slim.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</html>