<?php

session_start();
$name = $_SESSION['success_name'] ?? '';
session_unset();
use App\Config\DbConnection;


//require_once 'Config/pdo.php';
require_once __DIR__ . '/../src/Config/DbConnection.php';
require_once "../templates/header.php";

$db = new DbConnection();
//$version = '';


?>

    <body>
    <h3>Merci <?= htmlspecialchars($name) ?>, votre message a été envoyé avec succès !</h3>
    </body>


<?php
require "../templates/footer.php";
?>

