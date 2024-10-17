<?php

// Assuming this file contains your PDO connection setup
require_once "config/DbConnection.php";
require_once 'config/session.php';
require_once "templates/header.php";


$title = 'Creer un compte';

$error = null;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //var_dump($_POST);
    if(!$_POST['username'] || !$_POST['password'] || !$_POST['name'] || !$_POST['surname'] || !$_POST['role_id']   ){
        $error = "Identifiants invalides";
    }else{
        $query = DbConnection::getPdo()->prepare('INSERT INTO user(username, password, name, surname, role_id) VALUES (:username, :password,:name, :surname, :role_id)');
        $query->bindParam('username', $_POST['username']);

        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $query->bindParam('password', $password);
        //echo $password;
        //die;
        $query->bindParam('name', $_POST['name']);
        $query->bindParam('surname', $_POST['surname']);
        $query->bindParam('role_id', $_POST['role_id']);

        if(!$query->execute()){
            $error = 'une erreur est survenue';
        }else{
           $_SESSION['success_message'] = 'Votre compte a bien été créé';

          header('Location: connection.php');
        }

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

                <div class="mb-3">
                    <label for="name" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="name" name="name" >
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="surname" name="surname" >
                </div>

                <div class="mb-3">
                    <label for="role_id" class="form-label">Role</label>
                    <input type="text" class="form-control" id="role_id" name="role_id" >
                </div>

                <div class="col-12">
                <button type="submit" class="btn btn-primary">Inscription</button>
                </div>
            </form>
        </div>
    </div>

<?php require_once "templates/footer.php"; ?>