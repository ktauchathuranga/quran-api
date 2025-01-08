<?php
class EditionModel {
    private $conn;
    private $table = 'editions';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllEditions() {
        $query = "SELECT id, identifier, language, name, englishName, format, type FROM {$this->table} ORDER BY id";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
