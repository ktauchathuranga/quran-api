<?php
class QuranModel {
    private $conn;
    private $table_ayahs = 'ayahs';
    private $table_editions = 'ayah_edition';  
    private $table_surahs = 'surahs';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getVerse($chapter, $verse, $edition_id = 20) {
        $query = "
            SELECT 
                ae.data AS verse_text,  
                a.number_in_surah AS verse_number,  
                s.name_en AS chapter_name  
            FROM 
                {$this->table_editions} ae
            JOIN 
                {$this->table_ayahs} a ON ae.ayah_id = a.id
            JOIN 
                {$this->table_surahs} s ON s.id = a.surah_id
            WHERE 
                a.surah_id = :chapter 
                AND a.number_in_surah = :verse 
                AND ae.edition_id = :edition_id
            LIMIT 1
        ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':chapter', $chapter, PDO::PARAM_INT);
        $stmt->bindParam(':verse', $verse, PDO::PARAM_INT);
        $stmt->bindParam(':edition_id', $edition_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getEditions() {
        $query = "
            SELECT 
                id, identifier, language, name, englishName, format, type
            FROM 
                editions
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getChapter($chapter, $edition_id = 20) {
        $query = "
            SELECT 
                ae.data AS verse_text,  
                a.number_in_surah AS verse_number  
            FROM 
                {$this->table_editions} ae
            JOIN 
                {$this->table_ayahs} a ON ae.ayah_id = a.id
            WHERE 
                a.surah_id = :chapter 
                AND ae.edition_id = :edition_id
            ORDER BY 
                a.number_in_surah ASC
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':chapter', $chapter, PDO::PARAM_INT);
        $stmt->bindParam(':edition_id', $edition_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
