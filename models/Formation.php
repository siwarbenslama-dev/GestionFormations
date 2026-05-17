<?php
require_once 'Database.php';

class Formation {
    public static function getAll(): array {
        $pdo = Database::connect();
        $stmt = $pdo->query('SELECT * FROM formations ORDER BY id ASC');
        return $stmt->fetchAll();
    }

    public static function getByNiveau(string $niveau): array {
        $pdo = Database::connect();
        $stmt = $pdo->prepare('SELECT * FROM formations WHERE niveau = ?');
        $stmt->execute([$niveau]);
        return $stmt->fetchAll();
    }

    public static function getById(int $id): array|false {
        $pdo = Database::connect();
        $stmt = $pdo->prepare('SELECT * FROM formations WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
?>