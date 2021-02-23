<?php

// panggil fungsi validasi xss dan injection
require_once('fungsi_validasi.php');

$server   = "localhost:3306";
$username = "root";
$password = "";
$database = "svnvbkdl_dbapemasi";
$bpsda    = "BPSDA PEMALI COMAL";
$lbpsda   = "Balai SDA Pemali Comal";
$lokasi   = "Tegal";
$web      = "https://pemalicomal.com";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");

// buat variabel untuk validasi dari file fungsi_validasi.php
$val = new Psda;

?>
