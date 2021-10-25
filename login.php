<?php

	require "connection.php";
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$encPassword = md5($password);
	
	$strQuery = "SELECT * FROM login WHERE login_username = '$username' AND login_password='$encPassword'";
	$query = mysqli_query($connection, $strQuery);
	if($query){
		$thereIsAUser = mysqli_num_rows($query);
		if($thereIsAUser == 0){
			echo "<script language=javascript>alert('Username atau Password Tidak Cocok');</script>";
			echo "<script language=javascript>document.location.href='../login.php'</script>";
		}else{
			$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
			$login_id = $result['login_id'];
			$login_role = $result['login_role'];
			if($login_role === "User") {
				$strQuery = "SELECT * FROM registrasi WHERE id_customer = '$login_id'";
				$query = mysqli_query($connection, $strQuery);
				if($query) {
					$thereIsAnUser = mysqli_num_rows($query);
					if($thereIsAnUser == 0){
						echo "<script language=javascript>alert('Data Pelanggan tidak Ditemukan');</script>";
						echo "<script language=javascript>document.location.href='../login.php'</script>";
					}else {
						$_SESSION['login_role'] = $login_role;
						$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
						$_SESSION['id_customer'] = $result['id_customer'];
						$_SESSION['nama_lengkap'] = $result['nama_lengkap'];
						echo "<script language=javascript>document.location.href='../home.php'</script>";
					}
				}else {
					echo "<script language=javascript>alert('Terjadi Kesalahan Saat Login');</script>";
					echo "<script language=javascript>document.location.href='../login.php'</script>";
				}
			} else {
				echo "<script language=javascript>alert('Anda Tidak Terdaftar Sebagai Pelanggan');</script>";
				echo "<script language=javascript>document.location.href='../login.php'</script>";
			}
		}
	}else {
		echo "<script language=javascript>alert('Terjadi Kesalahan');</script>";
		echo "<script language=javascript>document.location.href='../login.php'</script>";
	}
	
	mysqli_close($connection);
?>