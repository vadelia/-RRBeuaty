<?php
// Konfigurasi database
$host = 'localhost';
$dbname = 'uas_web'; // Nama database Anda
$user = 'root';        // Username database Anda
$pass = '';            // Password database Anda

// Koneksi ke database
$conn = new mysqli($host, $user, $pass, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tangkap data dari form
$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Validasi password
if ($password !== $confirm_password) {
    header("Location: register.html?error=Password tidak sesuai");
    exit();
}

// Enkripsi password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Masukkan data ke database
$sql = "INSERT INTO login_page (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $hashed_password);

if ($stmt->execute()) {
    // Berhasil register
    header("Location: login.html?success=Registrasi berhasil");
} else {
    // Gagal register
    if ($conn->errno == 1062) {
        header("Location: register.html?error=Username sudah digunakan");
    } else {
        header("Location: register.html?error=Terjadi kesalahan");
    }
}

// Tutup koneksi
$stmt->close();
$conn->close();
?>
