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
<title>Rias Pengantin </title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="../cssa/reset.css">
<link rel="stylesheet" type="text/css" media="screen" href="../cssa/grid_24.css">
<link rel="stylesheet" type="text/css" media="screen" href="../cssa/style.css">
<script src="../jsa/jquery-1.7.min.js"></script>
<script src="../jsa/jquery.easing.1.3.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
   
  
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

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
          <div class=""><a href="#"></a></div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="">
      <div class="bg-3 bot-1">
        <div class="container_24">
          <div class="grid_24">
            <div class="line"></div>
            <div class="font-1 pad-2">Rias Pengantin</div>
          </div>
		    <?php
            
             if(isset($_GET['search'])){
                    $strQuery = "SELECT id_layananperawatan, nama_layananperawatan, kategori_layanan_perawatan, deskripsi,harga, gambar
                    FROM layanan_perawatan 
                    WHERE kategori_layanan_perawatan ='Rias Pengantin'
                    ORDER BY id_layananperawatan DESC";
                  
                }   
                else {
                        $strQuery = "SELECT id_layananperawatan, nama_layananperawatan, kategori_layanan_perawatan, deskripsi,harga, gambar
                    FROM layanan_perawatan 
                    WHERE kategori_layanan_perawatan ='Rias Pengantin'
                    ORDER BY id_layananperawatan DESC";
                         
                }
                $query = mysqli_query($connection, $strQuery);
                $i = 0;
                while($result = mysqli_fetch_assoc($query)){
            ?>
          <div class="grid_7 box-2">
		  
            <h3>   <?php echo "<a href=# data-toggle=modal data-target=#detail$i>$result[nama_layananperawatan]</a>";?></h3>
            <div class="img-border"> <a href="../admin/gambar_layananperawatan/<?php echo $result['gambar'] ?>">
                                    <?php if($result['gambar']){ ?>
                                       
                                        <img src="../admin/gambar_layananperawatan/<?php echo $result['gambar'] ?>" width="100%" height="200px">
                                    <?php } else { ?>
                                        <img src="#" width="270px" height="200px">
                                    <?php } ?>
                                    </a></div>
          
		   <br>
          	 <?php echo "<a href=# data-toggle=modal data-target=#detail$i>LIHAT SELENGKAPNYA</a>";?></div>
		
			
			
			 <!-- Modal Detail -->
                                    <div class="modal fade" id="detail<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                        <form method="POST" action="php/booking_tambah_proses.php">
  
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                   
                                                   <center> <h4 class="modal-title" id="myModalLabel">Detail Layanan & Perawatan<br> Maria Studio Salon</h4> </center>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="scroll">
                                                    <center>
                                                        <?php
                                                        if($result['gambar']){ ?>
                                            <a href="../admin/gambar_layananperawatan/<?php echo $result['gambar'] ?>">
                                                        <img src="../admin/gambar_layananperawatan/<?php echo $result['gambar'] ?>" width="300px" height="400px"></a> </center><br>
                                                        <?php } else { ?>
                                                            <a target="_blank" href="image/ac.jpg">
                                                        <img src="image/ac.jpg" width="300px" height="200px"></a> </center><br>
                                                        <?php } ?>
                                                    <b> Layanan & Perawatan</b><br/>
                                                    <?php
                                                        echo "$result[nama_layananperawatan]";
                                                    ?>
                                                    <br/><br/>

                                                  <b> Harga</b><br/>
                                                    <?php
                                                        echo "$result[harga]";
                                                    ?>
                                                    <br/><br/>

                                                    <b>Deskripsi</b><br/>
                                                    <?php
                                                        echo "$result[deskripsi]";
                                                    ?>
                                                    <br/><br/>
                                                     </div>
                                                <div class="modal-footer">
                                                  
                                                  <input type="hidden" name="id_layananperawatan" value="<?php echo $result['id_layananperawatan'];?>"/>
                                                    <input type="hidden" name="id_customer" value="<?php echo $_SESSION['id_customer'];?>"/>
                                                    <input type="hidden" name="status" value="Menunggu"/>
                                                    <input type="hidden" name="status_bayar" value="Belum Bayar"/>
													<input type="hidden" name="nama_layananperawatan" value="<?php echo $result['nama_layananperawatan'];?>"/>
													<input type="hidden" name="kategori_layanan_perawatan" value="<?php echo $result['kategori_layanan_perawatan'];?>"/>
													<input type="hidden" name="harga" value="<?php echo $result['harga'];?>"/>
													<input type="hidden" name="tanggal_booking" value="<?php echo date("Y-m-d"); ?>"/>
													<input type="hidden" name="hari"/>
													<input type="hidden" name="jam"/>
													<input type="hidden" name="status_hari"/>
                                                   <button type="submit" class="btn btn-info btn-fill">BOOKING</button>
												   <button type="button" class="btn btn-default btn-fill" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- End Modal -->
			
			
            <?php
                    $i++;
                }
            ?>
      </div>
    </div>
	<!--
    <div class="bg-4 bot-1">
      <div class="container_24">
        <div class="grid_24">
          <div class="line"></div>
        </div>
        <div class="grid_6 top-1">
          <div class="number-2"> <strong class="bg-clr-1">01.</strong>
            <div class="extra-wrap">
              <h2 class="clr-1">Nailcare</h2>
              <p class="border-bot"><i class="clr-1"><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </strong></i><br>
                Vivamus hendrerit mauris ut dui gravida ut viverra lectus tincidunt. Cras mattis tempor eros nec tristique.</p>
              <a href="#" class="link-1 fright">read more</a> </div>
          </div>
          <div class="number-2 top-2"> <strong class="bg-clr-1">05.</strong>
            <div class="extra-wrap">
              <h2 class="clr-1">Makeup</h2>
              <p class="border-bot"><i class="clr-1"><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </strong></i><br>
                Vivamus hendrerit mauris ut dui gravida ut viverra lectus tincidunt. Cras mattis tempor eros nec tristique.</p>
              <a href="#" class="link-1 fright">read more</a> </div>
          </div>
        </div>
        <div class="grid_6 top-1">
          <div class="number-2"> <strong class="bg-clr-2">02.</strong>
            <div class="extra-wrap">
              <h2 class="clr-2">Haircare</h2>
              <p class="border-bot"><i class="clr-2"><strong>Vivamus hendrerit mauris ut dui gravida ut viverra lectus </strong></i><br>
                tincidunt. Cras mattis tempor eros nec tristique. Sed sed felis arcu, vel vehicula augue. Maecenas faucibus sagittis. </p>
              <a href="#" class="link-1 fright">read more</a> </div>
          </div>
          <div class="number-2 top-2"> <strong class="bg-clr-2">06.</strong>
            <div class="extra-wrap">
              <h2 class="clr-2">Massage</h2>
              <p class="border-bot"><i class="clr-2"><strong>Vivamus hendrerit mauris ut dui gravida ut viverra lectus </strong></i><br>
                tincidunt. Cras mattis tempor eros nec tristique. Sed sed felis arcu, vel vehicula augue. Maecenas faucibus sagittis. </p>
              <a href="#" class="link-1 fright">read more</a> </div>
          </div>
        </div>
        <div class="grid_6 top-1">
          <div class="number-2"> <strong class="bg-clr-3">03.</strong>
            <div class="extra-wrap">
              <h2 class="clr-3">Fase lifting</h2>
              <p class="border-bot"><i class="clr-3"><strong>Cras mattis tempor eros nec tristique. </strong></i><br>
                Sed sed felis arcu, vel vehicula augue. Maecenas faucibus sagittis cursus. Fusce incidunt, tellus eget tristique. </p>
              <a href="#" class="link-1 fright">read more</a> </div>
          </div>
          <div class="number-2 top-2"> <strong class="bg-clr-3">07.</strong>
            <div class="extra-wrap">
              <h2 class="clr-3">Manicure</h2>
              <p class="border-bot"><i class="clr-3"><strong>Cras mattis tempor eros nec tristique.</strong></i><br>
                Sed sed felis arcu, vel vehicula augue. Maecenas faucibus sagittis cursus. Fusce incidunt, tellus eget tristique. </p>
              <a href="#" class="link-1 fright">read more</a> </div>
          </div>
        </div>
        <div class="grid_6 top-1">
          <div class="number-2"> <strong class="bg-clr-4">04.</strong>
            <div class="extra-wrap">
              <h2 class="clr-4">Waxing</h2>
              <p class="border-bot"><i class="clr-4"><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</strong></i><br>
                Vivamus hendrerit mauris ut dui gravida ut viverra lectus tincidunt. Cras mattis tempor eros nec tristique. </p>
              <a href="#" class="link-1 fright">read more</a> </div>
          </div>
          <div class="number-2 top-2"> <strong class="bg-clr-4">08.</strong>
            <div class="extra-wrap">
              <h2 class="clr-4">Pedicure</h2>
              <p class="border-bot"><i class="clr-4"><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</strong></i><br>
                Vivamus hendrerit mauris ut dui gravida ut viverra lectus tincidunt. Cras mattis tempor eros nec tristique. </p>
              <a href="#" class="link-1 fright">read more</a> </div>
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="bg-6">
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
  <p>© 2012 Spa salon<br>
    Website Template by <a target="_blank" href="http://www.templatemonster.com/" class="link">Templatemonster.com</a></p>
</footer>
</body>
</html>
  <!--  Modal  -->
        <script>
            <?php
            for($j= 0 ; $j <= $i; $j++){
        ?>
            $('#detail<?php echo $j;?>').appendTo("body")
            <?php
            }
        ?>
            $('#search').appendTo("body")
        </script>
         <script>
      $('.handle').on('click', function(){
        $('nav ul').toggleClass('showing');
      });
    </script>
	
    <script src="../jsa/jquery.min.js" type="text/javascript"></script>
        <script src="../jsa/bootstrap.min.js" type="text/javascript"></script>
        <script src="../jsa/dashboard.js" type="text/javascript"></script>

      
<script src="asset/js/jquery.min.js"></script>
   <script src="asset/js/jquery-migrate-3.0.1.min.js"></script>
   <script src="asset/js/popper.min.js"></script>
   <script src="asset/js/bootstrap.min.js"></script>
   <script src="asset/js/jquery.easing.1.3.js"></script>
   <script src="asset/js/jquery.waypoints.min.js"></script>
   <script src="asset/js/jquery.stellar.min.js"></script>
   <script src="asset/js/owl.carousel.min.js"></script>
   <script src="asset/js/jquery.magnific-popup.min.js"></script>
   <script src="asset/js/aos.js"></script>
   <script src="asset/js/jquery.animateNumber.min.js"></script>
   <script src="asset/js/scrollax.min.js"></script>
   <script src="asset/js/main.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
   <script src="asset/js/navbar.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script>
  if( !window.jQuery ) document.write('<script src="js/jquery-3.0.0.min.js"><\/script>');
</script>
   <script>
      $('.handle').on('click', function(){
        $('nav ul').toggleClass('showing');
      });
    </script>
   <script>
      $('.handle').on('click', function(){
        $('nav ul').toggleClass('showing');
      });
    </script>
    <script>
function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>
        <script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

        <!--  Modal  -->
        <script>
            <?php
            for($j= 0 ; $j <= $i; $j++){
        ?>
            $('#detail<?php echo $j;?>').appendTo("body")
            <?php
            }
        ?>
            $('#search').appendTo("body")
        </script>
         <script>
      $('.handle').on('click', function(){
        $('nav ul').toggleClass('showing');
      });
    </script>
    <script>
var a2a_config = a2a_config || {};
a2a_config.onclick = 1;
a2a_config.locale = "id";
</script>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<script>
    $(document).ready(function(){
    $(window).scroll(function(){
        if ($(window).scrollTop() > 100) {
            $('#tombolScrollTop').fadeIn();
        } else {
            $('#tombolScrollTop').fadeOut();
        }
    });
});

function scrolltotop()
{
    $('html, body').animate({scrollTop : 0},500);
}
    </script>
