<?php
require_once __DIR__ . "/../../viewmodels/MemberViewModel.php";
include __DIR__ . "/../style.php";
$vm = new MemberViewModel();
$edit = isset($_GET['id']) ? $vm->find($_GET['id']) : null;
?>
<?php include __DIR__ . "/../style.php"; ?>
<div class="container">
    <a href="index.php?page=member_list" class="row-actions btn-back">⬅ Kembali</a>
    <h2><?= $edit ? "Edit Member" : "Tambah Member" ?></h2>

    <form method="POST">
        <?php if ($edit): ?>
            <input type="hidden" name="id_member" value="<?= $edit->id_member ?>">
        <?php endif; ?>

        <div class="form-group">
            <label>Nama</label>
            <input name="nama" value="<?= htmlspecialchars($edit->nama ?? '') ?>">
        </div>

        <div class="form-group">
            <label>Usia</label>
            <input name="usia" type="number" value="<?= $edit->usia ?? '' ?>">
        </div>

        <div class="form-group">
            <label>Gender</label>
            <select name="gender">
                <option value="Laki-laki" <?= isset($edit) && $edit->gender=='Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="Perempuan" <?= isset($edit) && $edit->gender=='Perempuan' ? 'selected' : '' ?>>Perempuan</option>
            </select>
        </div>

        <button type="submit" name="<?= $edit ? 'update_member' : 'create_member' ?>"><?= $edit ? 'Update' : 'Simpan' ?></button>
    </form>
</div>
