<?php


session_start();

use App\Config\DbConnection;

require_once __DIR__ . '/../src/Config/DbConnection.php';
require_once "../templates/header.php";

$db = new DbConnection();
?>

<body>
<div class="mb-3">
<form class="review" action="" type="post">
    <div class="row">
    <label for=""></label>
    <input type="">
    <label for=""></label>
    <input type="">
    <label for=""></label>
    <input type="">
    <label for=""></label>
    <input type="">
    </div>
</form>
</div>

<?php
require "../templates/footer.php";
?>