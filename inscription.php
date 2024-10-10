<?php

$title = 'Creer un compte';

// Assuming this file contains your PDO connection setup
require "config/DbConnection.php";
require_once "templates/header.php";

$error = false;

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)){
    if(!$_POST['username'] && $_POST['password']){
        $error = "Identifiants  invalides";
    }else{

    }
}
?>
    <div class="container"></div>

    <h3 class="text-center">Inscription</h3>
    <body class="center">
    <?php
    if($error): ?>
        <div class="alert alert-warning" role="alert" aria-live="assertive" aria-atomic="true">
            <?php echo $error;?>

        </div>


    <?php endif; ?>
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
