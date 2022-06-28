<?php

session_start();

require_once "function.php";

if (!isset($_SESSION["akun-admin"])) {
    if (isset($_SESSION["akun-user"])) {
        echo "<script>
            alert('Edit data hanya berlaku untuk admin!');
            location.href = 'index.php';
        </script>";
        exit;
    } else {
        header("Location: login.php");
        exit;
    }
}



if (isset($_POST["edit"])) {

    $edit = edit_data_menu();

    if ($edit > 0) {

        echo "<script>

                alert('Data berhasil diubah!');

                location.href = 'index.php';

            </script>";

    } else if ($edit == 0) {

        echo "<script>

                alert('Data tidak ada yang diubah!');

                location.href = 'index.php';

            </script>";

    } else {

        echo "<script>

                alert('Data gagal diubah!');

                location.href = 'index.php';

            </script>";

    }

}

$id_menu = $_GET["id_menu"];

$menu = ambil_data("SELECT * FROM menu WHERE id_menu = $id_menu")[0];

?>



<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./src/css/bootstrap-5.2.0/css/bootstrap.min.css">

    <title>Edit Data</title>

</head>



<body>

    <div class="container">

        <h1>Edit Data Masakan</h1>

        <a class="btn btn-success fw-bold" href="index.php">Kembali</a>

        <form action="edit.php" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id_menu" value="<?= $menu["id_menu"]; ?>">

            <input type="hidden" name="gambar-lama" value="<?= $menu["gambar"]; ?>">

            <input type="hidden" name="kode_menu" value="<?= $menu["kode_menu"]; ?>">

            <div class="table-responsive-md my-3">

                <table class="table">

                    <tr>

                        <td><label for="nama">Nama Makanan</label></td>

                        <td>:</td>

                        <td><input type="text" name="nama" id="nama" value="<?= $menu["nama"]; ?>" required></td>

                    </tr>

                    <tr>

                        <td><label for="harga">Harga</label></td>

                        <td>:</td>

                        <td><input min="0" type="number" name="harga" id="harga" value="<?= $menu["harga"]; ?>" required></td>

                    </tr>

                    <tr>

                        <td><label for="gambar">Gambar</label></td>

                        <td>:</td>

                        <td>

                            <img src="src/img/<?= $menu["gambar"]; ?>" width="70"><br><br>

                            <input type="file" name="gambar" accept="image/*">

                        </td>

                    </tr>

                    <tr>

                        <td><label for="kategori">Kategori</label></td>

                        <td>:</td>

                        <td>

                            <select name="kategori" id="kategori">

                                <option value="Makanan" <?= $menu["kategori"] == "Makanan" ? "selected" : ""; ?>>Makanan</option>

                                <option value="Fast Food" <?= $menu["kategori"] == "Fast Food" ? "selected" : ""; ?>>Fast Food</option>

                                <option value="Snack" <?= $menu["kategori"] == "Snack" ? "selected" : ""; ?>>Snack</option>

                                <option value="Dessert" <?= $menu["kategori"] == "Dessert" ? "selected" : ""; ?>>Dessert</option>

                                <option value="Minuman" <?= $menu["kategori"] == "Minuman" ? "selected" : ""; ?>>Minuman</option>

                            </select>

                        </td>

                    </tr>

                    <tr>

                        <td><label for="status">Status</label></td>

                        <td>:</td>

                        <td>

                            <label for="tersedia"><input type="radio" name="status" id="tersedia" value="tersedia" <?= $menu["status"] == "tersedia" ? "checked" : ""; ?>>Tersedia</label>

                            <label for="tidak-tersedia"><input type="radio" name="status" id="tidak-tersedia" value="tidak tersedia" <?= $menu["status"] == "tidak tersedia" ? "checked" : ""; ?>>Tidak Tersedia</label>

                        </td>

                    </tr>

                    <tr>

                        <td></td>

                        <td></td>

                        <td><button class="btn btn-primary" name="edit">Edit</button></td>

                    </tr>

                </table>

            </div>

        </form>

    </div>

    <script src="./src/css/bootstrap-5.2.0/js/bootstrap.bundle.min.js"></script>

</body>



</html>