// /api/controllers/ChapterController.php
<?php
require_once 'models/QuranModel.php';

class ChapterController {

    public function getVerseDetails($chapter, $verse) {
        // Default edition_id = 20
        $edition_id = 20;

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
}
?>
