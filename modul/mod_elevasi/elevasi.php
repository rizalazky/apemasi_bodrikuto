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

$aksi="modul/mod_elevasi/aksi_elevasi.php";
switch($_GET[act]){
//update/////////////////////////////////////

  // Tampil kelas
    default:
echo "<div id=main-content> 
      <div class=container_12> 
      <div class=grid_12> 
      <br/>
	  <a href='?module=elevasi&act=import' class='button'>
     <span>Import Elevasi</span>
     </a>
     </div>";

    if (empty($_GET['kata'])){
echo "<div class=grid_12> 
      <div class=block-border> 
      <div class=block-header> 
      <h1>DAFTAR ELEVASI  </h1>
      <span></span> 
      </div> 
       <div class='block-content'>
		  
     <table id='table-example' class='table'>	  
  	  
    <thead><tr>
    <th>No</th>
    <th>Bendung</th>
    <th>Elevasi</th>
    <th>Debit</th>
    <th>Tanggal</th>
    <th>Jam</th>
    <th>Status</th>
    <th>Petugas</th>
    <th>Aksi</th>
  
    </thead>
    <tbody>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    $tampil = mysql_query("SELECT * FROM elevasi ORDER BY id_elevasi DESC");
    
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
  <td>$r[bendung]</td>
  <td style='text-align:right;'>$r[elevasi]</td>
  <td><center>$r[debit]</center></td>
  <td>$r[tgl]</td>
  <td>$r[jam]</td>
  <td style='text-align:center;'>$r[status]</td>
  <td>$r[petugas]</td>
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
      }
      else{
echo " <table id='table-example' class='table'>	  
	  
       
    <thead><tr>
    <th>No</th>
    <th>Bendung</th>
    <th>Kode</th>
    <th>Elevasi</th>
    <th>Tanggal</th>
    <th>Jam</th>
    <th>Status</th>
    <th>Petugas</th>
    <th>Aksi</th>
    </thead>
    <tbody>";

      $tampil = mysql_query("SELECT * FROM elevasi WHERE elevasi LIKE '%$_GET[kata]%' ORDER BY id_elevasi DESC");
      
      $no = $posisi+1;
      while($r=mysql_fetch_array($tampil)){
echo "<tr class=gradeX> 
  <td width=10><center>$g</center></td>
  <td>$r[bendung]</td>
  <td><center>$r[kode]</center></td>
  <td style='text-align:right;'>$r[elevasi]</td>
  <td>$r[tgl]</td>
  <td>$r[jam]</td>
  <td style='text-align:center;'>$r[status]</td>
  <td>$r[petugas]</td>
  <td width=70><center>
  <a href=?module=elevasi&act=editelevasi&id=$r[id_elevasi] rel=tooltip-top title='Edit' class='with-tip'>
  <img src='img/edit.png'></a>&nbsp;&nbsp;
   
  <a href=javascript:confirmdelete('$aksi?module=elevasi&act=hapus&id=$r[id_elevasi]') rel=tooltip-top title='Hapus' class='with-tip'>
  &nbsp;&nbsp;<img src='img/hapus.png'></a> </center>
   
  </td></tr>";
      $no++;
     }
echo "</tbody></table> ";

      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM elevasi WHERE elevasi LIKE '%$_GET[kata]%'"));
       }
	  
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
 
 // Form Tambah bendung
  case "import":
  
  echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>Export/Import Data Elevasi</h1>
   </div>
   <div class='block-content'>
    
    <br><br><form name='myForm' id='myForm' onSubmit='return validateForm()' action='$aksi?module=elevasi&act=import' method='post' enctype='multipart/form-data'>
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
