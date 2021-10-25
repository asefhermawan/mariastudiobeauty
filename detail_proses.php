<?php
	require "../php/connection.php";
	session_start();
	$booking_id = $_POST['booking_id'];
	$nama_lengkap = $_SESSION['nama_lengkap'];
	$nama_layananperawatan = $_POST['nama_layananperawatan'];
	$harga = $_POST['harga'];
	$tanggal = $_POST['tanggal'];
	$norek = $_POST['norek'];
	$fileName = $_FILES['gambar']['name'];
	$tmp = $_FILES['gambar']['tmp_name'];
	$path = "gambar/".$fileName;
	if(move_uploaded_file($tmp, $path)){
		$strQuery ="INSERT INTO detail_booking VALUES(null,'$booking_id', '$nama_lengkap', '$nama_layananperawatan', '$harga', '$tanggal', '$norek', '$fileName')";
		echo "<script>alert('Data Booking & Struk Pembayaran Berhasil Diupload. Mohon Tunggu Validasi Admin.  ');</script>";
	} else {
	//$nama_file = $_FILES['gambar']['name'];
	//$source = $_FILES['gambar']['tmp_name'];
	//$folder = '../uploads/';
	//move_uploaded_file($source, $folder.$nama_file);

	$strQuery ="INSERT INTO detail_booking VALUES(null,'$booking_id', '$nama_lengkap', '$nama_layananperawatan', '$harga', '$tanggal', '$norek', '$fileName')";
	echo "<script>alert('Data Gagal Disimpan');</script>";
	}
	$query = mysqli_query($connection, $strQuery);
	if($query){
		$id = mysqli_insert_id($connection);
		echo "<script language=javascript>document.location.href='../booking.php'</script>";
	}else{
		echo "<script language=javascript>document.location.href='../booking.php'</script>";
	}
	
	mysqli_close($connection);
?>