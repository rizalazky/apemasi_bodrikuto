<?php

// panggil fungsi validasi xss dan injection

require_once('fungsi_validasi.php');

$server   = "localhost:3306";
$username = "bodrikut_apemasi";
$password = "123Februari";
$database = "bodrikut_apemasi";
$bpsda    = "BPUSDATARU BODRI KUTO";
$lbpsda   = "BALAI PU SDA TATA RUANG BODRI KUTO";
$lokasi   = "Semarang";
$web      = "http://www.bodrikuto.com/";

// Koneksi dan memilih database di server
if(mysql_connect($server,$username,$password)){

    mysql_select_db($database) or die("Database tidak bisa dibuka".mysql_error());
}else{
    die("Koneksi server gagal".mysql_error());
}



// buat variabel untuk validasi dari file fungsi_validasi.php
$val = new Psda;

?>
