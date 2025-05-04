<?php
include __DIR__ . "/../server/database.php";
// Ambil data menu yang aktif
$sql = "SELECT * FROM menu WHERE status = 'aktif'";  // Menampilkan hanya menu dengan status aktif
$result = mysqli_query($db, $sql);
session_start();
include __DIR__ . "/../server/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_menu"])) {
  $id_menu = $_POST["id_menu"];
  if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
  }

  // Tambah jumlah jika sudah ada di keranjang
  if (isset($_SESSION["cart"][$id_menu])) {
    $_SESSION["cart"][$id_menu]++;
  } else {
    $_SESSION["cart"][$id_menu] = 1;
  }

  header("Location: menu.php");
  exit;
}

// Ambil data menu yang aktif
$sql = "SELECT * FROM menu WHERE status = 'aktif'";  // Hanya menu aktif yang diambil
$result = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Menu Makanan</title>
  <link rel="stylesheet" href="/../assets/style/menu.css">
</head>

<body>
  <?php include __DIR__ . "/../layout/navbar.php"; ?>

  <h1>Menu Makanan</h1>

  <div class="menu-container">
    <?php if ($result->num_rows > 0): ?>
      <?php while ($row = $result->fetch_assoc()): ?>
        <div class="menu-item">
          <img src="<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['nama_menu']) ?>">
          <h3><?= htmlspecialchars($row['nama_menu']) ?></h3>
          <div class="price">Rp. <?= number_format($row['harga'], 0, ',', '.') ?></div>
          <form action="../includes/keranjang.php" method="post">
            <input type="hidden" name="id_menu" value="<?= $row['id_menu'] ?>">
            <button type="submit" class="order-btn">Pesan Sekarang</button>
          </form>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p>Tidak ada menu tersedia.</p>
    <?php endif; ?>
  </div>

  <script src="menu.js"></script>
  <?php include __DIR__ . "/../layout/footer.html"; ?>
</body>

</html>

<?php
$db->close();
?>
