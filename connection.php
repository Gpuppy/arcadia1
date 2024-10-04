<?php

require "./index.php";  // Assuming this file contains your PDO connection setup
require "config/pdo.php";
require_once "templates/header.php";
?>
<div class="container"></div>

<h3 class="text-center">Se Connecter</h3>
<body class="center">
<form action="" method="POST" >
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username">

    <label for="password" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" id="password" name="password">

    <input type="submit" class="btn btn-primary">
    <div class="form-nav-row">
        <a href="#" class="form-link">Mot de passe oublié?</a>
    </div>
   </body>

<?php
require_once "templates/footer.php";
?>









