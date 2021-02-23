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

$aksi="modul/mod_bendung/aksi_bendung.php";
switch($_GET[act]){
//update/////////////////////////////////////

  // Tampil kelas
    default:
echo "<div id=main-content> 
      <div class=container_12> 
      <div class=grid_12> 
      <br/>
	  <a href='?module=bendung&act=tambahbendung' class='button'>
     <span>Tambah Bendung</span>
     </a></div>";

    if (empty($_GET['kata'])){
echo "<div class=grid_12> 
      <div class=block-border> 
      <div class=block-header> 
      <h1>DAFTAR BENDUNG </h1>
      <span></span> 
      </div> 
       <div class='block-content'>
		  
     <table id='table-example' class='table'>	  
  	  
    <thead><tr>
    <th>No</th>
    <th>Nama Bendung</th>
    <th>Kode</th>
    <th>Waspada</th>
    <th>Siaga</th>
    <th>Awas</th>
    <th>Aksi</th>
  
    </thead>
    <tbody>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM bendung ORDER BY id_bendung ASC");
    }
    else{
      $tampil=mysql_query("SELECT * FROM bendung 
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id_bendung ASC");
    }
  
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
  <td><center>$r[kode]</center></td>
  <td><center>$r[waspada]</center></td>
  <td><center>$r[siaga]</center></td>
  <td><center>$r[awas]</center></td>
  <td width=80><center>
  <a href=?module=bendung&act=editbendung&id=$r[id_bendung] rel=tooltip-top title='Edit' class='with-tip'>
  <img src='img/edit.png'></a>&nbsp;&nbsp;
   
  <a href=javascript:confirmdelete('$aksi?module=bendung&act=hapus&id=$r[id_bendung]') rel=tooltip-top title='Hapus' class='with-tip'>
  &nbsp;&nbsp;<img src='img/hapus.png'></a> </center>
   
  </td></tr>";
  
      $no++;
      }
echo "</tbody></table> ";

      if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM bendung"));
      }
        else{
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM bendung WHERE username='$_SESSION[namauser]'"));
      }  
      break;    
      }
      else{
echo " <table id='table-example' class='table'>	  
	  
     <thead><tr>
    <th>No</th>
    <th>Nama Bendung</th>
    <th>Kode</th>
    <th>Waspada</th>
    <th>Siaga</th>
    <th>Awas</th>
    
    </thead>
    <tbody>";

      if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM bendung WHERE bendung LIKE '%$_GET[kata]%' ORDER BY id_bendung DESC");
      }
      else{
      $tampil=mysql_query("SELECT * FROM bendung 
                           WHERE username='$_SESSION[namauser]'
                           AND bendung LIKE '%$_GET[kata]%'       
                           ORDER BY id_bendung DESC");
      }
  
      $no = $posisi+1;
      while($r=mysql_fetch_array($tampil)){
echo "<tr class=gradeX> 
  <td width=10><center>$g</center></td>
  <td>$r[bendung]</td>
  <td><center>$r[kode]</center></td>
  <td><center>$r[waspada]</center></td>
  <td><center>$r[siaga]</center></td>
  <td><center>$r[awas]</center></td>
  </td></tr>";
			 
  
      $no++;
     }
echo "</tbody></table> ";

      if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM bendung WHERE bendung LIKE '%$_GET[kata]%'"));
      }
      else{
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM bendung WHERE username='$_SESSION[namauser]' AND bendung LIKE '%$_GET[kata]%'"));
      }  
      break;    
      }
	  
//batas update/////////////////////////////////////////////////////////////////////////
  
  // Form Tambah bendung
  case "tambahbendung":
  
  echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>TAMBAH BENDUNG</h1>
   </div>
   <div class='block-content'>	
   
   <form method=POST action='$aksi?module=bendung&act=input'>
		  
   <p class=inline-small-label> 
   <label for=field4>Nama Bendung</label>
   <input type=text name='bendung' size=40>
   </p> 
   
   <p class=inline-small-label> 
   <label for=field4>Kode Bendung</label>
   <input type=text name='kode' size=5>
   </p> 
  
   <p class=inline-small-label> 
   <label for=field4>Batas Waspada</label>
   <input type=text name='waspada' size=5> m
   </p> 
   
   <p class=inline-small-label> 
   <label for=field4>Batas Siaga</label>
   <input type=text name='siaga' size=5> m
   </p> 
   
   <p class=inline-small-label> 
   <label for=field4>Batas Awas</label>
   <input type=text name='awas' size=5> m
   </p> 
   
   <p class=inline-small-label> 
   <label for=field4>Rumus A</label>
   <input type=text name='a' size=5> Debit = a x b x c ^ elevasi 
   </p> 
   
   <p class=inline-small-label> 
   <label for=field4>Rumus B</label>
   <input type=text name='b' size=5> 
   </p> 
   
   <p class=inline-small-label> 
   <label for=field4>Rumus C</label>
   <input type=text name='c' size=5> 
   </p> 	  	  
      <div class=block-actions> 
      <ul class=actions-right> 
      <li>
      <a class='button red' id=reset-validate-form href='?module=bendung'>Batal</a>
      </li> </ul>
      <ul class=actions-left> 
      <li>
      <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
	  </li> </ul>
	  </form>";
	  
     break;
  
  // Form Edit bendung  
  case "editbendung":
  $edit=mysql_query("SELECT * FROM bendung WHERE id_bendung='$_GET[id]'");
  $r=mysql_fetch_array($edit);

  
  echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>EDIT BENDUNG</h1>
   </div>
   <div class='block-content'>	
	
   <form method=POST action=$aksi?module=bendung&act=update>
   <input type=hidden name=id value='$r[id_bendung]'>
		  
   <p class=inline-small-label> 
   <label for=field4>Nama bendung</label>
   <input type=text name='bendung' value='$r[bendung]' size=40>
   </p>
   
   <p class=inline-small-label> 
   <label for=field4>Kode Bendung</label>
   <input type=text name='kode' value='$r[kode]' size=5>
   </p> 
  
   <p class=inline-small-label> 
   <label for=field4>Batas Waspada</label>
   <input type=text name='waspada' value='$r[waspada]' size=5> m
   </p> 
   
   <p class=inline-small-label> 
   <label for=field4>Batas Siaga</label>
   <input type=text name='siaga' value='$r[siaga]' size=5> m
   </p> 
   
   <p class=inline-small-label> 
   <label for=field4>Batas Awas</label>
   <input type=text name='awas' value='$r[awas]' size=5> m
   </p> 
   
   <p class=inline-small-label> 
   <label for=field4>Rumus a</label>
   <input type=text name='a' value='$r[a]' size=5> 
   </p> 
   <p class=inline-small-label> 
   <label for=field4>Rumus b</label>
   <input type=text name='b' value='$r[b]' size=5> 
   </p> 
   <p class=inline-small-label> 
   <label for=field4>Rumus c</label>
   <input type=text name='c' value='$r[c]' size=5> 
   </p> 
   
    <br/><br/><div class=block-actions> 
      <ul class=actions-right> 
      <li>
      <a class='button red' id=reset-validate-form href='?module=bendung'>Batal</a>
      </li> </ul>
      <ul class=actions-left> 
      <li>
      <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
	  </li> </ul>
	  </form>";
   break;
   
// import data
  case "import":
  
  echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>Export/Import Data</h1>
   </div>
   <div class='block-content'>
    
    <br><br><form name='myForm' id='myForm' onSubmit='return validateForm()' action='$aksi?module=bendung&act=import' method='post' enctype='multipart/form-data'>
    <input type='file' id='file' name='file' /><br><br>
    <label><input type='checkbox' name='drop' value='1' /> <u>Kosongkan tabel sql terlebih dahulu.</u> </label>
    <br><br><input type='submit' name='submit' class='button' value='Import' /><br><br>
    </form><br><br>";
     break;
     
 // upload data
  case "upload":
  
  echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>Upload Data</h1>
   </div>
   <div class='block-content'>
    <br><br><div class='title'>Upload Perhitungan Alokasi Air</div>
    <form name='myForm' id='myForm' onSubmit='return validateForm()' action='$aksi?module=bendung&act=uploadalokasi' method='post' enctype='multipart/form-data'>
    <input type='file' id='file' name='fupload' /><br><br>
    <input type='submit' name='submit' class='button' value='Upload' /><br><br>
    </form><br><hr>
    
    <br><br><div class='title'>Upload Faktor K</div>
    <form name='myForm' id='myForm' onSubmit='return validateForm()' action='$aksi?module=bendung&act=uploadk' method='post' enctype='multipart/form-data'>
    <input type='file' id='file' name='fupload' /><br><br>
    <input type='submit' name='submit' class='button' value='Upload' /><br><br>
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

<script type="text/javascript">
//    validasi form (hanya file .xls yang diijinkan)
    function validateForm()
    {
        function hasExtension(inputID, exts) {
            var fileName = document.getElementById(inputID).value;
            return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
        }
 
        if(!hasExtension('filepegawaiall', ['.xls'])){
            alert("Hanya file XLS (Excel 2003) yang diijinkan.");
            return false;
        }
    }
</script>
