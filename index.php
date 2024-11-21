<?php

use App\Config\DbConnection;
use Dotenv\Dotenv;

require_once __DIR__ . '/vendor/autoload.php';
//require_once __DIR__ . '/../src/Config/DbConnection.php';
//require_once __DIR__ . '/../src/Config/session.php';


//$dotenv = Dotenv::createImmutable(__DIR__);
//$dotenv->load();

if (file_exists(__DIR__ . '/.env')) {
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}


//var_dump(getenv('APP_ENV'));


//require_once 'animal.php';


$db = new DbConnection();


$query = DbConnection::getPdo()->query('SELECT * FROM animal');
$animals = $query->fetchAll(PDO::FETCH_ASSOC);
//$animal = $query->fetch(PDO::FETCH_OBJ);
$race = $query->fetchAll(PDO::FETCH_ASSOC);
//$query = $pdo->query("SELECT * FROM user");
//$users = $query->fetchAll(PDO::FETCH_ASSOC);

//$animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
//print_r($animals);
//$stmt->closeCursor();
//print_r($animals);
//$infos = json_encode($animals);

//var_dump($animals);


//session_start();


//require_once 'Controller/HomeController.php';
require "templates/header.php";
?>
<?php
$user = '';
//echo $_SESSION['user']['name'];

//echo $_SESSION['user']['surname'];

?>
<body >

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
<!----Header-------->
<!--nav class="py-5 bg-body-secondary border-bottom ">

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
                    <li class="nav-item"><a href="/index.php?page=ajout_animal" class="nav-link link-body-emphasis px-2 active" aria-current="page">Accueil</a></li>
                    <li class="nav-item"><a href="./src/animal.php" class="nav-link link-body-emphasis px-2  text-light">Animals</a></li>
                    <li class="nav-item"><a href="/accommodation.php" class="nav-link link-body-emphasis px-2 text-light">Habitats</a></li>
                    <li class="nav-item"><a href="../src/avis.php" class="nav-link link-body-emphasis px-2 text-light">Avis</a></li>
                    <li class="nav-item"><a href="/Entity/Contact.php" class="nav-link link-body-emphasis px-2 text-light">Contact</a></li>
                </ul>
                <ul class="nav">
                    <a class="btn btn-success" href="../src/connection.php" role="button">Admin</a>

                </ul>
        </div>
    </div--->
        <!----EndHeader-------->
    <main>
        <div class="text-center">
        <h1>Zoo Arcadia<?php echo $_SESSION['test'] ?? null ?></h1></div>

            <!-- Carousel wrapper -->

        <div id="carouselExampleAutoplaying" class="carousel slide row text-center" data-bs-ride="carousel">
            <div class="carousel-inner center">
                <div class="carousel-item active ">
                    <img src="Images/ostrich-8579501_1280.jpg" class="img-fluid " alt="...">
                </div>
                <div class="carousel-item">
                    <img src="Images/penguin-6905568_1280.jpg" class="img-fluid " alt="...">
                </div>
                <div class="carousel-item">
                    <img src="Images/zebras-4258909_1280.jpg" class="img-fluid " alt="...">
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

        </div>

        <div class="text-center bg-secondary mt-3 mx-3 ">
            <h3>Présentation</h3>
        <h5>Arcadia est un zoo situé en France près de la forêt de Brocéliande, en bretagne depuis 1960. Ils possèdent tout un panel d’animaux, réparti par habitat (savane, jungle, marais) et font extrêmement attention à leurs santés.
            Les animaux sont heureux et cela fait la fierté de son directeur</h5>
        </div>


        <style>


            .carousel-item img{
                width: 70%; /* Set to your desired width */
                height: 500px; /* Set to your desired height */
                object-fit: cover; /* This will crop the image to fit */
                data-bs-interval="0.1";
            }

        </style>
        <!-- Carousel wrapper -->



        <?php
        if(isset($_SESSION['message'])): ?>
            <div class="alert alert-success" role="alert" aria-live="assertive" aria-atomic="true">
                <?php echo $_SESSION['message'];?>
                        <?php unset($_SESSION['message']);?>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
            <?php endif; ?>
        <?php if(isset($_SESSION['success_message'])):?>
        <div class="alert alert-success" role="alert">
            <?php
            echo $_SESSION['success_message'];
            unset($_SESSION['success_message']);
            ?>
            <?php endif; ?>



    </main>


</body>

<?php

require "templates/footer.php";
?>


