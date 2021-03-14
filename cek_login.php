<?php
include "config/koneksi.php";
function anti_injection($data)
{
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES))));
  return $filter;
}

$username = anti_injection($_POST['username']);
$pass     = anti_injection(md5($_POST['password']));

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) or !ctype_alnum($pass)) {
  echo "Sekarang loginnya tidak bisa di injeksi lho.";
} else {
  $login = mysql_query("SELECT * FROM users WHERE username='$username' AND password='$pass' AND blokir='N'");
  $ketemu = mysql_num_rows($login);
  $r = mysql_fetch_array($login);

  // Apabila username dan password ditemukan
  if ($ketemu > 0) {
    session_start();

    $_SESSION[namauser]     = $r[username];
    $_SESSION[namalengkap]  = $r[nama_lengkap];
    $_SESSION[passuser]     = $r[password];
    $_SESSION[sessid]       = $r[id_session];
    $_SESSION[leveluser]    = $r[level];

    header('location:media.php?module=home');
  } else {
    echo "<script>alert('Maaf,Username dan Password Salah'); window.location = './login/'</script>";
  }
}
