<?php
error_reporting(0);
	require "connection.php";
	$nama_lengkap = $_POST['nama_lengkap'];
	$alamat = $_POST['alamat'];

	$email = $_POST['email'];
	$no_hp = $_POST['no_hp'];

	$username = $_POST['username'];
	$password = $_POST['password'];
	$konfirmasi_password = $_POST['konfirmasi_password'];
		
	mysqli_begin_transaction($connection);
	mysqli_autocommit($connection, FALSE);

	if($password == $konfirmasi_password){
		$encPassword = md5($password);
		$strQuery = "INSERT INTO login VALUES(null,'$username', '$encPassword', 'User')";
		$query = mysqli_query($connection, $strQuery);
		if($query){
			$login_id = mysqli_insert_id($connection);
			$strQuery = "INSERT INTO registrasi VALUES( 
				'$login_id',
				'$nama_lengkap', 
				'$alamat', 
				 
				'$email',  
				'$no_hp'
	
			)";
			$query = mysqli_query($connection, $strQuery);
			if($query){	
				mysqli_commit($connection);
				echo "<script language=javascript>alert('Registrasi Berhasil');</script>";			
				echo "<script language=javascript>document.location.href='../login.php'</script>";
			}else{
				mysqli_rollback($connection);
				echo "<script language=javascript>alert('Registrasi Gagal');</script>";		
				echo "<script language=javascript>document.location.href='../registrasi.php'</script>";
			}
		}else {
			mysqli_rollback($connection);
			echo "<script language=javascript>alert('Username Sudah Dipakai');</script>";
			echo "<script language=javascript>document.location.href='../registrasi.php'</script>";
		}
	}else{
		echo "<script language=javascript>alert('Password Tidak Cocok');</script>";
		echo "<script language=javascript>document.location.href='../registrasi.php'</script>";
	}
	
	mysqli_autocommit($connection, TRUE);
	mysqli_close($connection);
?>