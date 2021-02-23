<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include_once "../config/koneksi.php";
include_once "../config/fungsi_indotgl.php";
include_once "../config/library.php";
$bendung=mysql_query("SELECT * FROM bendung WHERE kode='$_GET[id]'");
$b=mysql_fetch_array($bendung);
$bln=$_GET[bln];
$thn=$_GET[thn];
$kode=$_GET[id];

?>
<html>
<head></head>
<body onload=print()> 
<?php 
echo "<center><h2 style='color:#009; '>LAPORAN KONTROL POINT BULANAN<BR>
$lbpsda</h2></center><hr>
<table >
<tr><td>Nama Bendung </td><td>: <b>$b[bendung] ($b[kode])</b></tr>
<tr><td>Bulan </td><td>: <b><b>$nama_bln[$bln]</b></tr>
<tr><td>Tahun </td><td>: <b>$thn</b></tr>
</table ><br>
<table border=1 style='border-collapse:collapse; width:100%;' >	  
	  <thead style='background:#dcdcdc;'><tr>
    <th>No</th>
    <th>Tanggal</th>
    <th>Jam</th>
    <th>Elevasi</th>
    <th>Debit</th>
    <th>QInt Ka</th>
    <th>QInt Ki</th>
    <th>Status</th>
    <th>Petugas</th>
    </tr></thead>
    <tbody>";
  
    $no=1;
    
   $elevasi=mysql_query("SELECT * FROM elevasi WHERE kode='$kode' AND month(tgl)='$bln' AND year(tgl)='$thn'");
    
   while($r=mysql_fetch_array($elevasi)){
    $tanggal=tgl_indo($r[tgl]);
    $lebar=strlen($no);
    switch($lebar){
      case 1:
      {
        $g="0".$no;
        break;     
      }
      case 2:
      {
        $g=$no;
        break;     
      }      
    } 

  echo "
  <tr><td width='50'><center>$g</center></td>
  <td ><center>$tanggal</center></td>
  <td><center>$r[jam]</center></td>
  <td ><center>$r[elevasi]</center></td>
  <td ><center>$r[debit]</center></td>
  <td ><center>$r[Qka]</center></td>
  <td ><center>$r[Qki]</center></td>
  <td ><center>$r[status]</center></td>
  <td ><center>$r[petugas]</center></td>
  </tr> ";

  
  $no++; }
  $tgl=tgl_indo($tgl_sekarang);
  echo "</table><br> 
  <p align=right>$lokasi, $tgl</p>
  ";
   
  echo "</div>";
  ?>

  </body></html>
