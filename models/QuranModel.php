<?php
class QuranModel {
    private $conn;
    private $table_ayahs = 'ayahs';
    private $table_editions = 'ayah_edition';  // Assuming this contains verse text and other data

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getVerse($chapter, $verse, $edition_id = 20) {
        $query = "
            SELECT 
                ae.data AS verse_text,  -- The verse content
                a.number_in_surah AS verse_number,  -- Verse number within the chapter
                s.name_en AS chapter_name  -- Chapter name in English
            FROM 
                {$this->table_editions} ae
            JOIN 
                {$this->table_ayahs} a ON ae.ayah_id = a.id
            JOIN 
                surahs s ON s.id = a.surah_id
            WHERE 
                a.surah_id = :chapter 
                AND a.number_in_surah = :verse 
                AND ae.edition_id = :edition_id
            LIMIT 1
        ";
        
        // Prepare and execute the query
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':chapter', $chapter, PDO::PARAM_INT); // Binding chapter number
        $stmt->bindParam(':verse', $verse, PDO::PARAM_INT);     // Binding verse number
        $stmt->bindParam(':edition_id', $edition_id, PDO::PARAM_INT); // Binding edition ID
        $stmt->execute();

        // Fetch the result as an associative array
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
