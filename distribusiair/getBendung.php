<?php
include '../config/koneksi.php';
include '../config/fungsi_indotgl.php';
$dt = mysql_fetch_array(mysql_query("SELECT id,periode,bulan,tahun FROM `alokasi` ORDER BY id DESC"));
$query = mysql_query("select id,lokasi,a_tanam,q_diberikan FROM alokasi WHERE id in (SELECT MAX(alo.id) FROM alokasi alo GROUP BY alo.lokasi) AND di='$_GET[kode_bendung]' ORDER BY id DESC");
$q_debit = mysql_query("SELECT debit from elevasi WHERE kode='$_GET[kode_bendung]' ORDER BY id_elevasi DESC");
$dta = mysql_fetch_array(mysql_query("SELECT id,file FROM `upload` WHERE jenisdata='faktork' AND file LIKE '%$_GET[kode_bendung]%' ORDER BY id DESC"));
$file_k = $dta['file'];
$dtb = mysql_fetch_array(mysql_query("SELECT id,file FROM `upload` WHERE jenisdata='alokasi' AND file LIKE '%$_GET[kode_bendung]%' ORDER BY id DESC"));
$file_a = $dtb['file'];
$period = $dt['periode'];
$blan = $dt['bulan'];
$thn = $dt['tahun'];

$bulan = getBulan($blan);

$jmlhari = jumlahhari($blan, $thn);
if ($period == 'I') {
	$per = "1-15";
} else {
	$per = "16-" . $jmlhari;
}
$periode = $per . " " . $bulan . " " . $thn;
$data = array(
    "query" => array(),
    "q_debit" => array(),
    "periode"=>$periode,
    "file_faktor_k"=>$file_k,
    "file_alokasi"=>$file_a,
);
if (!$query) {
    echo mysql_error($conn);
    die;
} else {
    while ($row = mysql_fetch_array($query)) {
        array_push($data["query"], $row);
    }
    while ($debit = mysql_fetch_array($q_debit)) {
        array_push($data["q_debit"], $debit);
    }
}
// var_dump($data);
// die;
// $debit = mysql_fetch_array($q_debit);
// arrat_push($data, $debit);

echo json_encode($data);
