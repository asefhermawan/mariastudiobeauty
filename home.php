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
<link rel="stylesheet" type="text/css" media="screen" href="../cssa/slider.css">
<script src="../jsa/jquery-1.7.min.js"></script>
<script src="../jsa/jquery.easing.1.3.js"></script>
<script src="../jsa/tms-0.4.1.js"></script>
<script>
$(document).ready(function(){				   	
	$('.slider')._TMS({
		show:0,
		pauseOnHover:true,
		prevBu:'.prev',
		nextBu:'.next',
		playBu:false,
		duration:10000,
		preset:'zoomer',
		pagination:true,
		pagNums:false,
		slideshow:7000,
		numStatus:false,
		banners:false,
		waitBannerAnimation:false,
		progressBar:false
	})
});
</script>
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
   
      <nav class="nav">
        <ul class="menu">
      <li style="width:200px;"><a href="home.php">Home</a></li>
		    <li style="width:300px;"><a href="layanan_perawatan.php">Booking Layanan & Perawatan</a></li>
		     <li style="width:200px;"><a href="booking.php">Data Booking</a></li>
		  <li style="width:100px;"><a href="php/logout.php">Logout</a></li>
        </ul>
        <div class="clear"></div>
      </nav>
      <div id="slide">
        <div class="slider">
          <ul class="items">
            <li><img src="../images/slider-1.png" alt=""></li>
            <li><img src="../images/slider-2.jpg" alt=""></li>
            <li><img src="../images/slider-3.jpg" alt=""></li>
          </ul>
        </div>
        <a href="#" class="prev"></a><a href="#" class="next"></a> </div>
    </div>
  </header>
  <!--==============================content================================-->
  <section id="content">
    <div class="bg-2">
      <div class="bg-3 bot-2">
        <div class="container_24">
          <div class="grid_24">
           
          </div>
         
      </div>
    </div>
    <div class="bg-4 bot-1">
      <div class="container_24">
        <div class="grid_24">
          <div class="line"></div>
          <div class="font-1 pad-1">Maria Studio Salon <span>Menyediakan</span> <strong><span>Jasa Layanan & Perawatan Kecantikan, Make Up Wisuda, Make Up Pernikahan Dan Lain-Lain</span></strong></div>
        </div>
        <div class="grid_7">
         
          
        </div>
        <div class="clear"></div>
      </div>
    </div>
   
  </section>
</div>
<!--==============================footer=================================-->
<footer>
  <p>© 2021 Maria Studio salon<br>
   
</footer>
</body>
</html>
