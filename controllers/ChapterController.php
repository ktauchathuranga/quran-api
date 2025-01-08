<?php
require_once __DIR__ . '/../database/Database.php'; 
require_once __DIR__ . '/../models/QuranModel.php';

class ChapterController {

    public function getVerseDetails($chapter, $verse, $edition_id = 20) {
        // Get database connection
        $database = new Database();
        $db = $database->getConnection();
        
        // Get verse details
        $quranModel = new QuranModel($db);
        $verseDetails = $quranModel->getVerse($chapter, $verse, $edition_id);

        if ($verseDetails) {
            echo json_encode([
                "status" => "success",
                "data" => $verseDetails
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Verse not found."
            ]);
        }
    }

    public function getEditionsList() {
        // Get database connection
        $database = new Database();
        $db = $database->getConnection();

        // Get editions list
        $quranModel = new QuranModel($db);
        $editions = $quranModel->getEditions();

        if ($editions) {
            echo json_encode([
                "status" => "success",
                "data" => $editions
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "No editions found."
            ]);
        }
    }

    public function getChapterDetails($chapter, $edition_id = 20) {
        // Get database connection
        $database = new Database();
        $db = $database->getConnection();

        // Get chapter details
        $quranModel = new QuranModel($db);
        $chapterDetails = $quranModel->getChapter($chapter, $edition_id);

        if ($chapterDetails) {
            echo json_encode([
                "status" => "success",
                "data" => $chapterDetails
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Chapter not found."
            ]);
        }
    }
}
?>
