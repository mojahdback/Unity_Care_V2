<?php
require_once __DIR__ . '/../classes/Database.php';

try {
    $database = new Database();
    $db = $database->getConnection();
    $db->query("SELECT 1");
    echo "✅ Database connected successfully";
} catch (PDOException $e) {
    echo "❌ Database not connected";
}

