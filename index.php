<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman PHP dengan Navbar dan Senarai Pekerja</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #343a40;
        }

        .navbar {
            padding: 2% 2%;
            margin: 2% 2%;
            border-radius: 15px;
            height: 60px; /* Tinggi navbar */
        }

        .navbar-brand {
            margin-right: 10px;
        }

        .btn-light {
            margin-right: 10px;
        }

        .table {
            margin: 2% auto; /* Pusatkan tabel horizontal dengan margin atas dan bawah 2% */
            border-radius: 20%;
            width: 100%; /* Lebar tabel 100% */
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <span class="navbar-brand">ANISHOLDINGS SDN BHD</span>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="btn btn-light" href="tambah_pekerja.php">ADD</a> <!-- Butang ADD -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 text-center">
        <h1 class="mb-4 text-light">Senarai Pekerja</h1>

        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAMA PEKERJA</th>
                    <th>NO KP</th>
                    <th>JANTINA</th>
                    <th>NO HP</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM pekerja";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nama_pekerja']}</td>
                            <td>{$row['no_kp']}</td>
                            <td>{$row['jantina']}</td>
                            <td>{$row['no_hp']}</td>
                            <td>
                                <a href='update.php?id={$row['no_kp']}' class='btn btn-primary btn-sm mr-2'>Update</a>
                                <a href='delete.php?id={$row['no_kp']}' class='btn btn-danger btn-sm'>Delete</a>
                            </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>Tiada data</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>
