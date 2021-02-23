<?php
include "config/koneksi.php";
$kode     = $_POST['kode'];
$bendung  = $_POST['bendung'];
$elevasi  = $_POST['elevasi'];
$tgl      = $_POST['tgl'];
$jam      = $_POST['jam'];
$status   = $_POST['status'];
$petugas  = $_POST['petugas'];
$debit    = $_POST['debit'];
$Qka      = $_POST['Qka'];
$Qki      = $_POST['Qki'];
$auth     = $_POST['auth'];
if ($auth=='2e422bed3131daf11e89016073b230cd'){
mysql_query("INSERT INTO elevasi(kode,bendung,elevasi,debit,Qka,Qki,tgl,jam,status,petugas) 
            VALUES('$kode','$bendung','$elevasi','$debit','$Qka','$Qki','$tgl','$jam','$status',$petugas)" );
}

?>
