<?php

class ItemController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function handleRequest($action) {
        switch ($action) {
            case 'create':
                $name = $_POST['name'] ?? '';
                echo json_encode(['success' => $this->model->createItem($name)]);
                break;

            case 'update':
                $id = $_POST['id'] ?? '';
                $name = $_POST['name'] ?? '';
                echo json_encode(['success' => $this->model->updateItem($id, $name)]);
                break;

            case 'delete':
                $id = $_POST['id'] ?? '';
                echo json_encode(['success' => $this->model->deleteItem($id)]);
                break;

            case 'read':
                echo json_encode($this->model->getAllItems());
                break;

            default:
                echo json_encode(['error' => 'Invalid action']);
        }
    }
}
