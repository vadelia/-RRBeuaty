<?php
session_start();
session_unset();  // Menghapus semua variabel sesi
session_destroy();  // Menghancurkan sesi
header("Location: ../dashboard.html");  // Arahkan kembali ke halaman login
exit();
?>
