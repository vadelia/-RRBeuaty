<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'uas_web');

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil `no_pegawai` dari parameter GET
if (isset($_GET['no_pegawai'])) {
    $no_pegawai = $_GET['no_pegawai'];

    // Query untuk mengambil data pegawai berdasarkan `no_pegawai`
    $sql = "SELECT * FROM pegawai WHERE no_pegawai = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $no_pegawai);
    $stmt->execute();
    $result = $stmt->get_result();

    // Periksa apakah data ditemukan
    if ($result->num_rows > 0) {
        $pegawai = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
} else {
    echo "ID pegawai tidak diberikan.";
    exit();
}

// Proses update data ketika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_pegawai = $_POST['nama_pegawai'];
    $phone = $_POST['phone'];
    $alamat = $_POST['alamat'];

    // Query untuk mengupdate data pegawai
    $sql = "UPDATE pegawai SET nama_pegawai = ?, phone = ?, alamat = ? WHERE no_pegawai = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nama_pegawai, $phone, $alamat, $no_pegawai);

    if ($stmt->execute()) {
        // Redirect ke halaman data pegawai setelah berhasil
        header("Location: dataj.php?message=Data updated successfully");
        exit();
    } else {
        echo "Terjadi kesalahan saat mengupdate data.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pegawai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #262626, #ffb398);
            color: #fff;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .form-container {
            background: #fff;
            color: #000;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }
        h1 {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"], input[type="number"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-save {
            background-color: #4CAF50;
            color: white;
        }
        .btn-save:hover {
            background-color: #45a049;
        }
        .btn-cancel {
            background-color: #f44336;
            color: white;
        }
        .btn-cancel:hover {
            background-color: #d32f2f;
        }
        .btn-container {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Edit Data Pegawai</h1>
        <form method="POST">
            <label for="nama_pegawai">Nama Pegawai</label>
            <input type="text" id="nama_pegawai" name="nama_pegawai" value="<?= htmlspecialchars($pegawai['nama_pegawai']) ?>" required>

            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($pegawai['phone']) ?>" required>

            <label for="alamat">Alamat</label>
            <textarea id="alamat" name="alamat" rows="4" required><?= htmlspecialchars($pegawai['alamat']) ?></textarea>

            <div class="btn-container">
                <button type="submit" class="btn-save">Simpan</button>
                <a href="dataj.php" class="btn-cancel">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>

<?php $conn->close(); ?>
