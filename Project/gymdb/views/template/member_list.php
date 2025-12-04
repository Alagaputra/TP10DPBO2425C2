<?php
require_once __DIR__ . "/../../viewmodels/MemberViewModel.php";
include __DIR__ . "/../style.php";
$vm = new MemberViewModel();
$rows = $vm->all();
?>
<?php include __DIR__ . "/../style.php"; ?>
<div class="container">
    <a href="index.php" class="row-actions btn-back">⬅ Menu Utama</a>
    <h2>Daftar Member</h2>
    <a href="index.php?page=member_form" class="row-actions btn-add">+ Tambah Member</a>
    <table class="table">
        <thead><tr><th>ID</th><th>Nama</th><th>Usia</th><th>Gender</th><th>Aksi</th></tr></thead>
        <tbody>
        <?php foreach($rows as $r): ?>
            <tr>
                <td><?= $r->id_member ?></td>
                <td><?= htmlspecialchars($r->nama) ?></td>
                <td><?= $r->usia ?></td>
                <td><?= $r->gender ?></td>
                <td class="row-actions">
                    <a class="btn-edit" href="index.php?page=member_form&id=<?= $r->id_member ?>">Edit</a>
                    <a class="btn-del" href="index.php?page=member_delete&id=<?= $r->id_member ?>" onclick="return confirm('Hapus?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
