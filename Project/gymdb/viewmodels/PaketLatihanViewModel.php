<?php
require_once __DIR__ . "/../config/Database.php";

class PaketLatihanViewModel {
    private $db;
    private $table = "paket_latihan";

    public function __construct() {
        $this->db = Database::connect();
    }

    public function all() {
        return $this->db->query("SELECT * FROM {$this->table} ORDER BY id_paket DESC")->fetchAll(PDO::FETCH_OBJ);
    }

    public function find($id) {
        $st = $this->db->prepare("SELECT * FROM {$this->table} WHERE id_paket=?");
        $st->execute([$id]);
        return $st->fetchObject();
    }

    public function create($data) {
        $st = $this->db->prepare("INSERT INTO {$this->table} (nama_paket, durasi, harga) VALUES (?,?,?)");
        $st->execute([$data['nama_paket'], $data['durasi'] ?? null, $data['harga'] ?? 0]);
    }

    public function update($data) {
        $st = $this->db->prepare("UPDATE {$this->table} SET nama_paket=?, durasi=?, harga=? WHERE id_paket=?");
        $st->execute([$data['nama_paket'], $data['durasi'] ?? null, $data['harga'] ?? 0, $data['id_paket']]);
    }

    public function delete($id) {
        $st = $this->db->prepare("DELETE FROM {$this->table} WHERE id_paket=?");
        $st->execute([$id]);
    }
}
