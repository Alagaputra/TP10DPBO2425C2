<?php
require_once __DIR__ . "/../../viewmodels/JadwalLatihanViewModel.php";
include __DIR__ . "/../style.php";
$vm = new JadwalLatihanViewModel();
$rows = $vm->all();
?>
<?php include __DIR__ . "/../style.php"; ?>
<div class="container">
    <a href="index.php" class="row-actions btn-back">⬅ Menu Utama</a>
    <h2>Daftar Jadwal Latihan</h2>
    <a href="index.php?page=jadwal_form" class="row-actions btn-add">+ Tambah Jadwal</a>
    <table class="table">
        <thead><tr><th>ID</th><th>Member</th><th>Pelatih</th><th>Paket</th><th>Tanggal</th><th>Jam</th><th>Aksi</th></tr></thead>
        <tbody>
        <?php foreach($rows as $r): ?>
            <tr>
                <td><?= $r->id_jadwal ?></td>
                <td><?= htmlspecialchars($r->member) ?></td>
                <td><?= htmlspecialchars($r->pelatih) ?></td>
                <td><?= htmlspecialchars($r->paket) ?></td>
                <td><?= $r->tanggal ?></td>
                <td><?= $r->jam ?></td>
                <td class="row-actions">
                    <a class="btn-edit" href="index.php?page=jadwal_form&id=<?= $r->id_jadwal ?>">Edit</a>
                    <a class="btn-del" href="index.php?page=jadwal_delete&id=<?= $r->id_jadwal ?>" onclick="return confirm('Hapus?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
