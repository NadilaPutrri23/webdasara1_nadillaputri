<?php
	session_start();
	require('koneksi.php');
	require('function.php');

	if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$login = login($username,$password);
	// var_dump($_POST['login']);

		if ($login != null) {
			$_SESSION['login'] = true;
			// $_SESSION['nama_user'] = ucfirst($login['username']);
			$_SESSION['id_user'] = $login['id_user'];
			$_SESSION['level'] = $login['id_level'];
			$_SESSION['nama_user'] = ucfirst($login['nama_user']);
			// $_SESSION['id_masakan'] = $login['id_masakan'];
			header("Location:tampilan.php");
		}
		else{
            $msg="<div class='alert alert-danger'>Username Atau Password Salah</div>";
		}

		// var_dump($login);
	}



 ?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
	<style>
		.x{margin-top: 50px;}
	</style>
<body>
	<div class="container">
		<div class="row x">
			<div class="col-6 offset-3">
			<div class="card">
				<div class="card-header text-center">
					<h2>Login</h2>
				</div>
				<div class="card-body">
					<?php if (isset($msg)) {
						echo "$msg";
					}; ?>
					<form action="" method="POST">
						<div class="form-group">
							<label>Username :</label>
							<input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off" required> 
						</div>
						<div class="form-group">
							<label>Password :</label>
							<input type="password" name="password" class="form-control" placeholder="Password" required> 
						</div>  
						<div class="text-center">
                            <button name="login" class="btn btn-block btn-primary">Login</button>
                        </div>  
						<div class="text-center mt-2">
							<a href="regis.php" class="btn btn-warning btn-block">Registrasi</a>
                        </div>
					</form>
				</div>
				<div class="card-footer text-muted text-center">
    				&copy CopyRight 2019
  				</div>
			</div>
		</div>
	</div>
	</div>
	
	
</body>
<script src="assets/js/jquery-slim.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.css"></script>
</html>