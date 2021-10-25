<?php
error_reporting(0);
	require "../php/connection.php";
	$id_layananperawatan = $_POST['id_layananperawatan'];
	$id_customer  = $_POST['id_customer'];
	$status  = $_POST['status'];
	$status_bayar  = $_POST['status_bayar'];
	$nama_layananperawatan = $_POST['nama_layananperawatan'];
	$kategori_layanan_perawatan = $_POST['kategori_layanan_perawatan'];
	$harga = $_POST['harga'];
	$tanggal_booking = $_POST['tanggal_booking'];
	$hari = $_POST['hari'];
	$jam = $_POST['jam'];
		$status_hari = $_POST['status_hari'];
	$strQuery = "INSERT INTO booking VALUES(null,'$id_layananperawatan', '$id_customer', '$status', '$status_bayar', '$nama_layananperawatan', '$kategori_layanan_perawatan', '$harga', '$tanggal_booking', '$hari', '$jam', '$status_hari')";
	$query = mysqli_query($connection, $strQuery);
	if($query){
		echo "<script language=javascript>alert('Layanan Berhasil Di Booking.');</script>";
	}else{
		echo "<script language=javascript>alert('Layanan Sudah Anda Booking.');</script>";
	}
		
	echo "<script language=javascript>document.location.href='../booking.php'</script>";
	mysqli_close($connection);
?>