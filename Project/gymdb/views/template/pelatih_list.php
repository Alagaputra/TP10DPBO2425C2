<?php
require_once __DIR__ . "/../../viewmodels/PelatihViewModel.php";
include __DIR__ . "/../style.php";
$vm = new PelatihViewModel();
$rows = $vm->all();
?>
<?php include __DIR__ . "/../style.php"; ?>
<div class="container">
    <a href="index.php" class="row-actions btn-back">⬅ Menu Utama</a>
    <h2>Daftar Pelatih</h2>
    <a href="index.php?page=pelatih_form" class="row-actions btn-add">+ Tambah Pelatih</a>
    <table class="table">
        <thead><tr><th>ID</th><th>Nama</th><th>Spesialisasi</th><th>Aksi</th></tr></thead>
        <tbody>
        <?php foreach($rows as $r): ?>
            <tr>
                <td><?= $r->id_pelatih ?></td>
                <td><?= htmlspecialchars($r->nama) ?></td>
                <td><?= htmlspecialchars($r->spesialisasi) ?></td>
                <td class="row-actions">
                    <a class="btn-edit" href="index.php?page=pelatih_form&id=<?= $r->id_pelatih ?>">Edit</a>
                    <a class="btn-del" href="index.php?page=pelatih_delete&id=<?= $r->id_pelatih ?>" onclick="return confirm('Hapus?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
