<?php
require_once 'controllers/ChapterController.php';

$controller = new ChapterController();

// Add CORS headers to allow cross-origin requests
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputData = json_decode(file_get_contents('php://input'), true);

    // Route handling
    if (isset($inputData['action'])) {
        $action = $inputData['action'];

        switch ($action) {
            case 'getVerseDetails':
                if (isset($inputData['chapter']) && isset($inputData['verse'])) {
                    $chapter = $inputData['chapter'];
                    $verse = $inputData['verse'];
                    $edition_id = $inputData['edition_id'] ?? 20;
                    $controller->getVerseDetails($chapter, $verse, $edition_id);
                } else {
                    echo json_encode([
                        "status" => "error",
                        "message" => "Chapter and Verse are required."
                    ]);
                }
                break;

            case 'getEditionsList':
                $controller->getEditionsList();
                break;

            case 'getChapterDetails':
                if (isset($inputData['chapter'])) {
                    $chapter = $inputData['chapter'];
                    $edition_id = $inputData['edition_id'] ?? 20;
                    $controller->getChapterDetails($chapter, $edition_id);
                } else {
                    echo json_encode([
                        "status" => "error",
                        "message" => "Chapter is required."
                    ]);
                }
                break;

            default:
                echo json_encode([
                    "status" => "error",
                    "message" => "Invalid action."
                ]);
                break;
        }
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Action is required."
        ]);
    }
}
?>
