<?php
class Database {
    private static $dbHost = 'localhost';  // Remplacez par votre hôte (par défaut : localhost)
    private static $dbName = 'crud_app';  // Remplacez par le nom de votre base de données
    private static $dbUser = 'root';  // Remplacez par votre utilisateur MySQL
    private static $dbPass = '';  // Remplacez par votre mot de passe MySQL
    private static $connection = null;

    public static function connect() {
        if (self::$connection === null) {
            try {
                self::$connection = new PDO(
                    "mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName,
                    self::$dbUser,
                    self::$dbPass
                );
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur de connexion : " . $e->getMessage());
            }
        }
        return self::$connection;
    }

    public static function disconnect() {
        self::$connection = null;
    }
}
?>
