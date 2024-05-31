<?php
$config = require __DIR__ . '/../../config/config.php';

try {
    $dsn = "mysql:host=" . $config['host'] . ";dbname=" . $config['dbname'];
    $pdo = new PDO($dsn, $config['username'], $config['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
    die();
}
?>