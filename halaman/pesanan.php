<table class="table table-bordered table-hover" style="margin-top: 100px;">
    <tr class="text-bg-success">
        <th>No</th>
        <th>Kode Pesanan</th>
        <th>Nama Pelanggan</th>
        <th>Kode Menu</th>
        <th>Qty</th>
    </tr>
    <?php $i = 1; foreach ($menu as $m) { ?>
        <tr style="background-color: white;">
            <td><?= $i; ?></td>
            <td><?= $m["kode_pesanan"]; ?></td>
            <td><?= $m["nama_pelanggan"]; ?></td>
            <td><?= $m["kode_menu"]; ?></td>
            <td><?= $m["qty"]; ?></td>
        </tr>
    <?php $i++; } ?>
</table>