<?php
include './../config/koneksi.php';
$query = mysql_query("select id,lokasi,a_tanam,q_diberikan FROM alokasi WHERE id in (SELECT MAX(alo.id) FROM alokasi alo GROUP BY alo.lokasi) AND di='$_GET[kode_bendung]' ORDER BY id DESC");

$data = array();
if (!$query) {
    echo mysql_error($conn);
    die;
} else {
    while ($row = mysql_fetch_array($query)) {
        array_push($data, $row);
    }
}

echo json_encode($data);
