<?php
session_start();
session_unset();  // Menghapus semua variabel sesi
session_destroy();  // Menghancurkan sesi
header("Location: dashboard.php");  // Arahkan kembali ke halaman login
exit();
?>
