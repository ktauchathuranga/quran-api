// /api/routes/api.php
<?php
// Include necessary files
require_once 'controllers/ChapterController.php';

// API Router
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from POST request
    $inputData = json_decode(file_get_contents('php://input'), true);

    // Chapter and verse are mandatory
    if (isset($inputData['chapter']) && isset($inputData['verse'])) {
        $chapter = $inputData['chapter'];
        $verse = $inputData['verse'];

        $controller = new ChapterController();
        $controller->getVerseDetails($chapter, $verse);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Chapter and Verse are required."
        ]);
    }
}
?>
