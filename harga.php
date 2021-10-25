<?php
    require "php/connection.php";
    session_start();
    if(!isset($_SESSION['login_role'])){
            echo "<script language=javascript>document.location.href='login.php'</script>";
    }

    if(isset($_SESSION['login_role'])){
        if($_SESSION['login_role'] != 'User')
            echo "<script language=javascript>document.location.href='login.php'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Maria Beauty Salon | Harga</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="../cssa/reset.css">
<link rel="stylesheet" type="text/css" media="screen" href="../cssa/grid_24.css">
<link rel="stylesheet" type="text/css" media="screen" href="../cssa/style.css">
<script src="../jsa/jquery-1.7.min.js"></script>
<script src="../jsa/jquery.easing.1.3.js"></script>
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
<![endif]-->
</head>
<body>
<div class="bg-1">
  <!--==============================header=================================-->
  <header>
    <div class="main">
     
      <nav class="nav-sub-pages">
        <ul class="menu">
  <li class="current"><a href="home.php">Home</a></li>
          <li style="width:180px;"><a href="layanan_perawatan.php" >Layanan & Perawatan</a></li>
       <li><a href="harga.php">Harga</a></li>
	   <li><a href="promo.php">Promo</a></li>
	       <li><a href="kontak.php">Kontak</a></li>
		    <li><a href="booking.php">Data Booking</a></li>
			    <li style="width:60px;"><a href="profil.php">Profil</a></li>
  <li><a href="php/logout.php">Logout</a></li>
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
          <div class=""><a href="#"></a></div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <div class=" bot-1">
      <div class="container_24">
        <div class="grid_24">
          <div class="line"></div>
        </div>
        <div class="grid_8">
                  <div class="font-1 pad-3 nowrap">Maria Studio<br> Beauty</div>
          <div class="box-5">
            <div class="img-border"><img src="../images/logo.png" alt=""></div>
            
            <div class="clear"></div>
          </div>
        </div>
	
        <div class="grid_15 prefix_1">
          <div class="border-left top-6">
            <h4>Perawatan Rambut:</h4>
            <div class="wrap">
              <ul class="list" style="width:450px;">
              
                <li><strong>Pangkas Pendek/Panjang</strong><span>Rp.20K</span><em>&nbsp;</em></li>
                <li><strong>Pangkas + Cuci + VIT</strong><span>Rp.35K</span><em>&nbsp;</em></li>
                <li><strong>Pangkas + Cuci + Catok + VIT</strong><span>Rp.45K</span><em>&nbsp;</em></li>
                <li><strong>Cuci + Catok + VIT</strong><span>Rp.20K</span><em>&nbsp;</em></li>
                <li><strong>Creambath Buah + Massage + Catok + VIT</strong><span>Rp.45K</span><em>&nbsp;</em></li>
                <li><strong>Creambath Makarizo Salon Daily + Message + Catok + VIT</strong><span>Rp.55K</span><em>&nbsp;</em></li>
                <li><strong>Hair Mask Makarizo + Catok + Vitamin + Massage</strong><span>Rp.70k</span><em>&nbsp;</em></li>
                <li><strong>Makarizo Hair Energi + Catok + VIT + Message + Catok</strong><span>Rp.75k</span><em>&nbsp;</em></li>
              </ul>
			   <h4>Body Care:</h4>
              <ul class="list last" style="width:450px;">
                <li><strong>Mauris gravida</strong><span>Rp.45K</span><em>&nbsp;</em></li>
                <li><strong>Viverra lectus</strong><span>Rp.45K</span><em>&nbsp;</em></li>
                <li><strong>Cras mattis</strong><span>Rp.45K</span><em>&nbsp;</em></li>
                <li><strong>Tempor eros</strong><span>Rp.45K</span><em>&nbsp;</em></li>
                <li><strong>Sed vehicula augue</strong><span>Rp.45K</span><em>&nbsp;</em></li>
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
  <p>© 2012 Spa salon<br>
 
</footer>
</body>
</html>
