<?php

// Centralized action handling for MVVM project
// 1) MEMBER
// MEMBER ACTIONS
if (isset($_POST['create_member']) || isset($_POST['update_member'])) {
    require_once __DIR__ . "/viewmodels/MemberViewModel.php";
    $vm = new MemberViewModel();
    
    if (isset($_POST['create_member'])) {
        $vm->create($_POST);
    } else {
        $vm->update($_POST);
    }

    header("Location: index.php?page=member_list");
    exit;
}

// DELETE MEMBER
if (isset($_GET['page']) && $_GET['page'] === "member_delete") {
    require_once __DIR__ . "/viewmodels/MemberViewModel.php";
    (new MemberViewModel())->delete($_GET['id']);
    header("Location: index.php?page=member_list");
    exit;
}

// 2) PELATIH
if (isset($_POST['create_pelatih']) || isset($_POST['update_pelatih'])) {
    require_once __DIR__ . "/viewmodels/PelatihViewModel.php";
    $vm = new PelatihViewModel();
    if (isset($_POST['create_pelatih'])) $vm->create($_POST);
    else $vm->update($_POST);
    header("Location: index.php?page=pelatih_list");
    exit;
}
if (isset($_GET['page']) && $_GET['page'] == "pelatih_delete") {
    require_once __DIR__ . "/viewmodels/PelatihViewModel.php";
    (new PelatihViewModel())->delete($_GET['id']);
    header("Location: index.php?page=pelatih_list");
    exit;
}

// 3) PAKET
if (isset($_POST['create_paket']) || isset($_POST['update_paket'])) {
    require_once __DIR__ . "/viewmodels/PaketLatihanViewModel.php";
    $vm = new PaketLatihanViewModel();
    if (isset($_POST['create_paket'])) $vm->create($_POST);
    else $vm->update($_POST);
    header("Location: index.php?page=paket_list");
    exit;
}
if (isset($_GET['page']) && $_GET['page'] == "paket_delete") {
    require_once __DIR__ . "/viewmodels/PaketLatihanViewModel.php";
    (new PaketLatihanViewModel())->delete($_GET['id']);
    header("Location: index.php?page=paket_list");
    exit;
}

// 4) JADWAL
if (isset($_POST['create_jadwal']) || isset($_POST['update_jadwal'])) {
    require_once __DIR__ . "/viewmodels/JadwalLatihanViewModel.php";
    $vm = new JadwalLatihanViewModel();
    if (isset($_POST['create_jadwal'])) $vm->create($_POST);
    else $vm->update($_POST);
    header("Location: index.php?page=jadwal_list");
    exit;
}
if (isset($_GET['page']) && $_GET['page'] == "jadwal_delete") {
    require_once __DIR__ . "/viewmodels/JadwalLatihanViewModel.php";
    (new JadwalLatihanViewModel())->delete($_GET['id']);
    header("Location: index.php?page=jadwal_list");
    exit;
}

include __DIR__ . "/views/style.php";

// ROUTING: pages
$page = $_GET['page'] ?? 'home';
switch ($page) {
    case 'member_list': include __DIR__ . "/views/template/member_list.php"; break;
    case 'member_form': include __DIR__ . "/views/template/member_form.php"; break;

    case 'pelatih_list': include __DIR__ . "/views/template/pelatih_list.php"; break;
    case 'pelatih_form': include __DIR__ . "/views/template/pelatih_form.php"; break;

    case 'paket_list': include __DIR__ . "/views/template/paket_list.php"; break;
    case 'paket_form': include __DIR__ . "/views/template/paket_form.php"; break;

    case 'jadwal_list': include __DIR__ . "/views/template/jadwal_list.php"; break;
    case 'jadwal_form': include __DIR__ . "/views/template/jadwal_form.php"; break;

    default:
        // simple dashboard
        echo '<div style="max-width:900px;margin:30px auto;">';
        echo '<h1>Gym Management - Dashboard</h1>';
        echo '<a href="index.php?page=member_list" class="row-actions btn-add">Kelola Member</a> ';
        echo '<a href="index.php?page=pelatih_list" class="row-actions btn-add">Kelola Pelatih</a> ';
        echo '<a href="index.php?page=paket_list" class="row-actions btn-add">Kelola Paket</a> ';
        echo '<a href="index.php?page=jadwal_list" class="row-actions btn-add">Kelola Jadwal</a>';
        echo '</div>';
}
