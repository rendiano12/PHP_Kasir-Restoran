<?php 
require_once "../function.php";

$kode = $_GET["kode_pesanan"];
$menu = ambil_data("SELECT DISTINCT * FROM pesanan 
                    JOIN transaksi ON (pesanan.kode_pesanan = transaksi.kode_pesanan) 
                    JOIN menu ON (menu.kode_menu = pesanan.kode_menu) 
                    WHERE transaksi.kode_pesanan = '$kode'
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $menu[0]["nama_pelanggan"]; ?></title>
    <style>
        .daftar-pesanan, .daftar-pesanan tr > td, .daftar-pesanan tr > th {
            border: 1px solid black;
            border-collapse: collapse;
            width: 100%;
        }

        .pembayaran tr > th {
            text-align: start;
        }

        .pembayaran {
            float: right;
        }
    </style>
</head>
<body>
    <h1 align="center">Bukti Pembayaran</h1>
    <table class="data-pelanggan">
        <tr>
            <td>Atas Nama</td>
            <td>:</td>
            <td><?= $menu[0]["nama_pelanggan"]; ?></td>
        </tr>
        <tr>
            <td>Waktu</td>
            <td>:</td>
            <td><?= $menu[0]["waktu"]; ?></td>
        </tr>
    </table><br>
    <table class="daftar-pesanan" cellpadding="5">
        <tr>
            <th>Daftar Menu</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Total</th>
        </tr>
        <?php 
        $total_semuanya = 0;
        foreach ($menu as $m) { ?>
            <tr>
                <td><?= $m["nama"]; ?></td>
                <td>Rp.<?= $m["harga"]; ?></td>
                <td><?= $m["qty"]; ?></td>
                <td>Rp.<?= $m["harga"] * $m["qty"]; ?></td>
            </tr>
        <?php $total_semuanya += $m["harga"] * $m["qty"];  
        } ?>
    </table><br>
    <table class="pembayaran" cellpadding="3">
        <tr>
            <th>Total Semuanya</th>
            <th>:</th>
            <th>Rp.<?= $total_semuanya; ?></th>
        </tr>
        <?php if ((int) $_GET["pembayaran"] >= $total_semuanya) { ?>
            <tr>
                <th>Bayar</th>
                <th>:</th>
                <th>Rp.<?= (int) $_GET["pembayaran"]; ?></th>
            </tr>
            <tr>
                <th>Kembali</th>
                <th>:</th>
                <th>Rp.<?= (int) $_GET["pembayaran"] - $total_semuanya; ?></th>
            </tr>
        <?php } else { ?>
            <tr>
                <th>Bayar</th>
                <th>:</th>
                <th>Pembayaran Masih Kurang</th>
            </tr>
        <?php } ?>
    </table>
</body>
</html>