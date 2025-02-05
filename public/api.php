<?php
require_once '../app/models/ItemModel.php';

header('Content-Type: application/json');

// Vérifie l'action
$action = $_GET['action'] ?? null;

if ($action === 'create') {
    $name = $_POST['name'] ?? '';
    $result = ItemModel::create($name);
    echo json_encode(['success' => $result, 'message' => $result ? 'Item creé avec succès.' : 'erreur lors de la création de l\'element.']);
} elseif ($action === 'read') {
    $items = ItemModel::readAll();
    echo json_encode(['success' => true, 'data' => $items]);
} elseif ($action === 'delete') {
    $id = $_POST['id'] ?? 0;
    $result = ItemModel::delete($id);
    echo json_encode(['success' => $result, 'message' => $result ? 'iteme supprimé avec succès.' : 'erreur lors de la suppression de l\'element.']);
} elseif ($action === 'update') {
    $id = $_POST['id'] ?? 0;
    $name = $_POST['name'] ?? '';
    $result = ItemModel::update($id, $name);
    echo json_encode(['success' => $result, 'message' => $result ? 'iteme mis à jour avec succès.' : 'erreur lors de la mise à jour de l\'element.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid action.']);
}
?>
