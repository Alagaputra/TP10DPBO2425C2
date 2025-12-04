<?php
require_once __DIR__ . "/../../viewmodels/PelatihViewModel.php";
include __DIR__ . "/../style.php";
$vm = new PelatihViewModel();
$edit = isset($_GET['id']) ? $vm->find($_GET['id']) : null;
?>
<?php include __DIR__ . "/../style.php"; ?>
<div class="container">
    <a href="index.php?page=pelatih_list" class="row-actions btn-back">⬅ Kembali</a>
    <h2><?= $edit ? "Edit Pelatih" : "Tambah Pelatih" ?></h2>

    <form method="POST">
        <?php if ($edit): ?>
            <input type="hidden" name="id_pelatih" value="<?= $edit->id_pelatih ?>">
        <?php endif; ?>

        <div class="form-group">
            <label>Nama</label>
            <input name="nama" value="<?= htmlspecialchars($edit->nama ?? '') ?>">
        </div>

        <div class="form-group">
            <label>Spesialisasi</label>
            <input name="spesialisasi" value="<?= htmlspecialchars($edit->spesialisasi ?? '') ?>">
        </div>

        <button type="submit" name="<?= $edit ? 'update_pelatih' : 'create_pelatih' ?>"><?= $edit ? 'Update' : 'Simpan' ?></button>
    </form>
</div>
