<?php
$host = "localhost";
$user = "root"; // Sesuaikan dengan user MySQL Anda
$pass = "";
$db   = "uas_web";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $tanggal = $_POST['tanggal'];
    $jabatan = $_POST['jabatan'];

    // Proses Upload File
    $foto = $_FILES['foto']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($foto);
    move_uploaded_file($_FILES['foto']['tmp_name'], $target_file);

    // Insert data ke database
    $sql = "INSERT INTO member_rr_beauty (foto, nama, jenis_kelamin, tanggal, jabatan)
            VALUES ('$foto', '$nama', '$jk', '$tanggal', '$jabatan')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css">
    <title>Tambah data pegawai</title>
</head>
<body>

    <header>
        <h2>Manajemen Member RR Beauty</h2>
    </header>
    
    <section class="main">
        <h2 class="judul">Tambah Member RR Beauty</h2>
        <form action="proses.php" method="post">
            <div class="form-group">
                <label for="foto">Foto</label>
                <div class="input"><input type="file" id="foto"></div>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <div class="input"><input type="text" id="nama"></div>
            </div>
            <div class="form-group">
                <label for="jk">Jenis Kelamin</label>
                <input type="radio" id="jk_l" name="jk" value="L"> Laki-laki
                <input type="radio" id="jk_p" name="jk" value="P"> Perempuan
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <div class="input"><input type="date" id="tanggal"></div>
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <div class="input">
                    <select id="jabatan">
                        <option value="direktur">Direktur</option>
                        <option value="manajer">Manajer</option>
                        <option value="marketing">Marketing</option>
                        <option value="sekretaris">Sekretaris</option>
                        <option value="chef">Chef</option>
                        <option value="waiter">Waiter/Waitress</option>
                        <option value="kasir">Kasir</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="Simpan" class="tombol simpan">
                <input type="reset" value="Batal" class="tombol reset">
                <a href="data_page.html" class="tombol keluar">Keluar</a> <!-- Tambahkan tombol keluar di sini -->
            </div>
        </form>
    </section>

    <footer>
        <p>&copy; RR Beauty</p>
    </footer>

</body>
</html>
