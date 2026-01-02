<?php
// public/test.php

require_once __DIR__ . '/../classes/Database.php';

$db = new Database();
$conn = $db->getConnection();

echo 'Connexion OK';
