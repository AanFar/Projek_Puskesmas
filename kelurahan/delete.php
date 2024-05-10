<?php
// Memanggil file koneksi database
require '../dbkoneksi.php';

// Memeriksa apakah parameter id telah diterima dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data periksa berdasarkan pasien_id
    $sql = "DELETE FROM periksa WHERE pasien_id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);

    // Query untuk menghapus data pasien berdasarkan id
    $sql = "DELETE FROM pasien WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);

    // Redirect ke halaman index.php setelah proses penghapusan selesai
    header("Location: index.php");
    exit();
} else {
    echo "Parameter ID tidak ditemukan.";
    exit;
}
