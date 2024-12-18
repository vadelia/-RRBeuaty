<?php
// Koneksi ke database menggunakan MySQLi
$conn = new mysqli('localhost', 'root', '', 'uas_web');

// Periksa koneksi database
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error); // Tampilkan pesan error jika gagal
}

// Query untuk mengambil semua data dari tabel 'members'
$sql = "SELECT * FROM members";
$result = $conn->query($sql); // Eksekusi query
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Member</title>
    <style>
    /* Gaya dasar untuk body */
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #262626, #ffb398); /* Warna gradasi */
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    /* Judul halaman */
    h1 {
        margin-bottom: 20px;
        color: rgb(255, 255, 255);
        animation: fadeIn 1.5s ease-in-out; /* Animasi masuk lembut */
    }

    /* Container tabel */
    .table-container {
        width: 90%;
        max-width: 800px;
        margin: 20px 0;
        background: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        padding: 20px;
        position: relative;
        animation: slideUp 1s ease-in-out; /* Animasi naik */
    }

    /* Tabel */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    /* Header tabel */
    th {
        background-color: #262626;
        color: white;
        text-transform: uppercase;
        font-size: 14px;
    }

    /* Isi tabel */
    td {
        text-align: left;
        padding: 15px;
    }

    /* Warna baris genap */
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    /* Efek hover baris tabel */
    tr:hover {
        background-color: #f1f1f1;
        transition: background-color 0.3s ease; /* Transisi halus */
    }

    /* Gambar dalam tabel */
    .member-photo {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }

    /* Tombol aksi */
    .action-buttons {
        display: flex;
        gap: 10px;
    }

    /* Gaya tombol default */
    .btn {
        padding: 8px 12px;
        font-size: 14px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
    }

    /* Tombol edit */
    .btn-edit {
        background-color: #4CAF50;
        color: white;
    }

    /* Efek hover tombol edit */
    .btn-edit:hover {
        background-color: #45a049;
    }

    /* Tombol hapus */
    .btn-delete {
        background-color: #f44336;
        color: white;
    }

    /* Efek hover tombol hapus */
    .btn-delete:hover {
        background-color: #d32f2f;
    }

    /* Tombol tambah data */
    .btn-add {
        display: inline-block;
        padding: 10px 20px;
        background-color: #0A3981;
        color: white;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        text-align: center;
        margin-top: 10px;
    }

    /* Efek hover tombol tambah data */
    .btn-add:hover {
        background-color: #0056b3;
    }

    /* Animasi fade-in untuk judul */
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    /* Animasi slide-up untuk container tabel */
    @keyframes slideUp {
        from {
            transform: translateY(20px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
</style>
</head>
<body>
    <!-- Judul halaman -->
    <h1>Data Member</h1>

    <!-- Container untuk tabel data -->
    <div class="table-container">
        <table>
            <!-- Header tabel -->
            <tr>
                <th>No Member</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Alamat</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
            <!-- Jika ada data, tampilkan baris tabel -->
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['no_member'] ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['phone'] ?></td>
                        <td><?= $row['alamat'] ?></td>
                        <td>
                            <?php if ($row['foto']): ?>
                                <img src="uploads/<?= $row['foto'] ?>" alt="Foto <?= $row['nama'] ?>" class="member-photo">
                            <?php else: ?>
                                Tidak ada foto
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <!-- Tombol edit -->
                                <form style="display: inline;" action="edit.php" method="get">
                                    <input type="hidden" name="no_member" value="<?= $row['no_member'] ?>">
                                    <button type="submit" class="btn btn-edit">Edit</button>
                                </form>
                                <!-- Tombol hapus -->
                                <form style="display: inline;" action="delete.php" method="get" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    <input type="hidden" name="no_member" value="<?= $row['no_member'] ?>">
                                    <button type="submit" class="btn btn-delete">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <!-- Tampilkan pesan jika tidak ada data -->
                <tr>
                    <td colspan="7" style="text-align: center;">Tidak ada data.</td>
                </tr>
            <?php endif; ?>
        </table>
        <!-- Tombol tambah data -->
        <a href="add.php" class="btn-add">Tambah Data</a>
        <!-- Tombol kembali -->
        <a href="dashboard.php" class="btn-add" style="background-color: #d32f2f; text-align: center;">Kembali</a>
    </div>
</body>
</html>
<?php $conn->close(); // Tutup koneksi database ?>
