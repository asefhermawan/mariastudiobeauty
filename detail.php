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
	    if(isset($_GET['id'])) {
        $id = $_GET['id'];
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
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
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
table {
  border: 1px solid green;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
}
table caption {
  font-size: 1.5em;
  margin: .25em 0 .75em;
}
table tr {
  background: white;
  border: 1px solid green;
  padding: .35em;
}
table th,
table td {
  padding: .625em;
  text-align: center;
}
table th {
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
  background: #483D8B;
  color: white;
}
table td img {
  text-align: center;
}
@media screen and (max-width: 600px) {
  table {
    border: 0;
  }
  table caption {
    font-size: 1.3em;
  }
  table thead {
    display: none;
  }
  table tr {
    border-bottom: 3px solid green;
    display: block;
    margin-bottom: .725em;
  }
  table td {
    border-bottom: 1px solid green;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  table td:before {
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  table td:last-child {
    border-bottom: 0;
  }
}
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
   
	
        <div class="grid_22">
    
           <center> <h4>Data Booking:</h4></center>
            <div class="wrap">
              <ul class="list" style="width:450px;">
              
			  <br>
			
                                                  
            </div>
               
          </div>
			  <div class="container-fluid mt--8">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">

            </div>
            <!-- Light table -->
            <div class="content table-responsive table-full-width">
                                        <table class="table table-striped" >
                                            <thead>
										
												<th>Nama Anda</th>
                                                <th>Layanan & Perawatan</th>
												<th>Harga</th>  
												<th>Tanggal Booking</th>  
																									
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
               <?php
  // Load file koneksi.php
  include "../php/connection.php";

  $query = "SELECT * FROM booking INNER JOIN registrasi ON booking.id_customer = registrasi.id_customer WHERE booking.id_customer = '$_SESSION[id_customer]' ORDER BY booking_id ASC"; // Query untuk menampilkan semua data siswa
  $sql = mysqli_query($connection, $query); // Eksekusi/Jalankan query dari variabel $query
 
  while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    echo "<tr>";
    echo "<td>".$_SESSION['nama_lengkap']."</td>";
	echo "<td>".$data['nama_layananperawatan']."</td>";
	echo "<td>".$data['harga']."</td>";
	echo "<td>".$data['tanggal']."</td>";
   echo "<td><a href='php/hapus_booking.php?booking_id=".$data['booking_id']."'>Hapus</a> || <a href=# data-toggle=modal data-target=#angsuran$i>Angsuran</a> || <a href='invoices.php?booking_id=".$data['booking_id']."'>Cetak</a></td>";
  

    echo "</tr>";
  
  ?>
 

            </div>
			
			    <?php
                                                        $i++;
													}
                                                    
                                                ?>
                </tbody>
                </tbody>
              </table>

          </div>

  </div>
			  
			  
              
              </ul>
            </div>
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
	  
    <div class="bg-6">
      <div class="container_24">
        <div class="grid_24">
          <div class="line"></div>
          
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </section>
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