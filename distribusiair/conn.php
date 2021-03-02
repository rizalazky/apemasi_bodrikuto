<?php
    $conn=mysql_connect("localhost","root","","svnvbkdl_dbapemasi");
    
    if(!$conn){
        die('Koneksi Gagal'.mysql_error($conn));
    }
