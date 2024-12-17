<?php
session_start();

// Pastikan pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login_page.php");
    exit();
}

// Contoh data riwayat pesanan (bisa diambil dari database)
$order_history = [
    ['id' => 1, 'product' => 'Lipstick', 'date' => '2024-06-10', 'status' => 'Delivered'],
    ['id' => 2, 'product' => 'Face Cream', 'date' => '2024-06-12', 'status' => 'Processing'],
    ['id' => 3, 'product' => 'Eyeliner', 'date' => '2024-06-15', 'status' => 'Shipped']
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #262626, #ffb398);
            margin: 0;
            padding: 0;
        }
        .container {
            width: 70%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #e17055;
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #e17055;
            color: white;
        }
        a {
            display: inline-block;
            text-decoration: none;
            color: #fff;
            background-color: #e17055;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Order History</h2>
    <table>
        <tr>
            <th>Order ID</th>
            <th>Product</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
        <?php foreach ($order_history as $order): ?>
        <tr>
            <td><?php echo $order['id']; ?></td>
            <td><?php echo $order['product']; ?></td>
            <td><?php echo $order['date']; ?></td>
            <td><?php echo $order['status']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <a href="user_dashboard.php">Back to Dashboard</a>
</div>
</body>
</html>
