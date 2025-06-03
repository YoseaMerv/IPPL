<?php
$isLoggedIn = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/style/navbar.css">
    <title>Navbar</title>
</head>

<body>
    <div class="navbar">
        <ul>
            <li class="nav-home"><a href="/index.php">Beranda</a></li>
            <li class="nav-about"><a href="/includes/about.php">About</a></li>
            <li class="nav-menu"><a href="/includes/menu.php">Menu</a></li>
            <?php if ($isLoggedIn): ?>
                <li class="nav-profile"><a href="/includes/profile.php">Profil</a></li>
            <?php else: ?>
                <li class="login"><a href="/server/login.php">Login</a></li>
            <?php endif; ?>
            <?php
            $cart_count = isset($_SESSION["cart"]) ? array_sum($_SESSION["cart"]) : 0;
            ?>

            <li class="nav-item cart-nav">
                <a href="/includes/keranjang.php" class="cart-link">
                    🛒(<?= $cart_count ?>)
                </a>
            </li>
        </ul>

    </div>

    <section class="banner"></section>

    <script src="/assets/js/navbar.js"></script>
</body>

</html>