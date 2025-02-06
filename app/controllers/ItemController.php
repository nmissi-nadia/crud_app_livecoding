<?php
require_once '../models/ItemModel.php';

header('Content-Type: application/json');

class ItemController {
    private $model;

    public function __construct() {
        $this->model = new ItemModel();
    }

    public function handleRequest($action) {
        switch ($action) {
            case 'create':
                $name = $_POST['name'] ?? '';
                $result = $this->model->create($name);
                echo json_encode(['success' => $result]);
                break;

            case 'read':
                    $items = $this->model->readAll();

                    echo json_encode(['success' => true, 'data' => $items]);
                    break;

            case 'update':
                $id = $_POST['id'] ?? 0;
                $name = $_POST['name'] ?? '';
                $result = $this->model->update($id, $name);
                echo json_encode(['success' => $result]);
                break;

            case 'delete':
                $id = $_POST['id'] ?? 0;
                $result = $this->model->delete($id);
                echo json_encode(['message' => 'item deleted']);
                break;

            default:
                echo json_encode(['success' => false, 'message' => 'Action invalide.']);
                break;
        }
    }
}


$action = $_GET['action'] ?? null;
$controller = new ItemController();
$controller->handleRequest($action);
?>