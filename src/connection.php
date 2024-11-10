<?php

//require "./index.php";  // Assuming this file contains your PDO connection setup
require_once __DIR__ . '/../src/config/DbConnection.php';
require_once __DIR__ . '/../src/config/session.php';
require_once "../templates/header.php";
require '../vendor/autoload.php';

//$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
//$dotenv -> load();

//echo $_SESSION['user']['username'];

$title = 'Connexion';

$error = null;
//$username = $_POST["username"] ?? "";
$password = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //var_dump($_POST);
    if(!$_POST['username'] || !$_POST['password'])  {
        $error = "Identifiants invalide";
    }else{
        $query = DbConnection::getPdo()->prepare('SELECT * FROM user WHERE username = :username');
        $query->bindParam('username', $_POST['username']);
        $query->execute();

        $user = $query->fetch(PDO::FETCH_ASSOC);

        if(!$user){
            $error = 'Identifiant invalides';
        }else{
            $passwordOk = password_verify($_POST['password'], $user['password']);

            if(!$passwordOk){
                $error = 'Identifiants invalides';
            }else{
                unset($user['password']);
                $_SESSION['user'] = $user;
                header('Location: admin.php');
            }
        }

    }
}

?>
<div class="container"></div>

<h3 class="text-center">Se Connecter</h3>
<body class="center">

<?php if ($error): ?>
    <div class="alert alert-warning" role="alert">
        <?php echo $error;
        ?>
    </div>
<?php endif; ?>

<?php if(isset($_SESSION['success_message'])):?>
<div class="alert alert-success" role="alert">
<?php
echo $_SESSION['success_message'];
unset($_SESSION['success_message']);
?>


</div>
<?php endif; ?>

<form action="" method="post" >
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username">

    <label for="password" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" id="password" name="password">

    <div class="col-12 mt-3">
    <button type="submit" class="btn btn-primary">Se connecter</button>
    </div>

    <div class="form-nav-row">
        <a href="#" class="form-link">Mot de passe oublié?</a>
    </div>
</form>

   </body>

<?php
require_once "../templates/footer.php";
?>









