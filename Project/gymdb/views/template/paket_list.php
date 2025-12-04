<?php
include __DIR__ . "/../style.php";
require_once __DIR__ . "/../../viewmodels/PaketLatihanViewModel.php";
$vm = new PaketLatihanViewModel();
$rows = $vm->all();
?>
<?php include __DIR__ . "/../style.php"; ?>
<div class="container">
    <a href="index.php" class="row-actions btn-back">⬅ Menu Utama</a>
    <h2>Daftar Paket Latihan</h2>
    <a href="index.php?page=paket_form" class="row-actions btn-add">+ Tambah Paket</a>
    <table class="table">
        <thead><tr><th>ID</th><th>Nama Paket</th><th>Durasi</th><th>Harga</th><th>Aksi</th></tr></thead>
        <tbody>
        <?php foreach($rows as $r): ?>
            <tr>
                <td><?= $r->id_paket ?></td>
                <td><?= htmlspecialchars($r->nama_paket) ?></td>
                <td><?= htmlspecialchars($r->durasi) ?></td>
                <td><?= number_format($r->harga,0,",",".") ?></td>
                <td class="row-actions">
                    <a class="btn-edit" href="index.php?page=paket_form&id=<?= $r->id_paket ?>">Edit</a>
                    <a class="btn-del" href="index.php?page=paket_delete&id=<?= $r->id_paket ?>" onclick="return confirm('Hapus?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
