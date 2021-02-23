<?php
include "../config/koneksi.php";

$cek=umenu_akses("?module=bendung",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=bendung'><b>Master Bendung</b></a></li>";
}

?>
