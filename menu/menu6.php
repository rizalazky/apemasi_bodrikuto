<?php
include "../config/koneksi.php";

$cek=umenu_akses("?module=distribusi",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=distribusi'><b>Alokasi Air</b></a></li>";
}

$cek=umenu_akses("?module=bendung",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=bendung&act=import'><b>Export/Import Data</b></a></li>";
}

$cek=umenu_akses("?module=bendung",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=bendung&act=upload'><b>Upoad Data</b></a></li>";
}
?>
