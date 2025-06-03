<?php
session_start();
include __DIR__ . "/../server/database.php"; // Path to database.php

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: /server/login.php?msg=login_required");
    exit;
}

$id_user = $_SESSION['user_id'];

// Fetch user details
$sql_user = "SELECT fullname, username, email FROM user WHERE id_user = ?";
$stmt_user = $db->prepare($sql_user);
$user_data = null; // Initialize user_data
if ($stmt_user) {
    $stmt_user->bind_param("i", $id_user);
    $stmt_user->execute();
    $result_user = $stmt_user->get_result();
    $user_data = $result_user->fetch_assoc();
    $stmt_user->close();
}

// Fetch order history for the logged-in user
$sql_orders = "
SELECT
    o.id_order,
    GROUP_CONCAT(DISTINCT m.nama_menu SEPARATOR ', ') AS menu_items,
    SUM(oi.qty) AS total_quantity,
    o.total AS total_harga,
    o.status,
    o.tanggal
FROM orders o
JOIN order_items oi ON o.id_order = oi.id_order
JOIN menu m ON oi.id_menu = m.id_menu
WHERE o.id_user = ?
GROUP BY o.id_order
ORDER BY o.tanggal DESC
";

$stmt_orders = $db->prepare($sql_orders);
$orders = []; // Initialize orders array
if ($stmt_orders) {
    $stmt_orders->bind_param("i", $id_user);
    $stmt_orders->execute();
    $result_orders = $stmt_orders->get_result();
    $orders = $result_orders->fetch_all(MYSQLI_ASSOC);
    $stmt_orders->close();
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - Angkringan Sedulur</title>
    <link rel="stylesheet" href="/assets/style/navbar.css"> <link rel="stylesheet" href="/assets/style/footer.css"> <link rel="stylesheet" href="/assets/style/profile.css"> </head>
<body>
    <?php include __DIR__ . "/../layout/navbar.php"; ?>

    <div class="profile-container">
        <h1>Profil Saya</h1>

        <?php if ($user_data): ?>
        <div class="user-details">
            <p><strong>Nama Lengkap:</strong> <?= htmlspecialchars($user_data['fullname']) ?></p>
            <p><strong>Username:</strong> <?= htmlspecialchars($user_data['username']) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($user_data['email']) ?></p>
        </div>
        <?php else: ?>
        <p class="no-history">Gagal memuat informasi akun.</p>
        <?php endif; ?>

        <h2 class="transaction-history-title">Riwayat Transaksi</h2>
        <?php if (!empty($orders)): ?>
            <div class="table-responsive-wrapper"> <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>ID Pesanan</th>
                            <th>Menu Dipesan</th>
                            <th>Jumlah Item</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?= htmlspecialchars(date('d M Y, H:i', strtotime($order['tanggal']))) ?></td>
                                <td>#<?= htmlspecialchars($order['id_order']) ?></td>
                                <td><?= htmlspecialchars($order['menu_items']) ?></td>
                                <td><?= htmlspecialchars($order['total_quantity']) ?></td>
                                <td>Rp<?= htmlspecialchars(number_format($order['total_harga'], 0, ',', '.')) ?></td>
                                <td><?= htmlspecialchars(ucfirst($order['status'])) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="no-history">Anda belum memiliki riwayat transaksi.</p>
        <?php endif; ?>

        <div class="logout-btn-container">
            <a href="/server/logout.php" class="logout-btn">Logout</a>
        </div>
    </div>

    <?php include __DIR__ . "/../layout/footer.html"; ?>
    <script src="/assets/js/navbar.js"></script> </body>
</html>
<?php
if (isset($db)) {
    $db->close();
}
?>