<?php

namespace App;

require_once __DIR__ . '/../src/Config/DbConnection.php';
use App\Config\DbConnection;


if(!isset($_GET['id'])) {
    echo "Missing animal ID.";
    exit;
}

$id = (int) $_GET['id'];

$query = DbConnection::getPdo()->prepare("SELECT description FROM animal WHERE id = :id");
$query->execute(['id => $id']);
$animal = $query->fetch(\PDO::FETCH_ASSOC);

if($animal) {
    echo htmlspecialchars($animal['description']);
}else{
        echo 'No description found';
    }
