<?php
   $host = "localhost";
    $user = "carasimpel07_salon";
    $pass = "salon";
    $database = "carasimpel07_salon";
    
    $connection = mysqli_connect($host, $user, $pass, $database);
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>