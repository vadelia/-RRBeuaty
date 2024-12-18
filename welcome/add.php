<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Konfigurasi database
    $conn = new mysqli('localhost', 'root', '', 'uas_web');

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Tangkap data dari form
    $no_member = $_POST['no_member'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $alamat = $_POST['alamat'];

    // Proses upload file
    $foto = $_FILES['foto']['name'];
    $foto_tmp = $_FILES['foto']['tmp_name'];
    $upload_dir = "uploads/";

    // Validasi dan upload file
    if (!empty($foto)) {
        $target_file = $upload_dir . basename($foto);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validasi tipe file
        $allowed_types = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $allowed_types)) {
            echo "<script>alert('Hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan!');</script>";
            exit();
        }

        // Pindahkan file ke folder upload
        if (!move_uploaded_file($foto_tmp, $target_file)) {
            echo "<script>alert('Gagal mengupload foto!');</script>";
            exit();
        }
    } else {
        $foto = null; // Jika tidak ada file diupload
    }

    // Masukkan data ke database
    $sql = "INSERT INTO members (no_member, nama, email, phone, alamat, foto) VALUES ('$no_member', '$nama', '$email', '$phone', '$alamat', '$foto')";
    if ($conn->query($sql) === TRUE) {
        header("Location: datam.php"); // Redirect ke halaman data.php setelah berhasil menyimpan
        exit();
    } else {
        echo "<script>alert('Terjadi kesalahan saat memasukkan data. Silakan coba lagi!');</script>";
    }

    // Tutup koneksi
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Member</title>
    <style>
          /* Menentukan gaya dasar body dengan gradien warna menarik */
          body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #262626, #ffb398);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Membuat wadah form dengan shadow dan border-radius */
        .form-container {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            padding: 30px;
            width: 400px;
            animation: fadeIn 1.5s ease-in-out;
        }

        /* Memberikan animasi untuk tampilan fade-in */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Styling untuk heading */
        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #262626;
        }

        /* Mengatur grup form untuk tata letak rapi */
        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        /* Styling label */
        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        /* Styling input dan textarea */
        .form-group input, .form-group textarea {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        /* Memberikan efek saat fokus pada input/textarea */
        .form-group input:focus, .form-group textarea:focus {
            border-color: #7e57c2;
            box-shadow: 0 0 5px rgba(126, 87, 194, 0.5);
            outline: none;
        }

        /* Styling tombol submit */
        form button {
            width: 100%;
            padding: 10px;
            background-color: #ffb398;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Memberikan efek hover pada tombol */
        form button:hover {
            background-color: #5e35b1;
        }

        /* Styling untuk link kembali */
        a {
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #7e57c2;
            transition: color 0.3s ease;
        }

        /* Memberikan efek hover pada link */
        a:hover {
            color: #5e35b1;
        }
    </style>
    <script>
        function validateForm() {
            let noMember = document.getElementById("no_member").value;
            let nama = document.getElementById("nama").value;
            let email = document.getElementById("email").value;
            let phone = document.getElementById("phone").value;
            let alamat = document.getElementById("alamat").value;
            let foto = document.getElementById("foto").value;

            // Periksa jika ada kolom yang kosong
            if (noMember == "" || nama == "" || email == "" || phone == "" || alamat == "" || foto == "") {
                alert("Semua kolom harus diisi, termasuk foto!");
                return false;
            }

            // Validasi format email
            let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (!emailPattern.test(email)) {
                alert("Format email tidak valid!");
                return false;
            }

            // Validasi nomor telepon (hanya angka)
            let phonePattern = /^[0-9]+$/;
            if (!phonePattern.test(phone)) {
                alert("Nomor telepon hanya boleh berisi angka!");
                return false;
            }

            // Validasi file foto
            let fileExtension = foto.split('.').pop().toLowerCase();
            let allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            if (!allowedExtensions.includes(fileExtension)) {
                alert("Hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan!");
                return false;
            }

            return true; // Form valid
        }
    </script>
</head>
<body>
    <div class="form-container">
        <h1>Tambah Data Member</h1>
        <form method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="no_member">Nomor Member:</label>
                <input type="text" name="no_member" id="no_member" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Telepon:</label>
                <input type="text" name="phone" id="phone" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea name="alamat" id="alamat" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="foto">Upload Foto:</label>
                <input type="file" name="foto" id="foto" accept="image/*" required>
            </div>
            <button type="submit">Simpan</button>
        </form>
        <a href="datam.php">Kembali</a>
    </div>
</body>
</html>
