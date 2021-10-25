<?php
	require "connection.php";
	$booking_id = $_GET['booking_id'];
			
	$strQuery = "DELETE FROM booking WHERE booking_id = $booking_id";
	$query = mysqli_query($connection, $strQuery);
	if(!$query){
		echo "<script language=javascript>alert('Terjadi Kesalahan Saat Menghapus Data Booking');</script>";
	}	

	echo "<script language=javascript>document.location.href='../booking.php'</script>";
	mysqli_close($connection);                                           
?>


             