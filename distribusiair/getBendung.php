<?php
include 'conn.php';
include '../config/fungsi_indotgl.php';
$dt = mysqli_fetch_array(mysqli_query($conn,"SELECT id,periode,bulan,tahun FROM `alokasi` ORDER BY id DESC"));
$query = mysqli_query($conn,"select id,lokasi,a_tanam,q_diberikan,periode,bulan,tahun FROM alokasi WHERE id in (SELECT MAX(alo.id) FROM alokasi alo GROUP BY alo.lokasi) AND di='$_GET[kode_bendung]' ORDER BY id DESC");
$q_debit = mysqli_query($conn, "SELECT debit from elevasi WHERE kode='$_GET[kode_bendung]' ORDER BY id_elevasi DESC");
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
);
if (!$query) {
    echo mysqli_error($conn);
    die;
} else {
    while ($row = mysqli_fetch_array($query)) {
        array_push($data["query"], $row);
    }
    while ($debit = mysqli_fetch_array($q_debit)) {
        array_push($data["q_debit"], $debit);
    }
}
// var_dump($data);
// die;
// $debit = mysqli_fetch_array($q_debit);
// arrat_push($data, $debit);

echo json_encode($data);
