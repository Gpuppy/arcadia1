<?php

// Assuming this file contains your PDO connection setup
require_once "config/DbConnection.php";
require_once 'session.php';
require_once "templates/header.php";


$title = 'Creer un compte';

$error = null;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //var_dump($_POST);
    if(empty($_POST['username']) || empty($_POST['password'])){
        $error = "Identifiants invalides";
    }else{
        $query = DbConnection::getPdo()->prepare('INSERT INTO user(username, password, name, surname, role_id) VALUES (:username, :password, :surname, :rome_id)');
        $query->bindParam('username', $_POST['username']);
        $query->bindParam('password', $_POST['password']);
        $query->bindParam('surname', $_POST['surname']);
        $query->bindParam('role_id', $_POST['role_id']);
    }
}
?>
    <div class="container">
        <h3 class="text-center">Inscription</h3>
        <div class="center">
            <?php if ($error): ?>
                <div class="alert alert-warning" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form action="inscription.php" method="post">
                <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" >
                </div>
                <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" >
                </div>

                <div class="col-12">
                <button type="submit" class="btn btn-primary">Inscription</button>
                </div>
            </form>
        </div>
    </div>

<?php require_once "templates/footer.php"; ?>