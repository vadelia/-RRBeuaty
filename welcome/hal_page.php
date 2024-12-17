<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SALON RR BEUATY</title>
    <!-- Tambahkan Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <style>
    /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Background Gradient untuk Body */
body {
    font-family: 'Roboto', sans-serif;
    background: linear-gradient(135deg, #ffb398, #262626, #3a3a3a); /* Gradient lebih smooth */
    color: #f5f5f5;
    line-height: 1.6;
    background-attachment: fixed; /* Agar background tetap saat di-scroll */
}
/* Header & Navbar */
header {
    background: linear-gradient(135deg, #262626, #ffb398);
    padding: 10px 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo {
    font-family: 'Playfair Display', serif;
    font-size: 1.8em;
    font-weight: 600;
    color: #ffb398;
}

nav ul {
    list-style: none;
    display: flex;
}

nav ul li {
    margin-right: 20px;
}

nav ul li a {
    color: #f5f5f5;
    text-decoration: none;
    font-size: 1em;
    transition: 0.3s;
}

nav ul li a:hover {
    color: #ffb398;
}

.btn {
    background-color: #ffb398;
    color: #fff;
    padding: 8px 20px;
    text-decoration: none;
    border-radius: 20px;
    font-weight: bold;
}

/* Hero Section */
.hero {
    background: linear-gradient(135deg, #262626, #3a3a3a); /* Gradient pada Hero */
    padding: 40px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.hero .text {
    width: 50%;
}

.hero h1 {
    font-size: 3.5em;
    color: #ffb398;
    font-family: 'Playfair Display', serif;
    margin-bottom: 20px;
}

.hero h1 span {
    color: #ffb398;
}

.hero p {
    font-size: 1.2em;
    margin-bottom: 20px;
}

.get-btn {
    text-decoration: none;
    color: #ffb398;
    border: 2px solid #ffb398;
    padding: 10px 20px;
    border-radius: 20px;
    font-weight: bold;
    transition: 0.3s;
}

.get-btn:hover {
    background-color: #ffb398;
    color: #1e1e1e;
}

.hero .image img {
    width: 100%;
    border-radius: 10px;
}




.tagline {
    font-size: 1.8em;
    color: #ffb398;
    margin-top: 10px;
}

/* Footer */
/* Background Gradient untuk Footer */
footer {
    background: linear-gradient(135deg, #262626, #ffb398); /* Gradient terbalik di Footer */
    text-align: center;
    padding: 20px 10px;
    font-size: 0.9em;
    color: #f5f5f5;
}
footer a {
    text-decoration: none;
    color: #262626;
    font-weight: bold;
}
</style>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">RR BEAUTY</div>
                </div>
    </header>

    <main>
        <div class="hero">
            <div class="text">
                <h1><span>*</span> Blessing for every skin</h1>
                <p>Your miracle care for perfect skin</p>
                <a href="home_page.php" class="get-btn">GET YOURS</a>
            </div>
            <div class="image">
                <img src="source/look_makeup2.png" alt="Skin Care Model">
            </div>
        </div>
        </div>
    </main>

    <footer>
        <p>&copy; RR BEUATY</p>
        <a href="#">Salon Kecantikan</a>
    </footer>
</body>
</html>
