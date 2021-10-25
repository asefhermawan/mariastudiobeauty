<?php
error_reporting(0);
	require "../php/connection.php";
	$id_layananperawatan = $_POST['id_layananperawatan'];
	$id_customer  = $_POST['id_customer'];
	$status  = $_POST['status'];
	$nama_layananperawatan = $_POST['nama_layananperawatan'];
	$kategori_layanan_perawatan = $_POST['kategori_layanan_perawatan'];
	$harga = $_POST['harga'];
	$tanggal = $_POST['tanggal'];

	$strQuery = "INSERT INTO booking VALUES(null,'$id_layananperawatan', '$id_customer', '$status', '$nama_layananperawatan', '$kategori_layanan_perawatan', '$harga', '$tanggal')";
	$query = mysqli_query($connection, $strQuery);
	if($query){
		echo "<script language=javascript>alert('Layanan Berhasil Di Booking.');</script>";
	}else{
		echo "<script language=javascript>alert('Layanan Sudah Anda Booking.');</script>";
	}
		
	echo "<script language=javascript>document.location.href='../layanan_perawatan.php'</script>";
	mysqli_close($connection);
?>