<?php
error_reporting(0);
	require "php/connection.php";
    session_start();
    if(!isset($_SESSION['login_role'])){
		    echo "<script language=javascript>document.location.href='login.php'</script>";
	}

    if(isset($_SESSION['login_role'])){
        if($_SESSION['login_role'] != 'User')
		    echo "<script language=javascript>document.location.href='login.php'</script>";
	}
	    if(isset($_GET['booking_id'])) {
        $id = $_GET['booking_id'];
	 $id_customer = $_SESSION['id_customer'];
    $nama_lengkap = "";
    $alamat = "";
    $email = "";
    $no_hp = "";
	 $gambar = "";
    $login_id = "";
    $username = "";
    $password = "";
    $strQuery = "SELECT SELECT * FROM tbl_booking INNER JOIN registrasi ON tbl_booking.id_customer = registrasi.id_customer INNER JOIN bayar_booking ON tbl_booking.booking_id = bayar_booking.booking_id ORDER BY id_bookingfee ASC";
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
	
// memanggil library FPDF
require('fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
# header

      
       $pdf->SetFont('Arial','B',14);
        $pdf->Cell(130 ,5,'MARIA STUDIO BEAUTY',0,0);
        $pdf->Cell(59 ,5,'#	INVOICE BOOKING',0,1);//end of line
        //set font jadi arial, regular, 12pt
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(130 ,5,'Jl. Bambu 02B Kampung Durian',0,0);
        $pdf->Cell(59 ,5,'',0,1);//end of line

        $pdf->Cell(130 ,5,'Medan Timur',0,1);
 
        $pdf->Cell(130 ,5,'Phone: 082165495736',0,1);
        $pdf->Cell(130 ,5,'Email: mariastudiosalon@gmail.com',0,1);

 //buat dummy cell untuk memberi jarak vertikal
      $pdf->Cell(189 ,10,'',0,1);//end of line
        $yi = 44;
        $ya = 44;
        $pdf->setFont('Arial','',9);
        $pdf->setFillColor(222,222,222);
        $pdf->setXY(10,$ya);
     
        $pdf->CELL(40,6,'Nama Lengkap',1,0,'C',1);
        $pdf->CELL(36,6,'Layanan & Perawatan',1,0,'C',1);
		$pdf->CELL(26,6,'Tanggal Booking',1,0,'C',1);
			$pdf->CELL(23,6,'Tanggal Bayar',1,0,'C',1);
		$pdf->CELL(12,6,'Hari',1,0,'C',1);
		$pdf->CELL(16,6,'Jam',1,0,'C',1);
		$pdf->CELL(18,6,'Status Hari',1,0,'C',1);
	   $pdf->CELL(26,6,'Harga ',1,1,'C',1);

      
		


$pdf->SetFont('Arial','',10);

include 'php/connection.php';
$mahasiswa = mysqli_query($connection, "SELECT * FROM booking INNER JOIN registrasi ON booking.id_customer = registrasi.id_customer INNER JOIN detail_booking ON booking.booking_id = detail_booking.booking_id WHERE booking.id_customer = '$id_customer' AND booking.booking_id = '$id' ");

while ($row = mysqli_fetch_array($mahasiswa)){

    $pdf->Cell(40,6,$_SESSION['nama_lengkap'],1,0, 'C');
    $pdf->Cell(36,6,$row['nama_layananperawatan'],1,0, 'C');
 $pdf->Cell(26,6,$row['tanggal_booking'],1,0, 'C');
  $pdf->Cell(23,6,$row['tanggal'],1,0, 'C');
  $pdf->Cell(12,6,$row['hari'],1,0, 'C');
  $pdf->Cell(16,6,$row['jam'],1,0, 'C');
  $pdf->Cell(18,6,$row['status_hari'],1,0, 'C');
	  $pdf->Cell(26,6,Rp. number_format($row['harga'],2,',','.'),1,1, 'C'); 

$gambar=$row['gambar'];
 $pdf->Cell(180 ,8,'',0,1);//end of line
 $pdf->CELL(50,6,'Struk Pembayaran',10,70,'C',1);
$pdf->Image('php/gambar/' . $gambar,10,70,50,70);
}

 $bln_list = array(
          '01' => 'Januari',
          '02' => 'Februari',
          '03' => 'Maret',
          '04' => 'April',
          '05' => 'Mei',
          '06' => 'Juni',
          '07' => 'Juli',
          '08' => 'Agustus',
          '09' => 'September',
          '10' => 'Oktober',
          '11' => 'November',
          '12' => 'Desember'
        );

            # footer
            $pdf->Ln();
            $pdf->Ln();
            $pdf->Ln();
            $pdf->SetFont('Arial','',9);
            $pdf->SetX(120);
            $pdf->MultiCell(95,10,'Tanggal Cetak, '.date('d').' '.$bln_list[date('m')].' '.date('Y'),0,'C');
              //$pdf->image('http://localhost/golekopo/assets/images/logonew.png', 10,10);
            $pdf->SetX(120);
            $pdf->Ln();
        $pdf->Output();
?>