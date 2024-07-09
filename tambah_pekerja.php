<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pekerja</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #343a40;
        }

        .container-form {
            width: 30%;
            height: 60vh;
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 10px;
            padding: 20px;
        }

        .navbar {
            background-color: #007bff !important;
            padding: 2%;
            border-radius: 15px;
            height: 60px;
            margin-bottom: 20px;
        }

        .navbar-brand {
            color: white;
            font-weight: bold;
            font-size: 1.5rem;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Back</a>
        </div>
    </nav>

    <div class="container d-flex justify-content-center align-items-center h-100">
        <div class="container-form">
            <h2 class="mb-4 text-center">ADD MAKLUMAT</h2>
            <form action="process_tambah.php" method="post" id="formTambah">
                <div class="form-group">
                    <label for="nokp">IC</label>
                    <input type="text" class="form-control" id="nokp" name="nokp" placeholder="Nombor Mykad" required>
                </div>
                <div class="form-group">
                    <label for="nama">NAMA</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Penuh" required>
                </div>
                <div class="form-group">
                    <label for="hp">HP</label>
                    <input type="text" class="form-control" id="hp" name="hp" placeholder="No Telefon" required>
                </div>
                <div class="form-group">
                    <label for="jantina">Jantina</label>
                    <select class="form-control" id="jantina" name="jantina" required>
                        <option value="">Pilih jantina...</option>
                        <option value="lelaki">Lelaki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Daftar</button>
                    <button type="button" class="btn btn-secondary" onclick="clearForm()">Clear</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function clearForm() {
            document.getElementById("formTambah").reset();
        }
    </script>
</body>

</html>
