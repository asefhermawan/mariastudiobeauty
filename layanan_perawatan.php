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
<title>Maria Studio Beauty</title>
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
<style>
    @media screen and (max-width: 480px) {
 img, img-border {
    width: 700px;
}
}
</style>
</head>
<body>
<div class="bg-1">
  <!--==============================header=================================-->
  <header>
    <div class="main">
      <h1 class="logo-sub-pages"><a href="index.php"></a></h1>
      <nav class="nav-sub-pages">
        <ul class="menu">
             <li style="width:200px;"><a href="home.php">Home</a></li>
		    <li style="width:300px;"><a href="layanan_perawatan.php">Booking Layanan & Perawatan</a></li>
		     <li style="width:200px;"><a href="booking.php">Data Booking</a></li>
		  <li style="width:100px;"><a href="php/logout.php">Logout</a></li>
		 
		  <!--<li style="width:200px;"><a href="promo.php">Promo</a></li>-->
        </ul>
        <div class="clear"></div>
      </nav>
    </div>
  </header>
  <!--==============================content================================-->
  <section id="content">
    <div class="bg-12 bot-3">
      <div class="container_24">
       
 
        </div>
        <div class="clear"></div>
   
    </div>
    <div class="">
      <div class="">
        <div class="container_24">
          <div class="grid_24">
            <div class="line"></div>
            <div class="font-1 pad-2">Kategori Layanan & Perawatan</div> <br> <br>
          </div>
         
          <div class="grid_7 box-2">
            <h3>Perawatan Rambut</h3>
            <div class="img-border"><a href="perawatan_rambut.php" class="link-1"><img src="../gambar_layanan/perawatan.jpg" alt=""></a></div>
           </div>
            
          <div class="grid_7 box-2 prefix_1">
        <h3 class="nowrap">Body Care</h3>
            <div class="img-border"><a href="bodycare.php" class="link-1"><img src="../images/page2-img2.jpg" alt=""></a></div>
          </div>
            
             <div class="grid_7 box-2 prefix_1">
           <h3 class="nowrap">Nail Care</h3>
            <div class="img-border">  <a href="nailcare.php" class="link-1"><img src="../gambar_layanan/nailcare.jpg" alt=""> </a> </div>
         </div>
            
           <div class="grid_7 box-2">
          <br><h3>Make Up Wisuda</h3>
            <div class="img-border"> <a href="makeupwisuda.php" class="link-1"><img src="../gambar_layanan/wisuda.jpg" alt=""></a></div><br>
            </div> 
            
              <div class="grid_7 box-2 prefix_1">
            <br><h3>Rias Pengantin</h3>
            <div class="img-border"><a href="riaspengantin.php" class="link-1"><img src="../gambar_layanan/pengantin.jpg" alt=""> </a></div><br>
            </div>
            
                  <div class="grid_7 box-2 prefix_1">
            <br><h3>Terapi</h3>
            <div class="img-border"><a href="terapi.php" class="link-1"><img src="../gambar_layanan/terapi.jpeg" alt=""></a></div><br>
            </div>
        </div>
      </div>
    </div>
    <br><br><br> <br><br><br>
    <div class="bg-4 bot-1">
      <div class="container_24">
        <div class="grid_24">
          <div class="line"></div>
        </div>
        <div class="grid_6 top-1">
       
        <div class="clear"></div>
      </div>
    </div>
    <div class="bg-6">
      <div class="container_24">
        <div class="grid_24">
       
          <div class="call"> </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </section>
</div>
<!--==============================footer=================================-->
<footer>
  <p>© 2021 Maria Studio Beauty
 </p>
</footer>
</body>
</html>
