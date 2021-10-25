<?php
error_reporting(0);
	require "../php/connection.php";
    session_start();
    if(!isset($_SESSION['login_role'])){
		    echo "<script language=javascript>document.location.href='login.php'</script>";
	}

    if(isset($_SESSION['login_role'])){
        if($_SESSION['login_role'] != 'User')
		    echo "<script language=javascript>document.location.href='login.php'</script>";
	}
	    if(isset($_GET['id_customer'])) {
        $id = $_GET['id_customer'];
	 $id_customer = $_SESSION['id_customer'];
    $nama_lengkap = "";
    $alamat = "";
    $email = "";
    $no_hp = "";
	 $gambar = "";
    $login_id = "";
    $username = "";
    $password = "";
    $strQuery = "SELECT SELECT * FROM booking INNER JOIN registrasi ON booking.id_customer = registrasi.id_customer ORDER BY booking_id ASC";
    $query = mysqli_query($connection, $strQuery);
    if($query){
        $data = mysqli_fetch_array($query, MYSQLI_ASSOC);
        $id_customer = $data['id_customer'];
        $nama_lengkap = $data['nama_lengkap'];
        $alamat = $data['alamat'];
        $email = $data['email'];
        $no_hp = $data['no_hp'];
		$gambar = $data['gambar'];
        $login_id = $data['login_id'];
        $username = $data['login_username'];
        $password = $data['login_password'];
    }
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Maria Beauty Salon | Booking</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="../cssa/reset.css">
<link rel="stylesheet" type="text/css" media="screen" href="../cssa/grid_24.css">
<link rel="stylesheet" type="text/css" media="screen" href="../cssa/style.css">
<script src="../jsa/jquery-1.7.min.js"></script>
<script src="../jsa/jquery.easing.1.3.js"></script>
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
    <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
<![endif]-->
<style>

</style>
</head>
<body>
<div class="bg-1">
  <!--==============================header=================================-->
  <header>
    <div class="main">
     
      <nav class="nav-sub-pages">
        <ul class="menu">
     <li style="width:200px;"><a href="home.php">Home</a></li>
		    <li style="width:300px;"><a href="layanan_perawatan.php">Booking Layanan & Perawatan</a></li>
		     <li style="width:200px;"><a href="booking.php">Data Booking</a></li>
		  <li style="width:100px;"><a href="php/logout.php">Logout</a></li>
        </ul>
        <div class="clear"></div>
      </nav>
    </div>
  </header>
  <!--==============================content================================-->
  <section id="content">
    <div class="bg-3 bot-3">
      <div class="container_24">
        <div class="grid_24">
      
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <div class=" bot-1">
      <div class="container_24">
        <div class="grid_24">
       
        </div>

                   <!-- Header -->
    <div class="header bg-white pb-12">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-12 col-12">
         
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-12">
                
             <div class="content">
										<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
													<div align="center">
 <center>
    <?php
  // Load file koneksi.php
  include "../php/connection.php";

  $query2 = "SELECT * FROM registrasi WHERE registrasi.id_customer = '$_SESSION[id_customer]'"; // Query untuk menampilkan semua data siswa
 $sql2 = mysqli_query($connection, $query2);

 while($data2 = mysqli_fetch_array($sql2)){ 
 ?>
  <div class="table-responsive table-bordered table-striped table-hover">          
  <table class="table">
<h2>PROFIL USER</h2>
<tr><th><center>Nama Lengkap<td><?php echo $_SESSION['nama_lengkap']; ?></center></td></tr>
<tr><th><center>Aalamat<td><?php echo $data2['alamat']; ?></center></td></tr>
<tr><th><center>Email<td><?php echo $data2['email']; ?></center></td></tr>
<tr><th><center>No HP/WA<td><?php echo $data2['no_hp']; ?></center></td></tr>
</table>
  </center>

		  
                                      
                </div> </div>

<?php
                                                        $i++;
													}
                                                    
                                                ?>  
</div>
<!--==============================footer=================================-->
<footer>
  <p>© Maria Studio Beauty 2021<br>
 
</footer>
</body>
</html>
 <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>
 <script>
            <?php
            for($j= 0 ; $j <= $i; $j++){
        ?>
            $('#delete<?php echo $j;?>').appendTo("body")
            <?php
            }
        ?>
            $('#search').appendTo("body")
        </script>
		
		
		<script type="text/javascript">
		function  preview_imagee(event){
			var reader = new FileReader();
			reader.onload = function()
			{
				var output = document.getElementById('preview_image');
				output.src = reader.result;
			}
			reader.readAsDataURL(event.target.files[0]);
		}
		</script>
		
