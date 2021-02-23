<?php
include '../config/koneksi.php';
include 'function.php';
$psda  = "~APEMASI Sercit~"; 

$hasil = mysql_query("SELECT * FROM inbox WHERE Processed = 'false'");
  while ($data = mysql_fetch_array($hasil)){
	 $id   = $data['ID'];
	 $sms  = strtoupper($data['TextDecoded']);
	 $nohp = $data['SenderNumber'];
	 $time = $data['ReceivingDateTime'];
   $jam  = substr($time,11,8);
   $tgl  = tglindo(substr($time,0,10));
   $tanggal  =substr($time,0,10);
	 $split    = explode(" ", $sms);
	 $command  = $split[0];
	 $kode     = $split[1];
				
	//command update elevasi bendung
	if ($command == "BENDUNG"){
		    // cek jumlah parameter
		    if (count($split) == 6){ 
		         $elevasi = $split[2];
	           $debit= $split[3];
             $Qka  = $split[4];
	           $Qki  = $split[5];
			       // cek apakah nomor hp terdaftar
			       if (ceknohp($nohp) == 1){
				        // cek kode bendung
				        if (cekbdg($kode) == 1){
					           //input ke database   
                      $status   = status($elevasi,$kode);
                      $bendung  = namabdg($kode);
                      $debit    = debit($elevasi,$kode);   
                      $petugas  = petugas($nohp);                   
                 mysql_query("INSERT INTO elevasi(kode,bendung,elevasi,debit,Qka,Qki,tgl,jam,status,petugas) VALUES('$kode','$bendung','$elevasi','$debit','$Qka','$Qki','$tanggal','$jam','$status','$petugas')" );
                      
      //koneksi ke web hosting 
      $auth = md5("sercit2015");                  
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL,$web."/datahosting.php");
      curl_setopt($curl, CURLOPT_POST, 1);
      curl_setopt($curl, CURLOPT_POSTFIELDS, "kode=" .$kode.
                                        "auth=" .$auth. 
                                        "&bendung=" .$bendung.
                                        "&elevasi=" .$elevasi.
                                        "&tgl=" .$tgl.
                                        "&jam=" .$jam.
                                        "&status=" .$status.
                                        "&petugas=" .$petugas.
                                        "&debit=" .$debit.
                                        "&Qka=" .$Qka.
                                        "&Qki=" .$Qki);
      curl_exec ($curl);
      curl_close ($curl);
    //end of curl
     
          //broadcast sms ke nomor penting jika status siaga
          if ($status !='NORMAL'){ 
               $penting = mysql_query("SELECT * FROM phonebook WHERE nama_group ='0'");
               while ($p = mysql_fetch_array($penting)) {
                      $nopenting=$p['no_hp'];
                      $reply="Informasi elevasi $bendung pada $tgl jam $jam tercatat pada ketinggian $elevasi dengan status $status. $psda";
                      //broadcast sms 
                      sendsms($nopenting, $reply, '');
                  }
                }				           
			          $reply = "Update informasi debit Berhasil, terima kasih atas kontribusi Anda. $psda"; }
				  else $reply = "Maaf KODE BENDUNG salah. $psda"; }	
		      //jika no hp belum terdaftar
          else $reply = "Maaf No HP Anda belum terdaftar, untuk mendaftar ketik DAFTAR(spasi)NAMA.$psda"; }
		      //jika format sms salah    	
		      else $reply = "Maaf Format SMS salah, ketik BENDUNG(spasi)KODE BENDUNG(spasi)ELEVASI(spasi)QSungai(spasi)DEBIT KANAN(spasi)DEBIT KIRI. $psda";
		            //kirim sms balasan
	     	        sendsms($nohp, $reply, '');
	   }
	   
	//command informasi elevasi bendung
	elseif ($command=="INFO"){
    // cek jumlah parameter
		    if (count($split) == 2){
			       // cek apakah nomor hp terdaftar
			       
				        $kode = $split[1];				       
				        if (cekbdg($kode) == 1) {
					           // baca kode bendung
					           $el=mysql_fetch_array(mysql_query("SELECT * FROM elevasi WHERE kode ='$kode' order by id_elevasi DESC limit 1"));
					           $elevasi = $el['elevasi'];
					           $Qka     = $el['Qka'];
					           $Qki     = $el['Qki'];
					           $status  = $el['status'];
					           $tg      = tglindo($el['tgl']);
					           $bendung = namabdg($kode);
                     $reply   = "Informai elevasi $bendung tercatat pada $tg dengan Q:$elevasi, QInt Ka:$Qka, Qint Ki:$Qki dan status saat ini $status. $psda";
				            }
				        else $reply =  "Maaf KODE BENDUNG salah. $psda"; 
		      }
		    else $reply = "Maaf format SMS salah. $psda";
		    //kirim sms balasan
		    sendsms($nohp, $reply, '');
  }
  
  //command daftar
	elseif ($command=="DAFTAR"){
		  // cek jumlah parameter
		    if (count($split) >= 2)
		      {
		        $nama=$split[1].' '.$split[2];
			       // cek apakah nomor hp terdaftar
			       if (ceknohp($nohp) == 1)
			       {
				        $reply = "No HP Anda sudah terdaftar di sistem kami. $psda";
			       }	
		         
             //input ke database
             else {$reply = "Selamat Anda sudah terdaftar di sistem kami. $psda";
                  mysql_query("INSERT INTO phonebook(nama, no_hp) VALUES  ('$nama','$nohp')");
                  }
		      }
		    else $reply = "Maaf Format SMS salah, ketik DAFTAR(spasi)NAMA. $psda";
		    //kirim sms balasan
	     	sendsms($nohp, $reply, '');
	  }
	
  
  echo $sms.'<br>'.$reply;
	$query2 = "UPDATE inbox SET Processed = 'true' WHERE id = '$id'";
	mysql_query($query2);
	
}
?>
