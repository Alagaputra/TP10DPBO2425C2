<?php
require_once __DIR__ . "/../config/Database.php";

class JadwalLatihanViewModel {
    private $db;
    private $table = "jadwal_latihan";

    public function __construct() {
        $this->db = Database::connect();
    }

    public function all() {
        $sql = "SELECT j.*, m.nama AS member, p.nama AS pelatih, pk.nama_paket AS paket
                FROM jadwal_latihan j
                JOIN member m ON j.id_member = m.id_member
                JOIN pelatih p ON j.id_pelatih = p.id_pelatih
                JOIN paket_latihan pk ON j.id_paket = pk.id_paket
                ORDER BY id_jadwal DESC";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_OBJ);
    }

    public function create($data) {
        $st = $this->db->prepare("INSERT INTO jadwal_latihan (id_member, id_pelatih, id_paket, tanggal, jam) VALUES (?,?,?,?,?)");
        $st->execute([$data['id_member'], $data['id_pelatih'], $data['id_paket'], $data['tanggal'], $data['jam']]);
    }

    public function find($id) {
        $st = $this->db->prepare("SELECT * FROM {$this->table} WHERE id_jadwal=?");
        $st->execute([$id]);
        return $st->fetchObject();
    }

    public function update($data) {
        $st = $this->db->prepare("UPDATE {$this->table} SET id_member=?, id_pelatih=?, id_paket=?, tanggal=?, jam=? WHERE id_jadwal=?");
        $st->execute([$data['id_member'], $data['id_pelatih'], $data['id_paket'], $data['tanggal'], $data['jam'], $data['id_jadwal']]);
    }

    public function delete($id) {
        $st = $this->db->prepare("DELETE FROM {$this->table} WHERE id_jadwal=?");
        $st->execute([$id]);
    }

    // helper untuk dropdown
    public function members() {
        return $this->db->query("SELECT id_member, nama FROM member ORDER BY nama")->fetchAll(PDO::FETCH_OBJ);
    }
    public function pelatih() {
        return $this->db->query("SELECT id_pelatih, nama FROM pelatih ORDER BY nama")->fetchAll(PDO::FETCH_OBJ);
    }
    public function paket() {
        return $this->db->query("SELECT id_paket, nama_paket FROM paket_latihan ORDER BY nama_paket")->fetchAll(PDO::FETCH_OBJ);
    }
}
