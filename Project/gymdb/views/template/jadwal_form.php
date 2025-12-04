<?php
require_once __DIR__ . "/../../viewmodels/JadwalLatihanViewModel.php";
include __DIR__ . "/../style.php";

$vm = new JadwalLatihanViewModel();
$edit = isset($_GET['id']) ? $vm->find($_GET['id']) : null;

$members = $vm->members();
$pelatih = $vm->pelatih();
$paket = $vm->paket();
?>
<?php include __DIR__ . "/../style.php"; ?>
<div class="container">
    <a href="index.php?page=jadwal_list" class="row-actions btn-back">⬅ Kembali</a>
    <h2><?= $edit ? "Edit Jadwal" : "Tambah Jadwal" ?></h2>

    <form method="POST">
        <?php if ($edit): ?>
            <input type="hidden" name="id_jadwal" value="<?= $edit->id_jadwal ?>">
        <?php endif; ?>

        <div class="form-group">
            <label>Member</label>
            <select name="id_member">
                <?php foreach($members as $m): ?>
                    <option value="<?= $m->id_member ?>" <?= isset($edit) && $edit->id_member==$m->id_member ? 'selected' : '' ?>><?= htmlspecialchars($m->nama) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Pelatih</label>
            <select name="id_pelatih">
                <?php foreach($pelatih as $p): ?>
                    <option value="<?= $p->id_pelatih ?>" <?= isset($edit) && $edit->id_pelatih==$p->id_pelatih ? 'selected' : '' ?>><?= htmlspecialchars($p->nama) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Paket</label>
            <select name="id_paket">
                <?php foreach($paket as $pk): ?>
                    <option value="<?= $pk->id_paket ?>" <?= isset($edit) && $edit->id_paket==$pk->id_paket ? 'selected' : '' ?>><?= htmlspecialchars($pk->nama_paket) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="<?= $edit->tanggal ?? date('Y-m-d') ?>">
        </div>

        <div class="form-group">
            <label>Jam</label>
            <input type="time" name="jam" value="<?= $edit->jam ?? '07:00' ?>">
        </div>

        <button type="submit" name="<?= $edit ? 'update_jadwal' : 'create_jadwal' ?>"><?= $edit ? 'Update' : 'Simpan' ?></button>
    </form>
</div>
