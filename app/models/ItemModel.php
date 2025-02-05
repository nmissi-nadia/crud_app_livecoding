<?php
require_once '../config/Database.php';

class ItemModel {
    public static function create($name) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO items (name) VALUES (?)");
        return $stmt->execute([$name]);
    }

    public static function readAll() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM items");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function delete($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM items WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
