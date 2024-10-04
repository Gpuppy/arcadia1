<?php

// Assuming this file contains your PDO connection setup
require "config/pdo.php";

$title = 'Creer un compte';

require_once "templates/header.php";
?>
    <div class="container"></div>

    <h3 class="text-center">Inscription</h3>
    <body class="center">
    <form action="" method="POST" >
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username">

        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password">

        <button type="submit" class="btn btn-primary">Inscription</button>

    </body>

<?php
require_once "templates/footer.php";
?>
<?php
