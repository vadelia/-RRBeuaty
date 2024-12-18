<?php
$conn = new mysqli('localhost', 'root', '', 'uas_web');

// Periksa koneksi database
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data berdasarkan no_member untuk diedit
if (isset($_GET['no_member'])) {
    $no_member = $conn->real_escape_string($_GET['no_member']);
    $result = $conn->query("SELECT * FROM members WHERE no_member = '$no_member'");
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
    } else {
        die("Data tidak ditemukan.");
    }
}

// Proses pembaruan data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old_no_member = $conn->real_escape_string($_POST['old_no_member']);
    $no_member = $conn->real_escape_string($_POST['no_member']);
    $nama = $conn->real_escape_string($_POST['nama']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $alamat = $conn->real_escape_string($_POST['alamat']);
    $foto_lama = $_POST['foto_lama'];

    // Proses upload foto jika ada
    $foto_baru = $foto_lama;
    if (isset($_FILES['foto']['name']) && $_FILES['foto']['name'] != '') {
        $target_dir = "uploads/";
        $foto_baru = $target_dir . basename($_FILES['foto']['name']);
        $file_type = strtolower(pathinfo($foto_baru, PATHINFO_EXTENSION));

        // Validasi tipe file foto
        if (in_array($file_type, ['jpg', 'jpeg', 'png', 'gif'])) {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $foto_baru)) {
                if ($foto_lama && file_exists($foto_lama) && $foto_baru !== $foto_lama) {
                    unlink($foto_lama); // Hapus foto lama jika ada
                }
            } else {
                die("Gagal mengupload foto.");
            }
        } else {
            die("Tipe file foto tidak valid. Hanya JPG, JPEG, PNG, atau GIF.");
        }
    }

    // Query pembaruan data
    $sql = "UPDATE members 
            SET no_member = '$no_member', nama = '$nama', email = '$email', phone = '$phone', alamat = '$alamat', foto = '$foto_baru'
            WHERE no_member = '$old_no_member'";

    if ($conn->query($sql) === TRUE) {
        header("Location: datam.php"); // Redirect setelah berhasil
        exit();
    } else {
        die("Error: " . $conn->error);
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Member</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FFF0D1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h1 {
            text-align: center;
            color: #654520;
        }

        form label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
        }

        form input[type="text"],
        form input[type="email"],
        form input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        form button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        form button:hover {
            background-color: #45a049;
        }

        a {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #0A3981;
            text-decoration: none;
        }

        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Data Member</h1>
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="old_no_member" value="<?= htmlspecialchars($data['no_member']) ?>">
            <input type="hidden" name="foto_lama" value="<?= htmlspecialchars($data['foto']) ?>">

            <label for="no_member">No Member</label>
            <input type="text" id="no_member" name="no_member" value="<?= htmlspecialchars($data['no_member']) ?>" required>

            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($data['email']) ?>" required>

            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($data['phone']) ?>" required>

            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" name="alamat" value="<?= htmlspecialchars($data['alamat']) ?>" required>

            <label for="foto">Foto</label>
            <input type="file" id="foto" name="foto">

            <button type="submit">Simpan</button>
        </form>
        <a href="datam.php">Kembali</a>
    </div>
</body>
</html>
