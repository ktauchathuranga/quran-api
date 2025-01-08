<?php
require_once __DIR__ . '/../database/Database.php';
require_once __DIR__ . '/../models/EditionModel.php';

class EditionController {
    public function getEditionList() {
        $database = new Database();
        $db = $database->getConnection();

        $editionModel = new EditionModel($db);
        $editions = $editionModel->getAllEditions();

        if ($editions) {
            echo json_encode(["status" => "success", "data" => $editions]);
        } else {
            echo json_encode(["status" => "error", "message" => "No editions found."]);
        }
    }
}
