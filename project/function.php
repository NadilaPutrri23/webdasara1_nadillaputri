<?php 

	function login($username,$password){
		global $koneksi;
		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		$exe = mysqli_query($koneksi,$sql);
		$res = mysqli_fetch_assoc($exe);
		if ($res != null) {
			return $res;
		}
		else{
			return false;
		}
	}
	

	function create($table,$field,$value){
		global $koneksi;
		$field = implode(",",$field);
		$value = implode(",",$value);
		$sql = "INSERT INTO $table ($field) VALUES ($value)";
		$execute = mysqli_query($koneksi,$sql);
		if ($execute) {
			return true;
		}
		else{
			return false;
		}
	}

	function read($table,$field,$kondisi=''){
		global $koneksi;
		
		$field = (is_array($field)) ? implode(",",$field) : $field;
		// $field = implode(",",$field);
		$sql = "SELECT $field FROM $table $kondisi";
		$execute = mysqli_query($koneksi,$sql);
		$num_rows = mysqli_num_rows($execute);
		$res = mysqli_fetch_assoc($execute);
		if ($num_rows < 1) {
			return $res;
		}
		else{
			return $execute;
		}
	}

	function updateData($table,$field,$kondisi){
		global $koneksi;
		$sql = "UPDATE $table SET $field $kondisi";
		$execute = mysqli_query($koneksi,$sql);
		return $execute;
	}


	?>