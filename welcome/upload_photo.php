<?php
session_start();
require 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_image'])) {
    $user_id = $_SESSION['user_id'];
    $target_dir = "images/";
    $image_name = basename($_FILES["profile_image"]["name"]);
    $target_file = $target_dir . uniqid() . "_" . $image_name;
    $upload_ok = 1;
    $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validasi file gambar
    $check = getimagesize($_FILES["profile_image"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $upload_ok = 0;
    }

    // Batasi tipe file
    if (!in_array($image_file_type, ["jpg", "jpeg", "png", "gif"])) {
        echo "Only JPG, JPEG, PNG & GIF files are allowed.";
        $upload_ok = 0;
    }

    // Batasi ukuran file (contoh: maksimum 2MB)
    if ($_FILES["profile_image"]["size"] > 2 * 1024 * 1024) {
        echo "File size exceeds the maximum limit of 2MB.";
        $upload_ok = 0;
    }

    if ($upload_ok === 1) {
        // Pindahkan file
        if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
            // Update database
            $sql = "UPDATE users SET profile_image = ? WHERE user_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $target_file, $user_id);
            if ($stmt->execute()) {
                $_SESSION['profile_image'] = $target_file;
                header("Location: user_dashboard.php");
                exit();
            } else {
                echo "Database error: " . $conn->error;
            }
        } else {
            echo "Error uploading the file.";
        }
    }
}
?>
