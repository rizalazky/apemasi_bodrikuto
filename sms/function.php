<?php

// mengecek apakah sebuah nomor hp sudah teregistrasi atau belum
function ceknohp($nohp)
{
	$query = "SELECT * FROM phonebook WHERE no_hp = '$nohp'";
	$hasil = mysql_query($query);
	if (mysql_num_rows($hasil) > 0) return 1;
	else return 0;
}

// cek kode bendung
function cekbdg($kode)
{
	$query = "SELECT * FROM bendung WHERE kode = '$kode'";
	$hasil = mysql_query($query);
	if (mysql_num_rows($hasil) > 0) return 1;
	else return 0;
}

// cek nama bendung
function namabdg($kode)
{
	$query   = "SELECT * FROM bendung WHERE kode='$kode'";
	$hasil   = mysql_query($query);
	if (mysql_num_rows($hasil) > 0)
	{
		$data = mysql_fetch_array($hasil);
		return $data['bendung'];
	}
	else return "Kode bendung tidak sesuai";	
}

//cek nama petugas bendung
// cek nama bendung
function petugas($nohp)
{
	$query   = "SELECT * FROM phonebook WHERE no_hp='$nohp'";
	$hasil   = mysql_query($query);
	if (mysql_num_rows($hasil) > 0){
		$data = mysql_fetch_array($hasil);
		return $data['nama'];
	}
	else return "Belum terdaftar";	
}

// cek nama bendung
function status($elevasi,$kode)
{
	$query   = "SELECT * FROM bendung WHERE kode='$kode'";
	$hasil   = mysql_query($query);
	$data    = mysql_fetch_array($hasil);
	$bendung =$data['bendung'];
  $wa=$data['waspada'];
  $sa=$data['siaga'];
  $aa=$data['awas'];
    if ($elevasi<$wa){
        return "NORMAL";}
    elseif($elevasi>=$wa AND $elevasi<$sa){
        return "WASPADA";    }
    elseif($elevasi>=$sa AND $elevasi<$aa){
        return "SIAGA";}
    else return "AWAS";	
}

//hitung debit
function debit($elevasi,$kode){
  $query   = "SELECT * FROM bendung WHERE kode='$kode'";
	$hasil   = mysql_query($query);
	$data    = mysql_fetch_array($hasil);
	$bendung =$data['bendung'];
  $deb     =$data['a']*$data['b']*pow($elevasi,$data['c']);
  $debit   =number_format($deb,3,'.','');
  if (mysql_num_rows($hasil) > 0)
	{
		$data = mysql_fetch_array($hasil);
		return $debit;
	}
	else return "Kode bendung tidak sesuai";	
}

// kirim sms
function sendsms($nohp, $pesan, $modem)
{
	
	$pesan = str_replace("'", "\'", $pesan);
	
	if (strlen($pesan)<=160)
	{ 
		$query = "INSERT INTO outbox (DestinationNumber, TextDecoded, SenderID, CreatorID) 
		          VALUES ('$nohp', '$pesan', '$modem', 'Gammu')";
		$hasil = mysql_query($query);
	}
	else
	{
		$jmlSMS = ceil(strlen($pesan)/153);
		$pecah  = str_split($pesan, 153);
		 
		$query = "SHOW TABLE STATUS LIKE 'outbox'";
		$hasil = mysql_query($query);
		$data  = mysql_fetch_array($hasil);
		$newID = $data['Auto_increment'];
	
		$random = rand(1, 255);
		$headerUDH = sprintf("%02s", strtoupper(dechex($random)));
	
		for ($i=1; $i<=$jmlSMS; $i++)
		{
		
			$udh = "050003".$headerUDH.sprintf("%02s", $jmlSMS).sprintf("%02s", $i);
			$msg = $pecah[$i-1];
	  
			if ($i == 1) 
			{	
				$query = "INSERT INTO outbox (DestinationNumber, UDH, TextDecoded, ID, MultiPart, SenderID, CreatorID)
						  VALUES ('$nohp', '$udh', '$msg', '$newID', 'true', '$modem', 'Gammu')";	  	  
			}						 
			else $query = "INSERT INTO outbox_multipart(UDH, TextDecoded, ID, SequencePosition)
						   VALUES ('$udh', '$msg', '$newID', '$i')";					  
			mysql_query($query); 	  
	  	  
		}
   }
}

	function tglindo($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = substr($tgl,5,2);
			$tahun = substr($tgl,0,4);
			return $tanggal.'/'.$bulan.'/'.$tahun;		 
	}	

?>
