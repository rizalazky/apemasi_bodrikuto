<?php
include "../config/koneksi.php";

$cek=umenu_akses("?module=rekap",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=rekap'><b>Elevasi Bulanan</b></a></li>";
}

$cek=umenu_akses("?module=rekap",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=petugas'><b>Petugas Operasi Bendung</b></a></li>";
}

$cek=umenu_akses("?module=rekap",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=petugas&act=broadcast'><b>Penerima Broadcast</b></a></li>";
}
?>
