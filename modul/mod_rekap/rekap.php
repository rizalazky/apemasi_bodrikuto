<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>


<?php

//cek hak akses user
$cek=user_akses($_GET[module],$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){

$aksi="modul/mod_rekap/aksi_rekap.php";
switch($_GET[act]){
//update/////////////////////////////////////

  // rekap elevasi
    default:
    echo "<div id=main-content> 
      <div class=container_12> 
      <div class=grid_12> 
      <br/>
	  </div>
    <div class=grid_12> 
      <div class=block-border> 
      <div class=block-header> 
      <h1>LAPORAN  ELEVASI  </h1>
      <span></span> 
      </div> 
       <div class='block-content'>
   
   <form method=POST action=?module=rekap&act=tampil>
   <input type=hidden name=id value='$r[id_elevasi]'>
		
   <p class=inline-small-label> 
   <label for=field4>Bendung</label>
   <select name='kode'>
   <option value='-' selected>Pilih Bendung</option>";
   $tampil=mysql_query("SELECT * FROM bendung ORDER BY id_bendung");
   while($r=mysql_fetch_array($tampil)){
   echo "<option value='$r[kode]'>$r[bendung]</option>"; 
   }
   echo "</select></p>
      
   <p class=inline-small-label> 
   <label for=field4>Periode</label>
   <select name='bulan'>
          <option value='$bln_sekarang' selected>$nama_bln[$bln_sekarang]</option>
          ";
          for ($bln=1; $bln<=12; $bln++){
    echo "<option value='$bln'>$nama_bln[$bln]</option>";      
          }
    echo "</select>";
          $thn_skrng=date("Y");
    echo "  Tahun : <select name='tahun'>
          <option value='$thn_sekarang' selected>$thn_sekarang</option>          ";
          for ($thn=2014; $thn<=$thn_skrng; $thn++){
    echo "<option value='$thn'>$thn</option>";      
          }
    echo "</select>
   
    <div class=block-actions> 
      <ul class=actions-left> 
      <li>
      <a class='button red' id=reset-validate-form href='?module=rekap'>&nbsp; &nbsp;&nbsp; Batal &nbsp;&nbsp;&nbsp; &nbsp;</a>
      </li> </ul>
      <ul class=actions-right> 
      <li>
      <input type='submit' name='upload' class='button' value='Proses '>
	  </li> </ul></form>";
    
    break;
case "tampil":
      $edit=mysql_query("SELECT * FROM bendung WHERE kode='$_POST[kode]'");
      $e=mysql_fetch_array($edit);
      $bendung=strtoupper($e[bendung]);
      $bln=$_POST[bulan];
   
echo "<div id=main-content> 
      <div class=container_12> 
      <div class=grid_12> 
      <div class=block-border> 
      <div class=block-header> 
      <h1>DAFTAR ELEVASI </h1>
      <span></span> 
      </div> 
      <div class='block-content'>
		  
	 <p class=inline-small-label> 
   <label for=field4>Bendung</label> :<b> $bendung ($e[kode])</b>
   </p>
   
   <p class=inline-small-label> 
   <label for=field4>Bulan</label> : $nama_bln[$bln]
   </p>
   
   <p class=inline-small-label> 
   <label for=field4>Tahun</label> : $_POST[tahun]
   </p>
   <img src='img/print.png' title='Cetak Laporan'  style='width:25px; 
   height:25px; margin-left:600px; margin-top:-30px;' onclick=\"popup('print/cetak.php?id=$e[kode]&bln=$_POST[bulan]&thn=$_POST[tahun]')\">
   <hr>
     <table id='table-example' class='table' >	  
  	  
    <thead><tr>
    <th>No</th>
    <th>Elevasi</th>
    <th>Debit</th>
    <th>Status</th>
    <th>Tanggal</th>
    <th>Jam</th>
    <th>Petugas</th>
    <th>Aksi</th>
  
    </thead>
    <tbody>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    $tampil=mysql_query("SELECT * FROM elevasi WHERE kode='$_POST[kode]' AND month(tgl)='$_POST[bulan]' AND year(tgl)='$_POST[tahun]'");
   
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
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

  echo "<tr class=gradeX> 
  <td width=10><center>$g</center></td>
  <td style='text-align:center;'>$r[elevasi]</td>
  <td style='text-align:center;'>$r[debit]</td>
  <td style='text-align:center;'>$r[status]</td>
  <td style='text-align:right;'>$r[tgl]</td>
  <td style='text-align:right;'>$r[jam]</td>
  <td style='text-align:right;'>$r[petugas]</td>
  <td width=70><center>
  <a href=?module=elevasi&act=editelevasi&id=$r[id_elevasi] rel=tooltip-top title='Edit' class='with-tip'>
  <img src='img/edit.png'></a>&nbsp;&nbsp;
   
  <a href=javascript:confirmdelete('$aksi?module=elevasi&act=hapus&id=$r[id_elevasi]') rel=tooltip-top title='Hapus' class='with-tip'>
  &nbsp;&nbsp;<img src='img/hapus.png'></a> </center>
   
  </td></tr>";
  
      $no++;
      }
echo "</tbody></table> ";

      
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM elevasi"));
       
  break;    
       
  
 // Form Edit elevasi  
  case "editelevasi":
  
  $edit=mysql_query("SELECT * FROM elevasi WHERE id_elevasi='$_GET[id]'");
  $r=mysql_fetch_array($edit);

  
  echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>EDIT ELEVASI</h1>
   </div>
   <div class='block-content'>	
	
   <form method=POST action=$aksi?module=elevasi&act=update>
   <input type=hidden name=id value='$r[id_elevasi]'>
		  
   <p class=inline-small-label> 
   <label for=field4>Bendung</label>
   <input type=text name='bendung' value='$r[bendung]' size=40 readonly>
   </p>
   
   <p class=inline-small-label> 
   <label for=field4>Elevasi</label>
   <input type=text name='elevasi' value='$r[elevasi]' size=5> m
   </p>";
   
   echo " <br/><br/><div class=block-actions> 
      <ul class=actions-right> 
      <li>
      <a class='button red' id=reset-validate-form href='?module=elevasi'>Batal</a>
      </li> </ul>
      <ul class=actions-left> 
      <li>
      <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
	  </li> </ul>
	  </form>";
	  
	  
    break;  
   }
   //kurawal akhir hak akses module
   } else {
	echo akses_salah();
   }
   ?>




   </div> 
   </div>
   </div>
   <div class='clear height-fix'></div> 
   </div></div>
