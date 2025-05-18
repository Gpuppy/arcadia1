<?php

session_start();
use App\Config\DbConnection;


//require_once 'Config/pdo.php';
require_once __DIR__ . '/../src/Config/DbConnection.php';
require_once "../templates/header.php";

$db = new DbConnection();
//$version = '';


?>

    <body>
    <h3>Votre email a bien été envoyé :) </h3>
    </body>


<?php
require "../templates/footer.php";
?>

