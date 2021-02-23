<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){

  echo "<link href='../../css/zalstyle.css' rel='stylesheet' type='text/css'>
  <link rel='shortcut icon' href='../../favicon.png' />
  
  <body class='special-page'>
  <div id='container'>
  <section id='error-number'>
  <img src='../../img/lock.png'>
  <h1>MODUL TIDAK DAPAT DIAKSES</h1>
  <p><span class style=\"font-size:14px; color:#ccc;\">Untuk mengakses modul, Anda harus login dahulu!</p></span><br/>
  </section>
  <section id='error-text'>
  <p><a class='button' href='../../index.php'> <b>LOGIN DI SINI</b> </a></p>
  </section>
  </div>";}
  
else{
include "../../config/koneksi.php";
include "../../config/excel_reader.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus group
if ($module=='elevasi' AND $act=='hapus'){
  mysql_query("DELETE FROM elevasi WHERE id_elevasi='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input elevasi
elseif ($module=='elevasi' AND $act=='input'){
   mysql_query("INSERT INTO elevasi
  (elevasi,kode,waspada,siaga,awas) 
  VALUES(
  '$_POST[elevasi]',
  '$_POST[kode]',
  '$_POST[waspada]',
  '$_POST[siaga]',
  '$_POST[awas]')");
   
  header('location:../../media.php?module='.$module);
}

// Update elevasi
elseif ($module=='elevasi' AND $act=='update'){
    mysql_query("UPDATE elevasi SET elevasi='$_POST[elevasi]'
               WHERE id_elevasi = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}

// import elevasi
elseif ($module=='elevasi' AND $act=='import'){
    $target = basename($_FILES['file']['name']) ;
    move_uploaded_file($_FILES['file']['tmp_name'], $target);
    
    $data = new Spreadsheet_Excel_Reader($_FILES['file']['name'],false);
    
//    menghitung jumlah baris file xls
    $baris = $data->rowcount($sheet_index=0);
    
//    jika kosongkan data dicentang jalankan kode berikut
    $drop = isset( $_POST["drop"] ) ? $_POST["drop"] : 0 ;
    if($drop == 1){
//             kosongkan tabel pegawai
             $truncate ="TRUNCATE TABLE elevasi";
             mysql_query($truncate);
    };
    
//    import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
    for ($i=2; $i<=$baris; $i++)
    {
//       membaca data (kolom ke-1 sd terakhir)
      $kode           = $data->val($i, 1);
      $bendung   			= $data->val($i, 2);
      $elevasi  		  = $data->val($i, 3);
      $debit          = $data->val($i, 4);
      $tgl   	        = $data->val($i, 5);
      $jam 		        = $data->val($i, 6);
      $status         = $data->val($i, 7);
      $petugas   		  = $data->val($i, 8);
	    //      setelah data dibaca, masukkan ke tabel pegawai sql
      $query = "INSERT INTO elevasi (id_elevasi,kode, bendung, elevasi, debit, tgl, jam, status, petugas) values('','$kode','$bendung','$elevasi','$debit','$tgl','$jam','$status','$petugas')";
      $hasil = mysql_query($query);
    }
    unlink($_FILES['file']['name']); 
    if(!$hasil){
//          jika import gagal
          die(mysql_error());
      }else{
//          jika impor berhasil
       header('location:../../media.php?module=elevasi&act=elevasi');
    }
    
//    hapus file xls yang udah dibaca 
}


}
?>
