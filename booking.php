<?php
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
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

                   <!-- Header -->
    <div class="header bg-white pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
         
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                 <div class="card-header border-0" style="overflow-y:auto;">
  <center> <h4>DATA BOOKING</h4></center>
            </div>
            <!-- Light table -->
            <div class="content table-responsive table-full-width" style="overflow-x: scroll;width: 900px;">
                                        <table class="table table-striped" >
                                            <thead>
										
												<th>Nama Anda</th>
                                                <th>Layanan & Perawatan</th>
												<th>Harga</th>  
												 <th>Tanggal Booking</th>  
											<th>Status</th>  
																									
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
               <?php
  // Load file koneksi.php
  include "../php/connection.php";
  $query = "SELECT * FROM booking INNER JOIN registrasi ON booking.id_customer = registrasi.id_customer WHERE booking.id_customer = '$_SESSION[id_customer]'"; // Query untuk menampilkan semua data siswa
  $query2 = "SELECT * FROM booking INNER JOIN detail_booking ON booking.booking_id = detail_booking.booking_id WHERE booking.id_customer = '$_SESSION[id_customer]' AND detail_booking.id_detail"; // Query untuk menampilkan semua data siswa
 $sql2 = mysqli_query($connection, $query2);
$data2 = mysqli_fetch_array($sql2); 


 $sql = mysqli_query($connection, $query); // Eksekusi/Jalankan query dari variabel $query
 
  while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
      $bookingstatus = $data['Sudah Selesai']; 
      $bookingstatus2 = $data['Menunggu']; 
    $sekarang = strtotime(date('Y-m-d'));
   $tgl_kembali = strtotime($data['tanggal']);
    // ambil waktu 1 hari sebelum tgl pengembalian
   $minus1 = strtotime("-1 day", $tgl_kembali);
             if ($sekarang < $minus1) {
              $_SESSION['status'] = '<span class="badge badge-pill badge-success">Bayar Segera</span>';
            } elseif ($sekarang === $minus1) {
             $_SESSION['status'] = '<span class="badge badge-pill badge-warning">1 hari tersisa</span>';
           }  else {
            $_SESSION['status'] = '<span class="badge badge-pill badge-danger">Waktu Pembayaran Booking Habis</span>';
          }
      
    echo "<tr>";
    echo "<td>".$_SESSION['nama_lengkap']."</td>";
	echo "<td>".$data['nama_layananperawatan']."</td>";
	echo "<td>Rp." .number_format($data['harga'],2,',','.')."</td>"; 
    	echo "<td>".$data['tanggal_booking']."</td>";
echo "<td>".$data['booking_status']." <br> <span class='badge badge-pill badge-success'>".$data['status_bayar']."</span></td>";
   echo "<td><a href=# data-toggle=modal class='btn btn-default btn-small' data-target=#jadwal$i>Atur Jadwal</a>  <a href=# data-toggle=modal class='btn btn-default btn-small' data-target=#detail$i>Bayar Booking</a>  <a href='detail_booking.php?booking_id=".$data['booking_id']."' class='btn btn-default btn-small'>Detail</a> <a href='invoices.php?booking_id=".$data['booking_id']."' class='btn btn-default btn-small' target='_blank'>Invoices</a> <a href='php/hapus_booking.php?booking_id=".$data['booking_id']."' class='btn btn-default btn-small'>Hapus</a> </td>";
  

    echo "</tr>";																										
  
  ?>
   <!--Modal Jadwal -->
                                                    <div class="modal fade " id="jadwal<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <form method="POST" action="php/jadwal_proses.php" enctype="multipart/form-data">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                      
                                                                      <center>  <h4 class="modal-title" id="myModalLabel">Jadwal Booking</h4></center>
                                                                    </div>
                                                                    <div class="modal-body">
																	 	   <div class="col-md-12">
																		<div class="form-group">
																			<label>Tanggal Booking</label>
																			<input type="date" class="form-control border-input" name="tanggal_booking"  value=" <?php echo $data['tanggal_booking']?> " />
																		</div>
																	 </div>
																	  	   <div class="col-md-12">
																		<div class="form-group">
																			<label>Jam</label>
																			<input type="time" class="form-control border-input" name="jam"  />
																		</div>
																	 </div>
																	    <div class="col-md-12">
                                                                        <div class="form-group">
																				<label>Hari</label>
                                                                            <select class="form-control border-input" name="hari" value="Pilih Hari Booking"> >
																			
                                                                                <option value="Senin">Senin</option>
                                                                                <option value="Selasa">Selasa</option>
                                                                                <option value="Rabu">Rabu</option>
																				  <option value="Kamis">Kamis</option>
																				    <option value="Jum'at">Jum'at</option>
																					  <option value="Sabtu">Sabtu</option>
																					    <option value="Minggu">Minggu</option>
																			   </select>
                                                                        </div>
																		 </div>
																	    <div class="col-md-12">
                                                                        <div class="form-group">
																			
                                                                            <select class="form-control border-input" name="status_hari">
																			  <option value="Pagi" <?php if($data['status_hari'] == 'Siang') echo "selected"?>>Pagi</option>
                                                                                <option value="Siang" <?php if($data['status_hari'] == 'Siang') echo "selected"?>>Siang</option>
																			<option value="Sore" <?php if($data['status_hari'] == 'Sore') echo "selected"?>>Sore</option>
                                                                                <option value="Malam" <?php if($data['status_hari'] == 'Malam') echo "selected"?>>Malam</option>

																			   </select>
                                                                        </div>
																		 </div>
															
																
																	     </div>
                                                                    <div class="modal-footer">
                                                                        <input type="hidden" name="booking_id" value="<?php echo "$data[booking_id]";?>" />
																	
                                                                        <input type="submit" value="Simpan Data Booking" class="btn btn-info btn-fill"/>
                                                                        <button type="button" class="btn btn-default btn-fill" data-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- End Jadwal -->
  
  
  
  
  
  <!--Modal Edit -->
                                                    <div class="modal fade " id="detail<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <form method="POST" action="php/detail_proses.php" enctype="multipart/form-data">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                      
                                                                      <center>  <h4 class="modal-title" id="myModalLabel">Detail Booking</h4></center>
                                                                    </div>
                                                                    <div class="modal-body">
																	 <div class="col-md-12">
																		<div class="form-group">
																			<label>Nama Lengkap</label>
																			<input type="text" class="form-control border-input" name="nama_lengkap"  disabled value=" <?php echo $_SESSION['nama_lengkap']?> " />
																		</div>
																	 </div>
																	  <div class="col-md-12">
																		<div class="form-group">
																			<label> Layanan & Perawatan</label>
																			<input type="text" class="form-control border-input" name="nama_layananperawatan"  disabled value=" <?php echo $data['nama_layananperawatan']?> " />
																		</div>
																	 </div>
																	 	  <div class="col-md-12">
																		<div class="form-group">
																			<label>Harga</label>
																			<input type="text" class="form-control border-input" name="harga"  disabled value="Rp. <?php echo number_format($data['harga'],2,',','.')?> " />
																		</div>
																	 </div>
																	 	   <div class="col-md-12">
																		<div class="form-group">
																			<label>Tanggal Booking</label>
																			<input type="text" class="form-control border-input" name="tanggal_booking"   disabled value="<?php echo $data['tanggal_booking']?>"/>
																		</div>
																	 </div>
																	 	   <div class="col-md-12">
																		<div class="form-group">
																			<label>Tanggal Bayar</label>
																			<input type="text" class="form-control border-input" name="tanggal" value="<?php echo date("Y-m-d"); ?>"/>
																		</div>
																	 </div>
																	  	  <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <select class="form-control border-input" name="norek">
																			  <option value="BRI (126281260233734 a/n Marianey Siregar)">BRI (126281260233734 a/n Marianey Siregar</option>
																			   </select>
                                                                        </div>
																		 </div>
															
																 <div class="col-md-12">
																		<div class="form-group">
																			<label>Upload Struk</label>
																		 	<input type="file" accept="image/*" onchange="preview_imagee(event)" class="form-control border-input" name="gambar" />
																		<img 
														src="gambar/<?php echo $gambar?>" 
														id="preview_image"
														style="width:200px; height:200px"><br>
																		</div>
																	 </div>
																	     </div>
                                                                    <div class="modal-footer">
                                                                        <input type="hidden" name="booking_id" value="<?php echo "$data[booking_id]";?>" />
																		<input type="hidden" name="nama_layananperawatan" value="<?php echo "$data[nama_layananperawatan]";?>" />
																		<input type="hidden" name="harga" value="<?php echo "$data[harga]";?>" />
																		<input type="hidden" name="tanggal" value="<?php echo date("Y-m-d"); ?>" />
																		<input type="hidden" name="gambar"/>
                                                                        <input type="submit" value="Simpan Data Booking" class="btn btn-info btn-fill"/>
                                                                        <button type="button" class="btn btn-default btn-fill" data-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- End Modal -->
													
													 <!--Lihat Booking  -->
                                                    <div class="modal fade " id="lihatbooking<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <form method="POST" action="" enctype="multipart/form-data">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                      
                                                                      <center>  <h4 class="modal-title" id="myModalLabel">Detail Booking</h4></center>
                                                                    </div>
                                                                    <div class="modal-body">
																	 <div class="col-md-12">
																		<div class="form-group">
																			<label>Nama Lengkap</label>
																			<input type="text" class="form-control border-input" name="nama_lengkap"  disabled value=" <?php echo $_SESSION['nama_lengkap']?> " />
																		</div>
																	 </div>
																	  <div class="col-md-12">
																		<div class="form-group">
																			<label> Layanan & Perawatan</label>
																			<input type="text" class="form-control border-input" name="nama_layananperawatan"  disabled value=" <?php echo $data['nama_layananperawatan']?> " />
																		</div>
																	 </div>
																	 	   <div class="col-md-12">
																		<div class="form-group">
																			<label>Tanggal Booking</label>
																			<input type="text" class="form-control border-input" name="tanggal"   value=" <?php echo $data2['tanggal']?> " />
																		</div>
																	 </div>
																	  	   <div class="col-md-12">
																		<div class="form-group">
																			<label>Jam</label>
																			<input type="text" class="form-control border-input" name="jam"   value=" <?php echo $data2['jam']?> "/>
																		</div>
																	 </div>
																	    <div class="col-md-12">
                                                                        <div class="form-group">
																				<input type="text" class="form-control border-input" name="jam"   value=" <?php echo $data2['hari']?> "/>
                                                                        </div>
																		 </div>
																	    <div class="col-md-12">
                                                                        <div class="form-group">
																			
                                                                           	<input type="text" class="form-control border-input" name="jam"   value=" <?php echo $data2['status_hari']?> "/>
                                                                        </div>
																		 </div>
															
																 <div class="col-md-12">
																		<div class="form-group">
																			
																		
																	<?php if($data2['gambar']){ ?>
																	   
																		<img src="php/gambar/<?php echo $data2['gambar'] ?>" height="400px" width="420px">
																	<?php } else { ?>
																		<img src="#" width="270px" height="200px">
																	<?php } ?>
																		</div>
																	 </div>
																	     </div>
                                                                    <div class="modal-footer">
                                                                       
                                                                        <button type="button" class="btn btn-default btn-fill" data-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- End Modal -->


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
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <!--<a href="tambah_data_mitra.php" class="btn btn-sm btn-neutral">Tambah Data</a> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page cont
          </div>
			  <div class="container-fluid mt--8">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
          
	  
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
		
