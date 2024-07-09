<?php
include 'db_connect.php';

if (!isset($_GET['id'])) {
    echo "ID pelajar tidak diberikan.";
    exit();
}

$id = $_GET['id'];

// Proses penghapusan data pelajar
$sql_delete = "DELETE FROM pekerja WHERE no_kp = ?";
$stmt_delete = $conn->prepare($sql_delete);

if ($stmt_delete === false) {
    die("Gagal menyediakan pernyataan SQL untuk penghapusan: " . $conn->error);
}

$stmt_delete->bind_param("s", $id);

if ($stmt_delete->execute()) {
    // Berjaya menghapuskan rekod, alihkan pengguna ke halaman index.php
    header("Location: index.php");
    exit();
} else {
    // Gagal menghapuskan rekod, tunjukkan mesej kesalahan
    echo "Gagal memadam rekod pelajar.";
}

$stmt_delete->close();
$conn->close();
?>
