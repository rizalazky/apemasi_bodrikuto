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

$aksi="modul/mod_distribusi/aksi_distribusi.php";
switch($_GET[act]){
//update/////////////////////////////////////

  // Tampil kelas
    default:
    echo "<div id=main-content> 
      <div class=container_12> 
      <div class=grid_12> 
      <br/>
	  </div>
    <div class=grid_12> 
      <div class=block-border> 
      <div class=block-header> 
      <h1>PERIODE DISTRIBUSI AIR</h1>
      <span></span> 
      </div> 
       <div class='block-content'>
   
   <form method=POST action=?module=distribusi&act=tampil>
   <input type=hidden name=id value='$r[id_elevasi]'>
	
  	
    <p class=inline-small-label> 
    <label for=field4>Daerah Irigasi</label>
    <select name='di'>
    <option value='0' selected> -Pilih Bendung-</option>";
    $sql=Mysql_query("SELECT * FROM bendung ORDER BY id_bendung");
    while ($b=mysql_fetch_array($sql)){
    echo "<option value='$b[kode]'>  $b[bendung]</option>";
    }
    echo "</select></p>
    
   <p class=inline-small-label> 
   <label for=field4>Periode</label>
   <select name='periode'>
   <option value='-' selected>-Pilih Periode-</option>
   <option value='I'> I (Kesatu) </option>
   <option value='II'> II (Kedua) </option>
   </select></p>
      
   <p class=inline-small-label> 
   <label for=field4>-Bulan-</label>
   <select name='bulan'>
          <option value='$bln_sekarang' selected> $nama_bln[$bln_sekarang]</option>
          ";
          for ($bln=1; $bln<=12; $bln++){
    echo "<option value='$bln'> $nama_bln[$bln]</option>";      
          }
    echo "</select>";
          $thn_skrng=date("Y");
    echo "  Tahun : <select name='tahun'>
          <option value='$thn_sekarang' selected> $thn_sekarang</option>          ";
          for ($thn=2014; $thn<=$thn_skrng; $thn++){
    echo "<option value='$thn'> $thn</option>";      
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

    case "tampil";
echo "<div id=main-content> 
      <div class=container_12> 
      <div class=grid_12> 
      <br/>
	  <a href='?module=bendung&act=import' class='button'>
     <span>Import distribusi</span>
     </a>
     </div>";

    if (empty($_GET['kata'])){
echo "<div class=grid_12> 
      <div class=block-border> 
      <div class=block-header> 
      <h1>DISTRIBUSI AIR</h1>
      <span></span> 
      </div> 
       <div class='block-content'>
       
		 <div style='overflow-x:auto;'>
     <table id='table-example' class='table'>	  
  	  
    <thead><tr>
    <th>No</th>
    <th>Nama Bangunan</th>
    <th>Luas Areal</th>
    <th>Q rata2 Periode lalu</th>
    <th>Q Akhir Periode lalu</th>
    <th>Areal Tanam</th>
    <th>Usia Tanam</th>
    <th>Padi Pengolohan MT1</th>
    <th>Padi Pengolahan MT2</th>
    <th>Padi Pertumbuhan</th>
    <th>Padi Pembungaan</th>
    <th>Padi Pembuahan</th>
    <th>Padi Panen</th>
    <th>Tebu Pengolahan</th>
    <th>Tebu Pemeliharaan I</th>
    <th>Tebu Pemeliharaan II</th>
    <th>Palawija Byk Air</th>
    <th>Palawija Sdkt Air</th>
    <th>Bero</th>
    <th>Faktor Tersier</th>
    <th>Rencana Keb. Air Qt</th>
    <th>Rencana Keb. Air Ql</th>
    <th>Rencana Keb. Air Qh</th>
    <th>Rencana Keb. Air Qs</th>
    <th>Rencana Keb. Air Qb</th>
    <th>Debit Diberikan (m3/dt)</th>
    <tbody>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    $tampil = mysql_query("SELECT * FROM alokasi WHERE periode='$_POST[periode]' AND bulan='$_POST[bulan]' AND tahun='$_POST[tahun]' AND di='$_POST[di]' ORDER BY id ASC");
    
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
  <td>$r[lokasi]</td>
  <td ><center>$r[lbsi]</center></td>
  <td ><center>$r[q_rata]</center></td>
  <td ><center>$r[q_ap]</center></td>
  <td ><center>$r[a_tanam]</center></td>
  <td ><center>$r[u_tanam]</center></td>
  <td ><center>$r[padi_mt1]</center></td>
  <td ><center>$r[padi_mt2]</center></td>
  <td ><center>$r[padi_tumbuh]</center></td>
  <td ><center>$r[padi_bunga]</center></td>
  <td ><center>$r[padi_buah]</center></td>
  <td ><center>$r[padi_panen]</center></td>
  <td ><center>$r[tebu_olah]</center></td>
  <td ><center>$r[tebu_pemel1]</center></td>
  <td ><center>$r[tebu_pemel2]</center></td>
  <td ><center>$r[pala_byk_air]</center></td>
  <td ><center>$r[pala_sdkt_air]</center></td>
  <td ><center>$r[bero]</center></td>
  <td ><center>$r[fak_tersier]</center></td>
  <td ><center>$r[keb_tersier]</center></td>
  <td ><center>$r[keb_lain2]</center></td>
  <td ><center>$r[q_hilang]</center></td>
  <td ><center>$r[q_suplesi]</center></td>
  <td ><center>$r[q_bang_bagi]</center></td>
  <td ><center>$r[q_diberikan]</center></td>
  </tr>";
  
      $no++;
      }
echo "</tbody></table></div> ";
     
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM distribusi"));
       
      break;    
      }
      else{
echo " <table id='table-example' class='table'>	  
	  
       
    <thead><tr>
    <th>No</th>
    <th>Bendung</th>
    <th>Kode</th>
    <th>distribusi</th>
    <th>Tanggal</th>
    <th>Jam</th>
    <th>Status</th>
    <th>Petugas</th>
    <th>Aksi</th>
    </thead>
    <tbody>";

      $tampil = mysql_query("SELECT * FROM distribusi WHERE distribusi LIKE '%$_GET[kata]%' ORDER BY id_distribusi DESC");
      
      $no = $posisi+1;
      while($r=mysql_fetch_array($tampil)){
echo "<tr class=gradeX> 
  <td width=10><center>$g</center></td>
  <td>$r[bendung]</td>
  <td><center>$r[kode]</center></td>
  <td style='text-align:right;'>$r[distribusi]</td>
  <td>$r[tgl]</td>
  <td>$r[jam]</td>
  <td style='text-align:center;'>$r[status]</td>
  <td>$r[petugas]</td>
  <td width=70><center>
  <a href=?module=distribusi&act=editdistribusi&id=$r[id_distribusi] rel=tooltip-top title='Edit' class='with-tip'>
  <img src='img/edit.png'></a>&nbsp;&nbsp;
   
  <a href=javascript:confirmdelete('$aksi?module=distribusi&act=hapus&id=$r[id_distribusi]') rel=tooltip-top title='Hapus' class='with-tip'>
  &nbsp;&nbsp;<img src='img/hapus.png'></a> </center>
   
  </td></tr>";
      $no++;
     }
echo "</tbody></table> ";

      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM distribusi WHERE distribusi LIKE '%$_GET[kata]%'"));
       }
	  
 break;    
    
  
  // Form Edit distribusi  
  case "editdistribusi":
  $edit=mysql_query("SELECT * FROM distribusi WHERE id_distribusi='$_GET[id]'");
  $r=mysql_fetch_array($edit);

  
  echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>EDIT distribusi</h1>
   </div>
   <div class='block-content'>	
	
   <form method=POST action=$aksi?module=distribusi&act=update>
   <input type=hidden name=id value='$r[id_distribusi]'>
		  
   <p class=inline-small-label> 
   <label for=field4>Bendung</label>
   <input type=text name='bendung' value='$r[bendung]' size=40 readonly>
   </p>
   
   <p class=inline-small-label> 
   <label for=field4>distribusi</label>
   <input type=text name='distribusi' value='$r[distribusi]' size=5> m
   </p>";
   
   echo " <br/><br/><div class=block-actions> 
      <ul class=actions-right> 
      <li>
      <a class='button red' id=reset-validate-form href='?module=distribusi'>Batal</a>
      </li> </ul>
      <ul class=actions-left> 
      <li>
      <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
	  </li> </ul>
	  </form>";	  
 break; 
 
 // Form Tambah bendung
  case "import":
  
  echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>Export/Import Data distribusi</h1>
   </div>
   <div class='block-content'>
    
    <br><br><form name='myForm' id='myForm' onSubmit='return validateForm()' action='$aksi?module=bendung&act=import' method='post' enctype='multipart/form-data'>
    <input type='file' id='file' name='file' /><br><br>
    <label><input type='checkbox' name='drop' value='1' /> <u>Kosongkan tabel sql terlebih dahulu.</u> </label>
    <br><br><input type='submit' name='submit' class='button' value='Import' /><br><br>
    </form><br><br>";
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
