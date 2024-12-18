<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
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
    <h1>Data Pegawai</h1>
    <div class="table-container">
        <table>
            <tr>
                <th>No Pegawai</th>
                <th>Nama</th>
                <th>Phone</th>
                <th>Alamat</th>
                <th>Gambar</th> <!-- Kolom baru untuk menampilkan gambar -->
                <th>Aksi</th>
            </tr>
            <?php if ($result->num_rows > 0): // Periksa apakah ada data ?>
                <?php while ($row = $result->fetch_assoc()): // Looping data pegawai ?>
                    <tr>
                        <td><?= $row['no_pegawai'] ?></td>
                        <td><?= htmlspecialchars($row['nama_pegawai']) ?></td>
                        <td><?= htmlspecialchars($row['phone']) ?></td>
                        <td><?= htmlspecialchars($row['alamat']) ?></td>
                        <td>
                            <!-- Tampilkan gambar jika ada -->
                            <?php if (!empty($row['foto'])): ?>
                                <img src="uploads/<?= htmlspecialchars($row['foto']) ?>" alt="Foto Pegawai" style="width: 80px; height: auto; border-radius: 5px;">
                            <?php else: ?>
                                <span>Tidak ada gambar</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <!-- Form untuk edit -->
                                <form style="display: inline;" action="editp.php" method="get">
                                    <input type="hidden" name="no_pegawai" value="<?= $row['no_pegawai'] ?>">
                                    <button type="submit" class="btn btn-edit">Edit</button>
                                </form>
                                <!-- Form untuk hapus -->
                                <form style="display: inline;" action="deletep.php" method="get" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    <input type="hidden" name="no_pegawai" value="<?= $row['no_pegawai'] ?>">
                                    <button type="submit" class="btn btn-delete">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <!-- Jika tidak ada data -->
                <tr>
                    <td colspan="6" style="text-align: center;">Tidak ada data.</td>
                </tr>
            <?php endif; ?>
        </table>
        <!-- Tombol tambah data -->
        <a href="addp.php" class="btn-add">Tambah Data</a>
        <!-- Tombol kembali -->
        <a href="dashboard.php" class="btn-add" style="background-color: #d32f2f; text-align: center;">Kembali</a>
    </div>
</body>
</html>
<?php $conn->close(); // Tutup koneksi database ?>
