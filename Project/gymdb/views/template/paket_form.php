<?php
require_once __DIR__ . "/../../viewmodels/PaketLatihanViewModel.php";
include __DIR__ . "/../style.php";
$vm = new PaketLatihanViewModel();
$edit = isset($_GET['id']) ? $vm->find($_GET['id']) : null;
?>
<?php include __DIR__ . "/../style.php"; ?>
<div class="container">
    <a href="index.php?page=paket_list" class="row-actions btn-back">⬅ Kembali</a>
    <h2><?= $edit ? "Edit Paket" : "Tambah Paket" ?></h2>

    <form method="POST">
        <?php if ($edit): ?>
            <input type="hidden" name="id_paket" value="<?= $edit->id_paket ?>">
        <?php endif; ?>

        <div class="form-group">
            <label>Nama Paket</label>
            <input name="nama_paket" value="<?= htmlspecialchars($edit->nama_paket ?? '') ?>">
        </div>

        <div class="form-group">
            <label>Durasi</label>
            <input name="durasi" value="<?= htmlspecialchars($edit->durasi ?? '') ?>">
        </div>

        <div class="form-group">
            <label>Harga</label>
            <input name="harga" type="number" value="<?= $edit->harga ?? 0 ?>">
        </div>

        <button type="submit" name="<?= $edit ? 'update_paket' : 'create_paket' ?>"><?= $edit ? 'Update' : 'Simpan' ?></button>
    </form>
</div>
