<?php
	require "../php/connection.php";
	$booking_id = $_POST['booking_id'];
	$tanggal_booking = $_POST['tanggal_booking'];
	$hari = $_POST['hari'];
	$jam = $_POST['jam'];
	$status_hari = $_POST['status_hari'];

	$strQuery = "UPDATE booking SET tanggal_booking = '$tanggal_booking', hari = '$hari', jam = '$jam', status_hari = '$status_hari' WHERE booking_id = $booking_id";
	$query = mysqli_query($connection, $strQuery);
	if(!$query){
		echo "<script language=javascript>alert('Terjadi Kesalahan Saat Mengupdate Data Jadwal');</script>";
	}
		
	echo "<script language=javascript>document.location.href='../booking.php'</script>";
	mysqli_close($connection);
?>