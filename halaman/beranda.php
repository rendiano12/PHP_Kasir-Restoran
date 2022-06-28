<!-- Search & Tambah -->
<div class="d-flex flex-wrap justify-content-between">
    <nav class="navbar navbar-light">
        <form action="index.php" method="GET" class="form-inline d-flex">
            <input class="form-control mx-sm-2" type="search" autocomplete="off" name="key-search" placeholder="Cari..">
            <button class="btn btn-success mx-2" name="search">Search</button>
        </form>
    </nav>
    <?php if (isset($_SESSION["akun-admin"])) { ?>
    <nav class="navbar navbar-light">
        <a class="btn btn-success fw-bold mx-2" href="tambah.php">+ Tambah Menu Masakan</a>
    </nav>
    <?php } ?>
</div>
<!-- Pemesanan -->
<form action="index.php" method="POST">
    <div class="d-flex">
        <input class="form-control mx-sm-2 my-2 w-auto" type="text" name="pelanggan" placeholder="Nama Pelanggan" required autocomplete="off">
        <button class="btn btn-success my-2 mx-2" name="pesan">Pesan</button>
    </div>
<!-- Menu Masakan -->
<div class="row">
    <?php 
    $i = 1;
    foreach ($menu as $m) { ?>
        <div class="col-sm-4 mx-auto m-2">
            <div class="card">
                <h5 class="card-header bg-info"><?= $m["nama"]; ?></h5>
                <div class="card-body">
                    <p><img class="rounded" src="src/img/<?= $m["gambar"]; ?>" width="150"></p>
                    <input type="hidden" name="kode_menu<?= $i; ?>" value="<?= $m["kode_menu"]; ?>">
                    <table class="table table-striped table-responsive-sm">
                        <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td class="card-text">Rp<?= $m["harga"]; ?></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>:</td>
                            <td class="card-text"><?= $m["kategori"]; ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td class="card-text"><?= $m["status"]; ?></td>
                        </tr>
                        <tr>
                            <td>Qty</td>
                            <td>:</td>
                            <td class="card-text"><input min="0" type="number" name="qty<?= $i; ?>"></td>
                        </tr>
                    </table>
                    <?php if (isset($_SESSION["akun-admin"])) { ?>
                    <p>
                        <a class="btn btn-lg btn-warning" title="Edit" href="edit.php?id_menu=<?= $m["id_menu"]; ?>">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                        <a class="btn btn-lg btn-danger" title="Hapus" href="hapus.php?id_menu=<?= $m["id_menu"]; ?>" onclick="return confirm('Ingin Menghapus Menu?')">
                            <i class="bi bi-trash3-fill"></i>
                        </a>
                    </p>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php $i++; } ?>
    </form>
</div>