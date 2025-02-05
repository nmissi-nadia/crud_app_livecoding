<?php
require_once '../app/models/ItemModel.php';

header('Content-Type: application/json');

// Vérifie l'action
$action = $_GET['action'] ?? null;

if ($action === 'create') {
    $name = $_POST['name'] ?? '';
    $result = ItemModel::create($name);
    echo json_encode(['success' => $result, 'message' => $result ? 'Item created successfully.' : 'Failed to create item.']);
} elseif ($action === 'read') {
    $items = ItemModel::readAll();
    echo json_encode(['success' => true, 'data' => $items]);
} elseif ($action === 'delete') {
    $id = $_POST['id'] ?? 0;
    $result = ItemModel::delete($id);
    echo json_encode(['success' => $result, 'message' => $result ? 'Item deleted successfully.' : 'Failed to delete item.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid action.']);
}
?>
