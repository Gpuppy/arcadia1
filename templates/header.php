<?php

//namespace App\Public;

require __DIR__ . '/../vendor/autoload.php';
//require_once 'src/config/pdo.php';


$title = 'Connexion';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arcadia</title>
</head>
<body>
<header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</header>
<nav class="py-5 bg-body-secondary border-bottom ">

    <div class="container ">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
     <div class="d-flex col-lg-4 mb-2 ">
                           <img src="../Images/Arcadia-2.png" class="img" height="60px"  alt="Arcadia">
                        </div>
                        </a>
        <ul class="nav me-auto bg-success">
            <li class="nav-item"><a href="/index.php" class="nav-link link-body-emphasis px-2 active text-light " aria-current="page">Accueil</a></li>
             <!--li class="nav-item"><a href="/index.php?page=ajout_animal" class="nav-link link-body-emphasis px-2 active" aria-current="page">Accueil</a></li-->
            <li class="nav-item"><a href="../src/animal.php" class="nav-link link-body-emphasis px-2  text-light">Animals</a></li>
            <li class="nav-item"><a href="../src/accommodation.php" class="nav-link link-body-emphasis px-2 text-light">Habitats</a></li>
            <li class="nav-item"><a href="../src/avis.php" class="nav-link link-body-emphasis px-2 text-light">Avis</a></li>
            <li class="nav-item"><a href="/Entity/Contact.php" class="nav-link link-body-emphasis px-2 text-light">Contact</a></li>
        </ul>
        <ul class="nav">
            <a class="btn btn-success" href="../src/connection.php" role="button">Admin</a>

        </ul>
    </div>

     <?php if(isset($_SESSION['user'])): ?>
                <a href="/src/logout.php">Déconnexion</a>
            <a href="#">Compte: <?php echo $_SESSION['user']['name']?></a>
            <?php else: ?>
            <!--a href="admin.php">Connexion</a-->
            <?php endif; ?>