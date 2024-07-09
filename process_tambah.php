<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nokp = $_POST['nokp'];
    $nama = $_POST['nama'];
    $hp = $_POST['hp'];
    $jantina = $_POST['jantina'];


    $sql = "INSERT INTO pekerja (no_kp, nama_pekerja, no_hp, jantina ) VALUES (?, ?, ?, ? )";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Gagal menyediakan pernyataan SQL: " . $conn->error);
    }

    $stmt->bind_param("ssss", $nokp, $nama, $hp, $jantina );

    if ($stmt->execute()) {
        echo "<script>alert('Pelajar berjaya didaftarkan'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Gagal mendaftarkan pelajar'); window.location.href='tambah_pelajar.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
