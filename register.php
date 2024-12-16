<?php
// Membuat koneksi ke database
$servername = "localhost";
$username = "root";  // Gantilah dengan username database Anda
$password = "";      // Gantilah dengan password database Anda
$dbname = "uas_web"; // Gantilah dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengambil data yang dikirimkan melalui form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $confirm_password = isset($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';

    // Validasi apakah semua input telah diisi
    if (empty($username) || empty($password) || empty($confirm_password)) {
        echo "<script>alert('Semua kolom wajib diisi!');</script>";
    } elseif ($password !== $confirm_password) {
        // Validasi apakah password dan confirm password cocok
        echo "<script>alert('Password dan Confirm Password tidak cocok!');</script>";
    } else {
        // Query untuk menyimpan data ke dalam database menggunakan prepared statement
        $sql = "INSERT INTO register_page (user, password, confirm_password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sss", $username, $password, $confirm_password);
            if ($stmt->execute()) {
                echo "<script>alert('Pendaftaran berhasil! Akun Anda telah terdaftar.');</script>";
            } else {
                echo "<script>alert('Terjadi kesalahan: " . $stmt->error . "');</script>";
            }

            $stmt->close();
        } else {
            echo "<script>alert('Terjadi kesalahan pada persiapan query.');</script>";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* Reset default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        label {
            font-size: 16px;
            color: #333;
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input:focus {
            border-color: #3498db;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }

        .links {
            text-align: center;
            margin-top: 15px;
        }

        .links a {
            color: #3498db;
            text-decoration: none;
        }

        .links a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .container {
                padding: 20px;
                width: 90%;
            }

            h2 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Form Registrasi</h2>

        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <button type="submit">Register</button>
        </form>

        <div class="links">
            <a href="#">Already have an account? Login</a>
        </div>
    </div>

</body>
</html>