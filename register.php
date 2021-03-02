<?php
include "config/koneksi.php";
$nama     = $_POST['nama'];
$no_hp  = $_POST['no_hp'];
$kode_bendung  = $_POST['kode_bendung'];
$sms    = $_POST['sms'];
$sendNomer     = $_POST['nohp'];
$receivingDatetime = $_POST['time'];
$auth =$_POST['auth'];

if ($auth=='b3901828dd8d18abb82d47f7ecffb537'){
    mysql_query("INSERT INTO phonebook(nama, no_hp) VALUES  ('$nama','$no_hp')");
                  
// $quey="INSERT INTO elevasi(kode,bendung,elevasi,debit,Qka,Qki,tgl,jam,status,petugas) VALUES('$kode','$bendung','$elevasi','$debit','$Qka','$Qki','$tgl','$jam','$status','$petugas')" ;
$smsquery="INSERT INTO inbox(TextDecoded,SenderNumber,ReceivingDateTime)VALUES('$sms','$sendNomer','$receivingDatetime')";
mysql_query($smsquery);    
}
?>
