<?php
class QuranModel {
    private $conn;
    private $table_ayahs = 'ayahs';
    private $table_editions = 'ayah_edition';  // Assuming you want data from the 'ayah_edition' table

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getVerse($chapter, $verse, $edition_id = 20) {
        $query = "
            SELECT ae.data AS verse_text, a.number AS verse_number, s.name_en AS chapter_name
            FROM {$this->table_editions} ae
            JOIN {$this->table_ayahs} a ON ae.ayah_id = a.id
            JOIN surahs s ON s.id = a.surah_id
            WHERE a.surah_id = :chapter AND a.number_in_surah = :verse AND ae.edition_id = :edition_id
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
