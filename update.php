<?php
include 'db_connect.php';

// Pastikan ada parameter id yang diberikan melalui URL
if (!isset($_GET['id'])) {
    echo "ID pelajar tidak diberikan.";
    exit();
}

$id = $_GET['id'];

// Dapatkan maklumat pelajar dari pangkalan data berdasarkan ID
$sql = "SELECT * FROM pekerja WHERE no_kp = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Gagal menyediakan pernyataan SQL: " . $conn->error);
}

$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Tiada rekod pelajar ditemui.";
    exit();
}

$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_kp = $_POST['new_kp'];
    $nama = $_POST['nama'];
    $hp = $_POST['hp'];
    $jantina = $_POST['jantina'];

    // Kemaskini rekod pekerja berdasarkan no_kp
    $sql_update = "UPDATE pekerja SET no_kp = ?, nama_pekerja = ?, no_hp = ?, jantina = ? WHERE no_kp = ?";
    $stmt_update = $conn->prepare($sql_update);

    if ($stmt_update === false) {
        die("Gagal menyediakan pernyataan SQL untuk pengemaskinian: " . $conn->error);
    }

    $stmt_update->bind_param("sssss", $new_kp, $nama, $hp, $jantina, $id);

    if ($stmt_update->execute()) {
        // Berjaya mengemas kini rekod, alihkan pengguna ke halaman index.php dengan ID pelajar yang dikemaskini
        header("Location: index.php?id=" . $new_kp);
        exit();
    } else {
        // Gagal mengemas kini rekod, tunjukkan mesej kesalahan
        echo "Gagal mengemaskini rekod pelajar.";
    }

    $stmt_update->close();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelajar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Edit Maklumat Pelajar</h2>
    <form method="POST">

        <div class="form-group">
            <label for="new_kp">IC</label>
            <input type="text" class="form-control" id="new_kp" name="new_kp" value="<?php echo htmlspecialchars($row['no_kp']); ?>" required>
        </div>
        <div class="form-group">
            <label for="nama">NAMA</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($row['nama_pekerja']); ?>" required>
        </div>
        <div class="form-group">
            <label for="hp">HP</label>
            <input type="text" class="form-control" id="hp" name="hp" value="<?php echo htmlspecialchars($row['no_hp']); ?>" required>
        </div>
        <div class="form-group">
            <label for="jantina">Jantina</label>
            <select class="form-control" id="jantina" name="jantina" required>
                <option value="lelaki" <?php if ($row['jantina'] == 'lelaki') echo 'selected'; ?>>Lelaki</option>
                <option value="perempuan" <?php if ($row['jantina'] == 'perempuan') echo 'selected'; ?>>Perempuan</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Kemaskini</button>
        <a href="index.php" class="btn btn-secondary ml-2">Batal</a>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
