<!DOCTYPE html>
<html lang="id"><head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title></title>
	<!-- base href="http://alokasiair.esy.es/" -->
			<meta name="viewport" content="width=992">
		<meta name="description" content="">
	<meta name="keywords" content="">
	<!-- Facebook Open Graph -->
	<!--<meta name="og:title" content="">
	<meta name="og:description" content="">
	<meta name="og:image" content="">
	<meta name="og:type" content="article">
	<meta name="og:url" content="http://alokasiair.esy.es/"> -->
	<!-- Facebook Open Graph end -->
		
	<link href="index_files/bootstrap.css" rel="stylesheet" type="text/css">
	<script src="index_files/jquery-1.js" type="text/javascript"></script>
	<script src="index_files/bootstrap.js" type="text/javascript"></script>
	<script src="index_files/main.js" type="text/javascript"></script>
	<script src="index_files/skema.css" type="text/javascript"></script>
	
	<link href="index_files/site.css" rel="stylesheet" type="text/css">
	<link href="index_files/common.css" rel="stylesheet" type="text/css">
	<link href="style.css" rel="stylesheet" type="text/css">
	<link href="bagan.css" rel="stylesheet" type="text/css">
	<!--<link herf="index_files/skema.css" rel="stylesheet" type="text/css-->
	
	<script type="text/javascript">var currLang = '';</script>		
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>


<body><div class="root"><div class="vbox wb_container" id="wb_header">
<?php
include "../../config/koneksi.php";
include "../../config/fungsi_indotgl.php";
$dt     = mysql_fetch_array(mysql_query("SELECT id,periode,bulan,tahun FROM `alokasi` ORDER BY id DESC"));
$period   = $dt['periode'];
$blan     = $dt['bulan'];
$thn      = $dt['tahun'];
$bulan    = getBulan($blan);
$jmlhari  = jumlahhari($blan,$thn);
    if($period=='I'){$per="1-15";}
    else {$per="16-".$jmlhari;}
$periode  = $per." ".$bulan." ".$thn;
$dta      = mysql_fetch_array(mysql_query("SELECT id,file FROM `upload` WHERE jenisdata='faktork' ORDER BY id DESC"));
$nama_file_k  =$dta['file'];
$dtb          = mysql_fetch_array(mysql_query("SELECT id,file FROM `upload` WHERE jenisdata='alokasi' ORDER BY id DESC"));
$nama_file_a  =$dtb['file'];
$qperlu = mysql_fetch_array(mysql_query("SELECT id,q_diberikan FROM `alokasi` WHERE di='SCN' ORDER BY id DESC"));
$debit = mysql_fetch_array(mysql_query("SELECT debit FROM `elevasi` WHERE kode='SCN' ORDER BY id_elevasi DESC"));
$bbg  = $debit['debit']/$qperlu['q_diberikan'];
  if($bbg>=1){$faktork="1";}
  else {$faktork=$bbg;}
$sal1 = mysql_fetch_array(mysql_query("SELECT id,q_diberikan FROM `alokasi` WHERE di='SCN' AND id='1' ORDER BY id DESC"));
$sal2 = mysql_fetch_array(mysql_query("SELECT id,q_diberikan FROM `alokasi` WHERE di='SCN' AND id='2' ORDER BY id DESC"));
$sal3 = mysql_fetch_array(mysql_query("SELECT id,q_diberikan FROM `alokasi` WHERE di='SCN' AND id='3' ORDER BY id DESC"));

?>	

<div id="wb_element_instance0" class="wb_element wb_element_picture"><img alt="gallery/full-black-hd-wallpaper-20" src="index_files/5a2731650b992ee49912e76a633e7fd1_1370x1370.jpg"></div><div id="wb_element_instance1" class="wb_element wb_element_picture"><img alt="gallery/ad020141fc2f005dddc1f68896ad312e_124x71" src="index_files/8ec1ae9f5b277c73ac66c43d441eae60_124x71.png"></div><div id="wb_element_instance2" class="wb_element" style=" line-height: normal;"><h1 class="wb-stl-heading1"><strong><span style="color:#ffffff;">APEMASI</span></strong></h1>
</div><div id="wb_element_instance3" class="wb_element" style=" line-height: normal;"><h3 class="wb-stl-heading3"><b><span style="color:#ffffff;">APLIKASI PEMBAGIAN AIR IRIGASI</span></b></h3>
</div><div id="wb_element_instance4" class="wb_element"><a class="wb_button" href="http://apemasibodrikuto.com"><span>Kembali ke Web</span></a></div><div id="wb_element_instance5" class="wb_element"><a class="wb_button" href="../"><span>kembali ke Portal</span></a></div><div id="wb_element_instance6" class="wb_element"><a class="wb_button" href="http://apemasibodrikuto.com/apemasi/"><span>Login Petugas</span></a></div><div id="wb_element_instance7" class="wb_element" style=" line-height: normal;"><h3 class="wb-stl-heading3"><b><span style="color:#ffffff;">BALAI PSDA &nbsp;BODRI KUTO</span></b></h3>
</div></div>

<div class="vbox wb_container" id="wb_main">
	<div id="wb_element_instance8" class="wb_element wb_element_shape">
		<div class="wb_shp"></div>
	</div>
	<div id="wb_element_instance9" class="wb_element" style=" line-height: normal;">
		<h3 class="wb-stl-heading3" style="text-align: center;">
			<strong>SKEMA DISTRIBUSI AIR DAERAH IRIGASI SUCEN</strong>
		</h3>
</div>

<div id="wb_element_instance10" class="wb_element" style=" line-height: normal;"><p class="wb-stl-normal"><strong>Sungai&nbsp;</strong></p></div>
<div id="wb_element_instance11" class="wb_element" style=" line-height: normal;"><p class="wb-stl-normal"><strong>Areal</strong></p></div>
<div id="wb_element_instance12" class="wb_element" style=" line-height: normal;"><p class="wb-stl-normal"><strong>:&nbsp; Sungai Sucen</strong></p></div>
<div id="wb_element_instance13" class="wb_element" style=" line-height: normal;"><p class="wb-stl-normal"><strong>:&nbsp; 596 Ha</strong></p></div>
<div id="wb_element_instance14" class="wb_element" style=" line-height: normal;"><p class="wb-stl-normal"><strong>Lokasi&nbsp;</strong></p></div>
<div id="wb_element_instance15" class="wb_element" style=" line-height: normal;"><p class="wb-stl-normal"><strong>:&nbsp; Salatiga, Kab. Semarang</strong></p></div>
<div id="wb_element_instance16" class="wb_element" style=" line-height: normal;"><p class="wb-stl-normal"><strong>Periode</strong></p></div>
<div id="wb_element_instance17" class="wb_element" style=" line-height: normal;"><p class="wb-stl-normal"><strong>:&nbsp; <?php echo $periode;?></strong></p></div>
<div id="wb_element_instance18" class="wb_element" style=" line-height: normal;"><p class="wb-stl-normal" style="text-align: center;"><strong>Debit Tersedia</strong></p></div>
<div id="wb_element_instance19" class="wb_element wb_element_shape"><div class="wb_shp"></div></div><div id="wb_element_instance20" class="wb_element wb_element_shape"><div class="wb_shp"></div></div><div id="wb_element_instance21" class="wb_element wb_element_shape"><div class="wb_shp"></div></div><div id="wb_element_instance22" class="wb_element" style=" line-height: normal;"><p class="wb-stl-normal" style="text-align: center;"><strong>Debit Diperlukan</strong></p></div>
<div id="wb_element_instance23" class="wb_element" style=" line-height: normal;"><p class="wb-stl-normal" style="text-align: center;"><strong>Faktor K</strong></p>

<p class="wb-stl-normal" style="text-align: center;"><strong>ditetapkan</strong></p>
</div><div id="wb_element_instance24" class="wb_element" style=" line-height: normal;"><h4 class="wb-stl-pagetitle" style="text-align: right;"><?php echo $debit['debit'];?></h4>
</div><div id="wb_element_instance25" class="wb_element" style=" line-height: normal;"><p class="wb-stl-normal"><strong>m3/dtk</strong></p>
</div><div id="wb_element_instance26" class="wb_element" style=" line-height: normal;"><h4 class="wb-stl-pagetitle" style="text-align: right;"><?php echo $qperlu['q_diberikan'];?></h4>
</div><div id="wb_element_instance27" class="wb_element" style=" line-height: normal;"><p class="wb-stl-normal"><strong>m3/dtk</strong></p>
</div><div id="wb_element_instance28" class="wb_element" style=" line-height: normal;"><h1 class="wb-stl-heading1" style="text-align: center;"><strong><?php echo $faktork;?></strong></h1>

</div>
<div id="wb_download1" class="wb_element"><a class="wb_button" href="../distribusiair/sucen/upload/faktorkscn.pdf<?php echo $nama_file_a; ?>"><span>Download Perhitungan Distribusi Air</span></a></div><div id="wb_download2" class="wb_element"><a class="wb_button" href="../../uplod/perhitunganscn.pdf<?php echo $nama_file_k;?>"><span>Download Perhitungan Faktor K</span></a></div>
<div id="wb_element_instance31" class="wb_element wb_element_picture"><img alt="gallery/bgsa" src="index_files/sucen2.jpg"></div>
	



	<!-- awal source code skema irigasi -->	
<div id="wb_Image1" style="position: absolute; left: 736px; top: 247px; width: 66px; height: 154px; z-index: 0;">
<img src="images/1ab0579d3cd2254ae1ece552ffceecb3_67x128.png" id="Image1" alt=""></div>
<div id="wb_Line1" style="position:absolute;left:797px;top:286px;width:2px;height:1563px;z-index:1;">
<img src="images/img0001.png" id="Line1" alt=""></div>
<div id="wb_Line2" style="position:absolute;left:556px;top:409px;width:241px;height:2px;z-index:2;">
<img src="images/img0002.png" id="Line2" alt=""></div>
<div id="wb_Line3" style="position:absolute;left:556px;top:410px;width:2px;height:1387px;z-index:3;">
<img src="images/img0003.png" id="Line3" alt=""></div>
<div id="wb_Shape1" style="position:absolute;left:789px;top:340px;width:24px;height:21px;z-index:4;">
<img src="images/img0004.png" id="Shape1" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape2" style="position:absolute;left:789px;top:429px;width:24px;height:21px;z-index:5;">
<img src="images/img0005.png" id="Shape2" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape3" style="position:absolute;left:790px;top:500px;width:24px;height:21px;z-index:6;">
<img src="images/img0006.png" id="Shape3" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape4" style="position:absolute;left:789px;top:576px;width:24px;height:21px;z-index:7;">
<img src="images/img0007.png" id="Shape4" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape5" style="position:absolute;left:789px;top:649px;width:24px;height:21px;z-index:8;">
<img src="images/img0008.png" id="Shape5" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape6" style="position:absolute;left:789px;top:726px;width:24px;height:21px;z-index:9;">
<img src="images/img0009.png" id="Shape6" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape7" style="position:absolute;left:789px;top:795px;width:24px;height:21px;z-index:10;">
<img src="images/img0010.png" id="Shape7" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape8" style="position:absolute;left:789px;top:857px;width:24px;height:21px;z-index:11;">
<img src="images/img0011.png" id="Shape8" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape9" style="position:absolute;left:790px;top:917px;width:24px;height:21px;z-index:12;">
<img src="images/img0012.png" id="Shape9" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape10" style="position:absolute;left:789px;top:990px;width:24px;height:21px;z-index:13;">
<img src="images/img0013.png" id="Shape10" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape11" style="position:absolute;left:789px;top:1047px;width:24px;height:21px;z-index:14;">
<img src="images/img0014.png" id="Shape11" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape12" style="position:absolute;left:789px;top:1112px;width:24px;height:21px;z-index:15;">
<img src="images/img0015.png" id="Shape12" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape13" style="position:absolute;left:789px;top:1178px;width:24px;height:21px;z-index:16;">
<img src="images/img0016.png" id="Shape13" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape14" style="position:absolute;left:789px;top:1241px;width:24px;height:21px;z-index:17;">
<img src="images/img0017.png" id="Shape14" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape15" style="position:absolute;left:789px;top:1303px;width:24px;height:21px;z-index:18;">
<img src="images/img0018.png" id="Shape15" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape16" style="position:absolute;left:790px;top:1363px;width:24px;height:21px;z-index:19;">
<img src="images/img0019.png" id="Shape16" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape17" style="position:absolute;left:790px;top:1425px;width:24px;height:21px;z-index:20;">
<img src="images/img0020.png" id="Shape17" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape18" style="position:absolute;left:791px;top:1487px;width:24px;height:21px;z-index:21;">
<img src="images/img0021.png" id="Shape18" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape19" style="position:absolute;left:790px;top:1548px;width:24px;height:21px;z-index:22;">
<img src="images/img0022.png" id="Shape19" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape20" style="position:absolute;left:790px;top:1609px;width:24px;height:21px;z-index:23;">
<img src="images/img0023.png" id="Shape20" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape21" style="position:absolute;left:791px;top:1671px;width:24px;height:21px;z-index:24;">
<img src="images/img0024.png" id="Shape21" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape22" style="position:absolute;left:791px;top:1736px;width:24px;height:21px;z-index:25;">
<img src="images/img0025.png" id="Shape22" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape23" style="position:absolute;left:791px;top:1793px;width:24px;height:21px;z-index:26;">
<img src="images/img0026.png" id="Shape23" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape24" style="position:absolute;left:792px;top:1843px;width:23px;height:21px;z-index:27;">
<img src="images/img0027.png" id="Shape24" alt="" style="width:23px;height:21px;"></div>
<div id="wb_Shape25" style="position:absolute;left:669px;top:404px;width:24px;height:21px;z-index:28;">
<img src="images/img0028.png" id="Shape25" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape26" style="position:absolute;left:549px;top:429px;width:24px;height:21px;z-index:29;">
<img src="images/img0029.png" id="Shape26" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape27" style="position:absolute;left:549px;top:496px;width:24px;height:21px;z-index:30;">
<img src="images/img0030.png" id="Shape27" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape28" style="position:absolute;left:548px;top:565px;width:24px;height:21px;z-index:31;">
<img src="images/img0031.png" id="Shape28" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape29" style="position:absolute;left:547px;top:649px;width:24px;height:21px;z-index:32;">
<img src="images/img0032.png" id="Shape29" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape30" style="position:absolute;left:547px;top:726px;width:24px;height:21px;z-index:33;">
<img src="images/img0033.png" id="Shape30" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape31" style="position:absolute;left:550px;top:795px;width:24px;height:21px;z-index:34;">
<img src="images/img0034.png" id="Shape31" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape32" style="position:absolute;left:549px;top:857px;width:24px;height:21px;z-index:35;">
<img src="images/img0035.png" id="Shape32" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape33" style="position:absolute;left:550px;top:917px;width:24px;height:21px;z-index:36;">
<img src="images/img0036.png" id="Shape33" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape34" style="position:absolute;left:547px;top:990px;width:24px;height:21px;z-index:37;">
<img src="images/img0037.png" id="Shape34" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape35" style="position:absolute;left:549px;top:1047px;width:24px;height:21px;z-index:38;">
<img src="images/img0038.png" id="Shape35" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape36" style="position:absolute;left:550px;top:1112px;width:24px;height:21px;z-index:39;">
<img src="images/img0039.png" id="Shape36" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Line4" style="position:absolute;left:306px;top:1181px;width:249px;height:2px;z-index:40;">
<img src="images/img0040.png" id="Line4" alt=""></div>
<div id="wb_Shape37" style="position:absolute;left:550px;top:1178px;width:24px;height:21px;z-index:41;">
<img src="images/img0041.png" id="Shape37" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Line5" style="position:absolute;left:306px;top:1181px;width:2px;height:497px;z-index:42;">
<img src="images/img0042.png" id="Line5" alt=""></div>
<div id="wb_Shape38" style="position:absolute;left:549px;top:1241px;width:24px;height:21px;z-index:43;">
<img src="images/img0043.png" id="Shape38" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape39" style="position:absolute;left:548px;top:1303px;width:24px;height:21px;z-index:44;">
<img src="images/img0044.png" id="Shape39" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape40" style="position:absolute;left:547px;top:1363px;width:24px;height:21px;z-index:45;">
<img src="images/img0045.png" id="Shape40" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape41" style="position:absolute;left:547px;top:1425px;width:24px;height:21px;z-index:46;">
<img src="images/img0046.png" id="Shape41" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape42" style="position:absolute;left:547px;top:1487px;width:24px;height:21px;z-index:47;">
<img src="images/img0047.png" id="Shape42" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape43" style="position:absolute;left:547px;top:1548px;width:24px;height:21px;z-index:48;">
<img src="images/img0048.png" id="Shape43" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape44" style="position:absolute;left:548px;top:1609px;width:24px;height:21px;z-index:49;">
<img src="images/img0049.png" id="Shape44" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape45" style="position:absolute;left:550px;top:1671px;width:24px;height:21px;z-index:50;">
<img src="images/img0050.png" id="Shape45" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape46" style="position:absolute;left:550px;top:1736px;width:24px;height:21px;z-index:51;">
<img src="images/img0051.png" id="Shape46" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape47" style="position:absolute;left:550px;top:1793px;width:24px;height:21px;z-index:52;">
<img src="images/img0052.png" id="Shape47" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape48" style="position:absolute;left:423px;top:1178px;width:24px;height:21px;z-index:53;">
<img src="images/img0053.png" id="Shape48" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape49" style="position:absolute;left:301px;top:1241px;width:24px;height:21px;z-index:54;">
<img src="images/img0054.png" id="Shape49" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape50" style="position:absolute;left:301px;top:1303px;width:24px;height:21px;z-index:55;">
<img src="images/img0055.png" id="Shape50" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape51" style="position:absolute;left:301px;top:1363px;width:24px;height:21px;z-index:56;">
<img src="images/img0056.png" id="Shape51" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape52" style="position:absolute;left:301px;top:1425px;width:24px;height:21px;z-index:57;">
<img src="images/img0057.png" id="Shape52" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape53" style="position:absolute;left:301px;top:1487px;width:24px;height:21px;z-index:58;">
<img src="images/img0058.png" id="Shape53" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape54" style="position:absolute;left:301px;top:1548px;width:24px;height:21px;z-index:59;">
<img src="images/img0059.png" id="Shape54" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape55" style="position:absolute;left:301px;top:1609px;width:24px;height:21px;z-index:60;">
<img src="images/img0060.png" id="Shape55" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape56" style="position:absolute;left:301px;top:1671px;width:24px;height:21px;z-index:61;">
<img src="images/img0061.png" id="Shape56" alt="" style="width:24px;height:21px;"></div>
<div id="wb_Shape57" style="position:absolute;left:825px;top:319px;width:109px;height:65px;z-index:62;">
<img src="images/img0063.png" id="Shape57" alt="" style="width:109px;height:65px;"></div>
<div id="wb_Shape58" style="position:absolute;left:825px;top:408px;width:109px;height:65px;z-index:63;">
<img src="images/img0064.png" id="Shape58" alt="" style="width:109px;height:65px;"></div>
<div id="wb_Shape59" style="position:absolute;left:825px;top:475px;width:109px;height:65px;z-index:64;">
<img src="images/img0065.png" id="Shape59" alt="" style="width:109px;height:65px;"></div>
<div id="wb_Shape60" style="position:absolute;left:825px;top:555px;width:109px;height:65px;z-index:65;">
<img src="images/img0066.png" id="Shape60" alt="" style="width:109px;height:65px;"></div>
<div id="wb_Shape61" style="position:absolute;left:825px;top:628px;width:109px;height:65px;z-index:66;">
<img src="images/img0067.png" id="Shape61" alt="" style="width:109px;height:65px;"></div>
<div id="wb_Shape62" style="position:absolute;left:825px;top:705px;width:109px;height:65px;z-index:67;">
<img src="images/img0068.png" id="Shape62" alt="" style="width:109px;height:65px;"></div>
<div id="wb_Shape63" style="position:absolute;left:825px;top:770px;width:109px;height:65px;z-index:68;">
<img src="images/img0069.png" id="Shape63" alt="" style="width:109px;height:65px;"></div>
<div id="wb_Shape64" style="position:absolute;left:825px;top:835px;width:109px;height:65px;z-index:69;">
<img src="images/img0070.png" id="Shape64" alt="" style="width:109px;height:65px;"></div>
<div id="wb_Shape65" style="position:absolute;left:825px;top:900px;width:109px;height:65px;z-index:70;">
<img src="images/img0071.png" id="Shape65" alt="" style="width:109px;height:65px;"></div>
<div id="wb_Shape66" style="position:absolute;left:825px;top:965px;width:109px;height:61px;z-index:71;">
<img src="images/img0072.png" id="Shape66" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape67" style="position:absolute;left:825px;top:1027px;width:109px;height:61px;z-index:72;">
<img src="images/img0073.png" id="Shape67" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape68" style="position:absolute;left:825px;top:1093px;width:109px;height:61px;z-index:73;">
<img src="images/img0074.png" id="Shape68" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape69" style="position:absolute;left:825px;top:1159px;width:109px;height:61px;z-index:74;">
<img src="images/img0075.png" id="Shape69" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape70" style="position:absolute;left:825px;top:1219px;width:109px;height:65px;z-index:75;">
<img src="images/img0076.png" id="Shape70" alt="" style="width:109px;height:65px;"></div>
<div id="wb_Shape71" style="position:absolute;left:825px;top:1281px;width:109px;height:65px;z-index:76;">
<img src="images/img0077.png" id="Shape71" alt="" style="width:109px;height:65px;"></div>
<div id="wb_Shape72" style="position:absolute;left:825px;top:1343px;width:109px;height:61px;z-index:77;">
<img src="images/img0078.png" id="Shape72" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape73" style="position:absolute;left:825px;top:1404px;width:109px;height:61px;z-index:78;">
<img src="images/img0079.png" id="Shape73" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape74" style="position:absolute;left:825px;top:1465px;width:109px;height:65px;z-index:79;">
<img src="images/img0080.png" id="Shape74" alt="" style="width:109px;height:65px;"></div>
<div id="wb_Shape75" style="position:absolute;left:825px;top:1528px;width:109px;height:61px;z-index:80;">
<img src="images/img0081.png" id="Shape75" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape76" style="position:absolute;left:825px;top:1589px;width:109px;height:61px;z-index:81;">
<img src="images/img0082.png" id="Shape76" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape77" style="position:absolute;left:825px;top:1651px;width:109px;height:61px;z-index:82;">
<img src="images/img0083.png" id="Shape77" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape78" style="position:absolute;left:825px;top:1716px;width:109px;height:61px;z-index:83;">
<img src="images/img0084.png" id="Shape78" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape79" style="position:absolute;left:825px;top:1777px;width:109px;height:61px;z-index:84;">
<img src="images/img0085.png" id="Shape79" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape80" style="position:absolute;left:825px;top:1838px;width:109px;height:61px;z-index:85;">
<img src="images/img0086.png" id="Shape80" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape81" style="position:absolute;left:627px;top:425px;width:109px;height:61px;z-index:86;">
<img src="images/img0087.png" id="Shape81" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape82" style="position:absolute;left:431px;top:409px;width:109px;height:61px;z-index:87;">
<img src="images/img0088.png" id="Shape82" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape83" style="position:absolute;left:431px;top:477px;width:109px;height:61px;z-index:88;">
<img src="images/img0089.png" id="Shape83" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape84" style="position:absolute;left:431px;top:545px;width:109px;height:61px;z-index:89;">
<img src="images/img0090.png" id="Shape84" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape85" style="position:absolute;left:431px;top:620px;width:109px;height:61px;z-index:90;">
<img src="images/img0091.png" id="Shape85" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape86" style="position:absolute;left:431px;top:707px;width:109px;height:61px;z-index:91;">
<img src="images/img0092.png" id="Shape86" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape87" style="position:absolute;left:431px;top:772px;width:109px;height:61px;z-index:92;">
<img src="images/img0093.png" id="Shape87" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape88" style="position:absolute;left:431px;top:837px;width:109px;height:61px;z-index:93;">
<img src="images/img0094.png" id="Shape88" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape89" style="position:absolute;left:431px;top:897px;width:109px;height:61px;z-index:94;">
<img src="images/img0095.png" id="Shape89" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape90" style="position:absolute;left:431px;top:965px;width:109px;height:61px;z-index:95;">
<img src="images/img0096.png" id="Shape90" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape91" style="position:absolute;left:431px;top:1027px;width:109px;height:61px;z-index:96;">
<img src="images/img0097.png" id="Shape91" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape92" style="position:absolute;left:431px;top:1093px;width:109px;height:61px;z-index:97;">
<img src="images/img0098.png" id="Shape92" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape93" style="position:absolute;left:584px;top:1221px;width:109px;height:61px;z-index:98;">
<img src="images/img0099.png" id="Shape93" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape94" style="position:absolute;left:584px;top:1283px;width:109px;height:61px;z-index:99;">
<img src="images/img0100.png" id="Shape94" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape95" style="position:absolute;left:584px;top:1343px;width:109px;height:61px;z-index:100;">
<img src="images/img0101.png" id="Shape95" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape96" style="position:absolute;left:584px;top:1405px;width:109px;height:61px;z-index:101;">
<img src="images/img0102.png" id="Shape96" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape97" style="position:absolute;left:584px;top:1467px;width:109px;height:61px;z-index:102;">
<img src="images/img0103.png" id="Shape97" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape98" style="position:absolute;left:584px;top:1528px;width:109px;height:61px;z-index:103;">
<img src="images/img0104.png" id="Shape98" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape99" style="position:absolute;left:584px;top:1589px;width:106px;height:61px;z-index:104;">
<img src="images/img0105.png" id="Shape99" alt="" style="width:106px;height:61px;"></div>
<div id="wb_Shape100" style="position:absolute;left:583px;top:1651px;width:109px;height:61px;z-index:105;">
<img src="images/img0106.png" id="Shape100" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape101" style="position:absolute;left:583px;top:1716px;width:109px;height:61px;z-index:106;">
<img src="images/img0107.png" id="Shape101" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape102" style="position:absolute;left:583px;top:1777px;width:109px;height:61px;z-index:107;">
<img src="images/img0108.png" id="Shape102" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape103" style="position:absolute;left:381px;top:1201px;width:109px;height:61px;z-index:108;">
<img src="images/img0109.png" id="Shape103" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape104" style="position:absolute;left:185px;top:1221px;width:109px;height:61px;z-index:109;">
<img src="images/img0110.png" id="Shape104" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape105" style="position:absolute;left:185px;top:1283px;width:109px;height:61px;z-index:110;">
<img src="images/img0111.png" id="Shape105" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape106" style="position:absolute;left:185px;top:1343px;width:109px;height:61px;z-index:111;">
<img src="images/img0112.png" id="Shape106" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape107" style="position:absolute;left:185px;top:1403px;width:109px;height:61px;z-index:112;">
<img src="images/img0113.png" id="Shape107" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape108" style="position:absolute;left:185px;top:1467px;width:109px;height:61px;z-index:113;">
<img src="images/img0114.png" id="Shape108" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape109" style="position:absolute;left:185px;top:1528px;width:109px;height:61px;z-index:114;">
<img src="images/img0115.png" id="Shape109" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape110" style="position:absolute;left:185px;top:1590px;width:109px;height:61px;z-index:115;">
<img src="images/img0116.png" id="Shape110" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Shape111" style="position:absolute;left:185px;top:1651px;width:109px;height:61px;z-index:116;">
<img src="images/img0117.png" id="Shape111" alt="" style="width:109px;height:61px;"></div>

<div id="wb_Text1" style="position:absolute;left:841px;top:323px;width:76px;height:13px;text-align:center;z-index:117;">
<span style="color:#000000;font-family:Arial;font-size:12px;">CSc. 1 ka</span></div>
<div id="wb_Text2" style="position:absolute;left:841px;top:413px;width:76px;height:13px;text-align:center;z-index:118;">
<span style="color:#000000;font-family:Arial;font-size:12px;">CSc.Ki. 1 ka</span></div>
<div id="wb_Text3" style="position:absolute;left:843px;top:478px;width:74px;height:15px;text-align:center;z-index:119;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CSc.Ki. 2 ka</span></div>
<div id="wb_Text4" style="position:absolute;left:841px;top:556px;width:79px;height:15px;text-align:center;z-index:120;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CSc.Ki. 3 ka</span></div>
<div id="wb_Text5" style="position:absolute;left:835px;top:630px;width:91px;height:15px;text-align:center;z-index:121;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CSc.Ki. 4 ka</span></div>
<div id="wb_Text6" style="position:absolute;left:835px;top:707px;width:85px;height:15px;text-align:center;z-index:122;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Sc.Ki. 1 ka</span></div>
<div id="wb_Text7" style="position:absolute;left:841px;top:775px;width:79px;height:15px;z-index:123;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CSc.Ki. 5 ka</span></div>
<div id="wb_Text8" style="position:absolute;left:831px;top:838px;width:95px;height:15px;text-align:center;z-index:124;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CSc.Ki. 6 ka</span></div>
<div id="wb_Text9" style="position:absolute;left:837px;top:904px;width:80px;height:15px;text-align:center;z-index:125;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CSc.Ki. 7 ka</span></div>
<div id="wb_Text10" style="position:absolute;left:831px;top:967px;width:89px;height:15px;text-align:center;z-index:126;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CSc.Ki. 8 ka</span></div>
<div id="wb_Text11" style="position:absolute;left:839px;top:1030px;width:77px;height:15px;text-align:center;z-index:127;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Sc.Ki. 2 ka</span></div>
<div id="wb_Text12" style="position:absolute;left:843px;top:1097px;width:71px;height:15px;text-align:center;z-index:128;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Sc.Ki. 3 ka</span></div>
<div id="wb_Text13" style="position:absolute;left:838px;top:1163px;width:78px;height:15px;text-align:center;z-index:129;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Sc.Ki. 4 ka</span></div>
<div id="wb_Text14" style="position:absolute;left:841px;top:1221px;width:76px;height:15px;text-align:center;z-index:130;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CSc.Ki. 9 ka</span></div>
<div id="wb_Text15" style="position:absolute;left:836px;top:1286px;width:85px;height:15px;text-align:center;z-index:131;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CSc.Ki. 10 ka</span></div>
<div id="wb_Text16" style="position:absolute;left:828px;top:1346px;width:102px;height:15px;text-align:center;z-index:132;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CSc.Ki. 11 ka</span></div>
<div id="wb_Text17" style="position:absolute;left:835px;top:1410px;width:90px;height:15px;text-align:center;z-index:133;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CSc.Ki. 12 ka</span></div>
<div id="wb_Text18" style="position:absolute;left:829px;top:1467px;width:97px;height:15px;text-align:center;z-index:134;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CSc.Ki. 13 ka</span></div>
<div id="wb_Text19" style="position:absolute;left:830px;top:1532px;width:97px;height:15px;text-align:center;z-index:135;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CSc.Ki. 14 ka</span></div>
<div id="wb_Text20" style="position:absolute;left:827px;top:1592px;width:97px;height:15px;text-align:center;z-index:136;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CSc.Ki. 15 ka</span></div>
<div id="wb_Text21" style="position:absolute;left:838px;top:1656px;width:82px;height:15px;text-align:center;z-index:137;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Sc.Ki. 5 ka</span></div>
<div id="wb_Text22" style="position:absolute;left:838px;top:1721px;width:81px;height:15px;text-align:center;z-index:138;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CSc.Ki. 16 ka</span></div>
<div id="wb_Text23" style="position:absolute;left:831px;top:1781px;width:98px;height:15px;text-align:center;z-index:139;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CSc.Ki. 17 ka</span></div>
<div id="wb_Text24" style="position:absolute;left:846px;top:1843px;width:66px;height:15px;text-align:center;z-index:140;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Sc.Ki. 6 ka</span></div>
<div id="wb_Text25" style="position:absolute;left:642px;top:426px;width:78px;height:15px;text-align:center;z-index:141;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CSc.Ka. 1 ki</span></div>
<div id="wb_Text26" style="position:absolute;left:446px;top:412px;width:79px;height:15px;text-align:center;z-index:142;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CSc.Ka. 2 ki</span></div>
<div id="wb_Text27" style="position:absolute;left:443px;top:478px;width:85px;height:15px;text-align:center;z-index:143;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CSc.Ka. 3 ki</span></div>
<div id="wb_Text28" style="position:absolute;left:443px;top:550px;width:85px;height:15px;text-align:center;z-index:144;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CSc.Ka. 4 ki</span></div>
<div id="wb_Text29" style="position:absolute;left:443px;top:622px;width:85px;height:15px;text-align:center;z-index:145;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CSc.Ka. 5 ki</span></div>
<div id="wb_Text30" style="position:absolute;left:442px;top:712px;width:87px;height:15px;text-align:center;z-index:146;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CSc.Ka. 6 ki</span></div>
<div id="wb_Text31" style="position:absolute;left:443px;top:775px;width:85px;height:15px;text-align:center;z-index:147;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CSc.Ka. 7 ki</span></div>
<div id="wb_Text32" style="position:absolute;left:441px;top:841px;width:89px;height:15px;text-align:center;z-index:148;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CSc.Ka. 8 ki</span></div>
<div id="wb_Text33" style="position:absolute;left:441px;top:902px;width:84px;height:15px;text-align:center;z-index:149;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CSc.Ka. 9 ki</span></div>
<div id="wb_Text34" style="position:absolute;left:446px;top:967px;width:79px;height:15px;text-align:center;z-index:150;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Sc.Ka. 1 ki</span></div>
<div id="wb_Text35" style="position:absolute;left:442px;top:1032px;width:86px;height:15px;text-align:center;z-index:151;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Sc.Ka. 2 ki</span></div>
<div id="wb_Text36" style="position:absolute;left:442px;top:1096px;width:86px;height:15px;text-align:center;z-index:152;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CSc.Ka. 10 ki</span></div>
<div id="wb_Shape112" style="position:absolute;left:584px;top:1156px;width:109px;height:61px;z-index:153;">
<img src="images/img0062.png" id="Shape112" alt="" style="width:109px;height:61px;"></div>
<div id="wb_Text37" style="position:absolute;left:595px;top:1160px;width:85px;height:15px;text-align:center;z-index:154;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Sc.Ka. 3 ki</span></div>
<div id="wb_Text38" style="position:absolute;left:605px;top:1224px;width:65px;height:15px;text-align:center;z-index:155;">
<span style="color:#000000;font-family:Arial;font-size:13px;">GL. 1 ki</span></div>
<div id="wb_Text39" style="position:absolute;left:596px;top:1288px;width:84px;height:15px;text-align:center;z-index:156;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Cr.GL. 1 ka</span></div>
<div id="wb_Text40" style="position:absolute;left:604px;top:1348px;width:65px;height:15px;text-align:center;z-index:157;">
<span style="color:#000000;font-family:Arial;font-size:13px;">GL. 2 ka</span></div>
<div id="wb_Text41" style="position:absolute;left:595px;top:1408px;width:85px;height:15px;text-align:center;z-index:158;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Cr.GL. 2 ka</span></div>
<div id="wb_Text42" style="position:absolute;left:602px;top:1472px;width:69px;height:15px;text-align:center;z-index:159;">
<span style="color:#000000;font-family:Arial;font-size:13px;">GL. 3 ka</span></div>
<div id="wb_Text43" style="position:absolute;left:600px;top:1533px;width:73px;height:15px;text-align:center;z-index:160;">
<span style="color:#000000;font-family:Arial;font-size:13px;">GL. 4a ka</span></div>
<div id="wb_Text44" style="position:absolute;left:601px;top:1594px;width:74px;height:15px;text-align:center;z-index:161;">
<span style="color:#000000;font-family:Arial;font-size:13px;">GL. 4 ka</span></div>
<div id="wb_Text45" style="position:absolute;left:605px;top:1656px;width:64px;height:15px;text-align:center;z-index:162;">
<span style="color:#000000;font-family:Arial;font-size:13px;">GL. 5 ka</span></div>
<div id="wb_Text46" style="position:absolute;left:602px;top:1721px;width:71px;height:15px;text-align:center;z-index:163;">
<span style="color:#000000;font-family:Arial;font-size:13px;">GL. 6 ka</span></div>
<div id="wb_Text47" style="position:absolute;left:609px;top:1781px;width:54px;height:15px;text-align:center;z-index:164;">
<span style="color:#000000;font-family:Arial;font-size:13px;">GL. 6 </span></div>
<div id="wb_Text48" style="position:absolute;left:396px;top:1205px;width:78px;height:15px;text-align:center;z-index:165;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CKd. 1 ki</span></div>
<div id="wb_Text49" style="position:absolute;left:202px;top:1224px;width:74px;height:15px;text-align:center;z-index:166;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CKd. 2 ki</span></div>
<div id="wb_Text50" style="position:absolute;left:202px;top:1288px;width:74px;height:15px;text-align:center;z-index:167;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CKd. 3 ki</span></div>
<div id="wb_Text51" style="position:absolute;left:208px;top:1346px;width:63px;height:15px;text-align:center;z-index:168;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Kd. 1 ki</span></div>
<div id="wb_Text52" style="position:absolute;left:203px;top:1408px;width:72px;height:15px;text-align:center;z-index:169;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CKd. 4 ki</span></div>
<div id="wb_Text53" style="position:absolute;left:202px;top:1472px;width:74px;height:15px;text-align:center;z-index:170;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CKd. 5 ki</span></div>
<div id="wb_Text54" style="position:absolute;left:206px;top:1533px;width:67px;height:15px;text-align:center;z-index:171;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CKd. 6 ki</span></div>
<div id="wb_Text55" style="position:absolute;left:207px;top:1593px;width:65px;height:15px;text-align:center;z-index:172;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Kd. 2 ki</span></div>
<div id="wb_Text56" style="position:absolute;left:209px;top:1656px;width:60px;height:15px;text-align:center;z-index:173;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Kd. 2 ka</span></div>

<div id="wb_Text57" style="position:absolute;left:819px;top:340px;width:93px;height:15px;text-align:center;z-index:174;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 0,48 Ha</span></div>
<div id="wb_Text58" style="position:absolute;left:829px;top:429px;width:80px;height:15px;text-align:center;z-index:175;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 0,32 Ha</span></div>
<div id="wb_Text59" style="position:absolute;left:827px;top:495px;width:83px;height:15px;text-align:center;z-index:176;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 0,24 Ha</span></div>
<div id="wb_Text60" style="position:absolute;left:826px;top:574px;width:84px;height:15px;text-align:center;z-index:177;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 1,45 Ha</span></div>
<div id="wb_Text61" style="position:absolute;left:834px;top:647px;width:75px;height:15px;text-align:center;z-index:178;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 2,41 Ha </span></div>
<div id="wb_Text62" style="position:absolute;left:831px;top:724px;width:80px;height:15px;text-align:center;z-index:179;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 9,56 Ha</span></div>
<div id="wb_Text63" style="position:absolute;left:830px;top:795px;width:78px;height:15px;text-align:center;z-index:180;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 1,45 Ha </span></div>
<div id="wb_Text64" style="position:absolute;left:830px;top:857px;width:78px;height:15px;text-align:center;z-index:181;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 2,01 Ha </span></div>
<div id="wb_Text65" style="position:absolute;left:828px;top:923px;width:74px;height:15px;text-align:center;z-index:182;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 1,53 Ha</span></div>
<div id="wb_Text66" style="position:absolute;left:835px;top:982px;width:72px;height:15px;text-align:center;z-index:183;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 0,24 Ha </span></div>
<div id="wb_Text67" style="position:absolute;left:830px;top:1046px;width:85px;height:15px;text-align:center;z-index:184;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 40,6 Ha</span></div>
<div id="wb_Text68" style="position:absolute;left:831px;top:1118px;width:88px;height:15px;text-align:center;z-index:185;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 13,02 Ha </span></div>
<div id="wb_Text69" style="position:absolute;left:835px;top:1178px;width:75px;height:15px;text-align:center;z-index:186;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 48,82 Ha </span></div>
<div id="wb_Text70" style="position:absolute;left:831px;top:1236px;width:77px;height:15px;text-align:center;z-index:187;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 5,24 Ha </span></div>
<div id="wb_Text71" style="position:absolute;left:833px;top:1303px;width:78px;height:15px;text-align:center;z-index:188;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 5,73 Ha </span></div>
<div id="wb_Text72" style="position:absolute;left:835px;top:1363px;width:75px;height:15px;text-align:center;z-index:189;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 1,37 Ha</span></div>
<div id="wb_Text73" style="position:absolute;left:834px;top:1425px;width:77px;height:15px;text-align:center;z-index:190;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 1,45 Ha </span></div>
<div id="wb_Text74" style="position:absolute;left:831px;top:1484px;width:84px;height:15px;text-align:center;z-index:191;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 1,45 Ha</span></div>
<div id="wb_Text75" style="position:absolute;left:833px;top:1545px;width:74px;height:15px;text-align:center;z-index:192;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 1,2 Ha</span></div>
<div id="wb_Text76" style="position:absolute;left:836px;top:1606px;width:81px;height:15px;text-align:center;z-index:193;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 0,72 Ha </span></div>
<div id="wb_Text77" style="position:absolute;left:832px;top:1671px;width:93px;height:15px;text-align:center;z-index:194;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 15,85 Ha </span></div>
<div id="wb_Text78" style="position:absolute;left:835px;top:1736px;width:81px;height:15px;text-align:center;z-index:195;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 5,08 Ha </span></div>
<div id="wb_Text79" style="position:absolute;left:836px;top:1796px;width:81px;height:15px;text-align:center;z-index:196;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 0,24 Ha </span></div>
<div id="wb_Text80" style="position:absolute;left:835px;top:1858px;width:85px;height:15px;text-align:center;z-index:197;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 39,56 Ha </span></div>
<div id="wb_Text81" style="position:absolute;left:627px;top:442px;width:80px;height:15px;text-align:center;z-index:198;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 0,24 Ha </span></div>
<div id="wb_Text82" style="position:absolute;left:433px;top:428px;width:76px;height:15px;text-align:center;z-index:199;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 0,48 Ha </span></div>

<div id="wb_Text83" style="position:absolute;left:427px;top:493px;width:87px;height:15px;text-align:center;z-index:200;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 1,53 Ha </span></div>

<div id="wb_Text84" style="position:absolute;left:434px;top:565px;width:77px;height:15px;text-align:center;z-index:201;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 1,57 Ha </span></div>
<div id="wb_Text85" style="position:absolute;left:429px;top:637px;width:82px;height:15px;text-align:center;z-index:202;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 0,24 Ha </span></div>
<div id="wb_Text86" style="position:absolute;left:431px;top:729px;width:77px;height:15px;text-align:center;z-index:203;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 1,33 Ha </span></div>
<div id="wb_Text87" style="position:absolute;left:434px;top:791px;width:73px;height:15px;text-align:center;z-index:204;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 0,24 Ha </span></div>
<div id="wb_Text88" style="position:absolute;left:428px;top:857px;width:88px;height:15px;text-align:center;z-index:205;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 0,24 Ha </span></div>
<div id="wb_Text89" style="position:absolute;left:428px;top:918px;width:89px;height:15px;text-align:center;z-index:206;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 3,54 Ha</span></div>
<div id="wb_Text90" style="position:absolute;left:430px;top:982px;width:90px;height:15px;text-align:center;z-index:207;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 19,3 Ha </span></div>
<div id="wb_Text91" style="position:absolute;left:437px;top:1047px;width:80px;height:15px;text-align:center;z-index:208;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 5,27 Ha</span></div>
<div id="wb_Text92" style="position:absolute;left:430px;top:1113px;width:93px;height:15px;text-align:center;z-index:209;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 4,82 Ha </span></div>
<div id="wb_Text93" style="position:absolute;left:588px;top:1177px;width:82px;height:15px;text-align:center;z-index:210;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 6,51 Ha </span></div>
<div id="wb_Text94" style="position:absolute;left:596px;top:1240px;width:77px;height:15px;text-align:center;z-index:211;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 42,84 Ha </span></div>
<div id="wb_Text95" style="position:absolute;left:595px;top:1303px;width:80px;height:15px;text-align:center;z-index:212;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 12,22 Ha </span></div>
<div id="wb_Text96" style="position:absolute;left:596px;top:1363px;width:77px;height:15px;text-align:center;z-index:213;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 41,49 Ha </span></div>
<div id="wb_Text97" style="position:absolute;left:588px;top:1423px;width:86px;height:15px;text-align:center;z-index:214;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 3,06 Ha </span></div>
<div id="wb_Text98" style="position:absolute;left:592px;top:1484px;width:74px;height:15px;text-align:center;z-index:215;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 9,00 Ha </span></div>
<div id="wb_Text99" style="position:absolute;left:591px;top:1549px;width:82px;height:15px;text-align:center;z-index:216;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 10,45 Ha </span></div>
<div id="wb_Text100" style="position:absolute;left:589px;top:1612px;width:90px;height:15px;text-align:center;z-index:217;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 24,84 Ha </span></div>
<div id="wb_Text101" style="position:absolute;left:585px;top:1672px;width:98px;height:15px;text-align:center;z-index:218;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 35,00 Ha </span></div>
<div id="wb_Text102" style="position:absolute;left:593px;top:1736px;width:83px;height:15px;text-align:center;z-index:219;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 30,07 Ha </span></div>
<div id="wb_Text103" style="position:absolute;left:587px;top:1796px;width:88px;height:15px;text-align:center;z-index:220;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A: 63,55 Ha </span></div>
<div id="wb_Text104" style="position:absolute;left:381px;top:1219px;width:80px;height:15px;text-align:center;z-index:221;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 0,64 Ha</span></div>
<div id="wb_Text105" style="position:absolute;left:185px;top:1240px;width:81px;height:15px;text-align:center;z-index:222;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 6,11 Ha</span></div>
<div id="wb_Text106" style="position:absolute;left:181px;top:1302px;width:85px;height:15px;text-align:center;z-index:223;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A :3,05 Ha</span></div>
<div id="wb_Text107" style="position:absolute;left:193px;top:1361px;width:78px;height:15px;text-align:center;z-index:224;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 16,86 Ha</span></div>
<div id="wb_Text108" style="position:absolute;left:190px;top:1423px;width:76px;height:15px;text-align:center;z-index:225;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 0,48 Ha</span></div>
<div id="wb_Text109" style="position:absolute;left:185px;top:1487px;width:84px;height:15px;text-align:center;z-index:226;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 0,48 Ha</span></div>
<div id="wb_Text110" style="position:absolute;left:184px;top:1549px;width:86px;height:15px;text-align:center;z-index:227;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 6,67 Ha</span></div>
<div id="wb_Text111" style="position:absolute;left:187px;top:1608px;width:81px;height:15px;text-align:center;z-index:228;">
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 6,67 Ha</span></div>
<div id="wb_Text112" style="position:absolute;left:190px;top:1671px;width:84px;height:15px;text-align:center;z-index:229;">,
<span style="color:#000000;font-family:Arial;font-size:13px;">A : 37,19 Ha</span></div> -
<!--- AKHIR SKEMA IRIGASI -->

<?php 

$sql_total = mysql_query("SELECT id from alokasi");
$total = mysql_num_rows($sql_total);
$start = $total - 56;//total  56 data import


for ($i = 1; $i <= 56; $i++) {
$urut = $start + $i;
$q = mysql_fetch_array(mysql_query("SELECT id,q_diberikan FROM `alokasi` WHERE id=$i AND di='SCN' ORDER BY id ASC"));
?>
<div id="isi_wb<?php echo $i;?>"><span><?php echo $q['q_diberikan']; ?> m3/dt</span></div>
<?php } ?>

		

		</div>
<div id="wb_element_instance170" class="wb_element" style="width: 100%; display: none;">
	  <script type="text/javascript">
				$(function() {
					$("#wb_element_instance170").hide();
				});
			</script>
	</div></div>

	</div>
	</div>

</body></html>