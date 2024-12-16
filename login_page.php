<?php
// Mulai sesi
session_start();

// Koneksi ke database
$host = 'localhost';
$dbname = 'uas_web'; // Nama database Anda
$user = 'root'; // Username database Anda
$pass = ''; // Password database Anda

$conn = new mysqli($host, $user, $pass, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$error_message = '';

// Proses jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // Validasi input
    if (empty($username) || empty($password)) {
        $error_message = "Username atau password tidak boleh kosong!";
    } else {
        // Periksa username di database
        $sql = "SELECT * FROM login_page WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Periksa password (gunakan hash untuk keamanan!)
            if ($password === $user['password']) {
                // Login berhasil
                $_SESSION['username'] = $user['username'];

                // Simpan "Ingat saya" ke dalam cookie jika dicentang
                if (isset($_POST['remember'])) {
                    setcookie('username', $user['username'], time() + (86400 * 30), "/"); // 30 hari
                    setcookie('password', $user['password'], time() + (86400 * 30), "/");
                }

                header("Location: dashboard.php");
                exit();
            } else {
                $error_message = "Password salah!";
            }
        } else {
            $error_message = "Username tidak ditemukan!";
        }
    }
}

// Tutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login RR Beauty</title>
    <style>
        /* Tambahkan CSS Anda di sini */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #FFF0D1, #7e572b);
            color: #333;
        }

        .container {
            display: flex;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
        }

        .left-section {
            flex: 1;
            background: #7e572b;
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .left-section img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .left-section h1 {
            font-size: 1.5rem;
            color: #FFF0D1;
        }

        .right-section {
            flex: 1;
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .right-section h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #7e572b;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #5c4035;
        }

        .links {
            text-align: center;
            margin-top: 15px;
        }

        .links a {
            color: #7e572b;
            text-decoration: none;
            margin: 0 10px;
        }

        .links a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .left-section, .right-section {
                padding: 20px;
            }
        }
        .remember-me {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
    font-size: 0.9rem;
    color: #333;
}

.remember-me label {
    display: flex;
    align-items: center;
    gap: 10px; /* Spasi antara checkbox dan teks */
    cursor: pointer;
}

.remember-me input[type="checkbox"] {
    margin: 0;
    transform: scale(1.2); /* Membesarkan checkbox agar lebih terlihat */
}

    </style>
</head>
<body>
    <div class="container">
        <div class="left-section">
            <img src="source/kecantikan.jpg" alt="RR Beauty" />
            <h1>RR Beauty</h1>
        </div>
        <div class="right-section">
            <h2>Welcome!</h2>
            <?php if (!empty($error_message)) : ?>
                <p style="color: red; text-align: center;"><?php echo htmlspecialchars($error_message); ?></p>
            <?php endif; ?>
            <form method="POST" action="">
                <div class="form-group">
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group remember-me">
                    <label>
                        <input type="checkbox" name="remember"> Remember me
                    </label>
                </div>
                <div class="form-group">
                    <button type="submit">Login</button>
                </div>
            </form>
            <div class="links">
                <a href="#">Forgot password?</a>
                <a href="register.php">Create Account</a>
            </div>
        </div>
    </div>
</body>
</html>
