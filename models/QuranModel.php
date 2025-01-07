// /api/models/QuranModel.php
<?php
class QuranModel {
    private $conn;
    private $table_ayahs = 'ayahs';
    private $table_editions = 'editions';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getVerse($chapter, $verse, $edition_id = 20) {
        $query = "
            SELECT a.number AS verse_number, a.text AS verse_text, s.name_en AS chapter_name, e.name AS edition_name
            FROM {$this->table_ayahs} a
            JOIN {$this->table_editions} e ON e.id = :edition_id
            JOIN {$this->table_ayahs} a2 ON a.surah_id = a2.surah_id
            JOIN surahs s ON s.id = a.surah_id
            WHERE a.surah_id = :chapter AND a.number_in_surah = :verse
            LIMIT 1
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':chapter', $chapter);
        $stmt->bindParam(':verse', $verse);
        $stmt->bindParam(':edition_id', $edition_id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
