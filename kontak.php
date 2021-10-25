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
<script src="jsa/jquery-1.7.min.js"></script>
<script src="jsa/jquery.easing.1.3.js"></script>
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
            <center> <div class="img-border"><img src="../images/logo.png" alt=""></center></div>
            <!--<p class="border-bot"><strong>Lorem ipsum dolor sit amet, consectetur </strong> Vivamus hendrerit mauris ut dui gravida ut viverra lectus tincidunt. Cras mattis tempor eros nec tristique. Sed sed felis arcu, vel vehicula augue. Maecenas faucibus sagittis cursus. </p>
            <a href="#" class="link-1 fright">read more</a>-->
            <div class="clear"></div>
          </div>
        </div>
	    <?php
            
             if(isset($_GET['search'])){
                    $strQuery = "SELECT * FROM kontak where id_kontak";
                  
                }   
                else {
                        $strQuery = "SELECT * FROM kontak where id_kontak";
                         
                }
                $query = mysqli_query($connection, $strQuery);
                $i = 0;
                while($result = mysqli_fetch_assoc($query)){
            ?>
        <div class="grid_15 prefix_1">
          <div class="border-left top-6">
          <h4> <?php echo "$result[nama]";?> </h4>
            <div class="wrap">
              <ul class="list" style="width:450px;">
       
													 <h2> <?php
                                                        echo "$result[deskripsi]";
                                                    ?> </h2><br><br>
													<h2>HUBUNGI KAMI</h2>
													<h2>NO HP / WA <?php
                                                        echo "$result[no_hp]";
                                                    ?> </h2>
													<h2>Email <?php
                                                        echo "$result[email]";
                                                    ?> </h2>
            </div>
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
	   <?php
                    $i++;
                }
            ?>
   <!-- <div class="bg-6">
      <div class="container_24">
        <div class="grid_24">
          <div class="line"></div>
          <div class="call"> <span>Call us free:</span> <span>+1 800 559 6580 <strong>+1 800 603 6035</strong></span> </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </section>
</div>-->
<!--==============================footer=================================-->
<footer>
  <p>© 2021 Maria Beauty salon<br>
    
</footer>
</body>
</html>
