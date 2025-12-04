<?php
require_once __DIR__ . "/../config/Database.php";

class PelatihViewModel {
    private $db;
    private $table = "pelatih";

    public function __construct() {
        $this->db = Database::connect();
    }

    public function all() {
        return $this->db->query("SELECT * FROM {$this->table} ORDER BY id_pelatih DESC")->fetchAll(PDO::FETCH_OBJ);
    }

    public function find($id) {
        $st = $this->db->prepare("SELECT * FROM {$this->table} WHERE id_pelatih=?");
        $st->execute([$id]);
        return $st->fetchObject();
    }

    public function create($data) {
        $st = $this->db->prepare("INSERT INTO {$this->table} (nama, spesialisasi) VALUES (?,?)");
        $st->execute([$data['nama'], $data['spesialisasi'] ?? null]);
    }

    public function update($data) {
        $st = $this->db->prepare("UPDATE {$this->table} SET nama=?, spesialisasi=? WHERE id_pelatih=?");
        $st->execute([$data['nama'], $data['spesialisasi'] ?? null, $data['id_pelatih']]);
    }

    public function delete($id) {
        $st = $this->db->prepare("DELETE FROM {$this->table} WHERE id_pelatih=?");
        $st->execute([$id]);
    }
}
