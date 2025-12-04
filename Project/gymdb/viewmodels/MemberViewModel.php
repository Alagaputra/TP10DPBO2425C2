<?php
require_once __DIR__ . "/../config/Database.php";

class MemberViewModel {
    private $db;
    private $table = "member";

    public function __construct() {
        $this->db = Database::connect();
    }

    public function all() {
        $stmt = $this->db->query("SELECT * FROM {$this->table} ORDER BY id_member DESC");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function find($id) {
        $st = $this->db->prepare("SELECT * FROM {$this->table} WHERE id_member=?");
        $st->execute([$id]);
        return $st->fetchObject();
    }

    public function create($data) {
        $st = $this->db->prepare("INSERT INTO {$this->table} (nama, usia, gender) VALUES (?,?,?)");
        $st->execute([$data['nama'], $data['usia'] ?? null, $data['gender'] ?? 'Laki-laki']);
    }

    public function update($data) {
        $st = $this->db->prepare("UPDATE {$this->table} SET nama=?, usia=?, gender=? WHERE id_member=?");
        $st->execute([$data['nama'], $data['usia'] ?? null, $data['gender'] ?? 'Laki-laki', $data['id_member']]);
    }

    public function delete($id) {
        $st = $this->db->prepare("DELETE FROM {$this->table} WHERE id_member=?");
        $st->execute([$id]);
    }
}
