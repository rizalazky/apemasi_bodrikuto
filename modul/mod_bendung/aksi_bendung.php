<?php
error_reporting(0);

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
include "../../config/fungsi_indotgl.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus group
if ($module=='bendung' AND $act=='hapus'){
  mysql_query("DELETE FROM bendung WHERE id_bendung='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input bendung
elseif ($module=='bendung' AND $act=='input'){
   mysql_query("INSERT INTO bendung
  (bendung,kode,waspada,siaga,awas,a,b,c) 
  VALUES(
  '$_POST[bendung]',
  '$_POST[kode]',
  '$_POST[waspada]',
  '$_POST[siaga]',
  '$_POST[awas]',
  '$_POST[a]',
  '$_POST[b]',
  '$_POST[c]')");
   
  header('location:../../media.php?module='.$module);
}

// Input bendung
elseif ($module=='bendung' AND $act=='uploadalokasi'){
    $tgl         = date("Y-m-d");
    $temp        = $_FILES['fupload']['tmp_name'] ;
    $nama        = $_FILES['fupload']['name'] ;
    $acak        = random(3);
    $nama_files  = $acak."_".$nama;
    $folder      = "../../uplod/$nama_files";
    $query = "INSERT INTO upload (file,jenisdata,tgl)
                VALUES('$nama_files','alokasi','$tgl')";
    $hasil = mysql_query($query);
    move_uploaded_file($temp,$folder);
    
  header('location:../../media.php?module='.$module.'&act=upload');
}

// Input bendung
elseif ($module=='bendung' AND $act=='uploadk'){
    $tgl         = date("Y-m-d");
    $temp        = $_FILES['fupload']['tmp_name'] ;
    $nama        = $_FILES['fupload']['name'] ;
    $acak        = random(3);
    $nama_files  = $acak."_".$nama;
    $folder      = "../../uplod/$nama_files";
    $query = "INSERT INTO upload (file,jenisdata,tgl)
                VALUES('$nama_files','faktork','$tgl')";
    $hasil = mysql_query($query);
    move_uploaded_file($temp,$folder);
    
  header('location:../../media.php?module='.$module.'&act=upload');
}

// Update bendung
elseif ($module=='bendung' AND $act=='update'){
    mysql_query("UPDATE bendung SET bendung='$_POST[bendung]', kode='$_POST[kode]',
               waspada='$_POST[waspada]', siaga='$_POST[siaga]', awas='$_POST[awas]',
               a='$_POST[a]',b='$_POST[b]',c='$_POST[c]' 
               WHERE id_bendung = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}

// Update bendung
elseif ($module=='bendung' AND $act=='import'){
    $target = basename($_FILES['file']['name']) ;
    move_uploaded_file($_FILES['file']['tmp_name'], $target);
    
    $data = new Spreadsheet_Excel_Reader($_FILES['file']['name'],false);
    
//    menghitung jumlah baris file xls
    $baris = $data->rowcount($sheet_index=0);
    
//    jika kosongkan data dicentang jalankan kode berikut
    $drop = isset( $_POST["drop"] ) ? $_POST["drop"] : 0 ;
    if($drop == '1'){
//             kosongkan tabel pegawai
             $truncate ="TRUNCATE TABLE alokasi";
             mysql_query($truncate);
    };
    
//    import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
    for ($i=2; $i<=$baris; $i++)
    {
//       membaca data (kolom ke-1 sd terakhir)
      $lokasi       = $data->val($i, 1);
      $lbsi   			= $data->val($i, 2);
      $q_rata	  		= $data->val($i, 3);
      $q_ap			    = $data->val($i, 4);
      $a_tanam		  = $data->val($i, 5);
      $u_tanam  		= $data->val($i, 6);
      $padi_mt1     = $data->val($i, 7);
      $padi_mt2   	= $data->val($i, 8);
      $padi_tumbuh	= $data->val($i, 9);
      $padi_bunga	  = $data->val($i, 10);
      $padi_buah	  = $data->val($i, 11);
	    $padi_panen		= $data->val($i, 12);
      $tebu_olah	 	= $data->val($i, 13);
	    $tebu_pemel1  = $data->val($i, 14);
      $tebu_pemel2  = $data->val($i, 15);
      $pal_byk_air	= $data->val($i, 16);
      $pal_sdkt_air = $data->val($i, 17);
      $bero  		    = $data->val($i, 18);
      $fak_tersier  = $data->val($i, 19);
      $keb_tersier	= $data->val($i, 20);
      $keb_lain2	 	= $data->val($i, 21);
      $q_hilang		  = $data->val($i, 22);
      $q_suplesi   	= $data->val($i, 23);
      $q_bang_bagi 	= $data->val($i, 24);
	    $q_diberikan  = $data->val($i, 25);
	    $periode      = $data->val($i, 26);
	    $bulan        = $data->val($i, 27);
	    $tahun        = $data->val($i, 28);
	    $di           = $data->val($i, 29);
//      setelah data dibaca, masukkan ke tabel import sql
      $query = "INSERT INTO alokasi (lokasi,lbsi,q_rata,q_ap,a_tanam,u_tanam,padi_mt1,padi_mt2,padi_tumbuh,padi_bunga,padi_buah,padi_panen,tebu_olah,tebu_pemel1,tebu_pemel2,pala_byk_air,pala_sdkt_air,bero,fak_tersier,keb_tersier,keb_lain2,q_hilang,q_suplesi,q_bang_bagi,q_diberikan,periode,bulan,tahun,di)
                VALUES('$lokasi','$lbsi','$q_rata','$q_ap','$a_tanam','$u_tanam','$padi_mt1','$padi_mt2','$padi_tumbuh','$padi_bunga','$padi_buah','$padi_panen','$tebu_olah','$tebu_pemel1','$tebu_pemel2','$pal_byk_air','$pal_sdkt_air','$bero','$fak_tersier','$keb_tersier','$keb_lain2','$q_hilang','$q_suplesi','$q_bang_bagi','$q_diberikan','$periode','$bulan','$tahun','$di')";
      $hasil = mysql_query($query);
    }
    unlink($_FILES['file']['name']); 
    if(!$hasil){
//          jika import gagal
          die(mysql_error());
      }else{
//          jika impor berhasil
       header('location:../../media.php?module=distribusi');
    }
    
//    hapus file xls yang udah dibaca
    
    
  
}
}
?>
