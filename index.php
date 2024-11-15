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

//use Mysqli;

//require_once 'vendor/autoload.php';

//session_start();

//define("BASE_URL", '/arcadia');

//$loader = new Twig\Loader\FilesystemLoader(__DIR__. '/templates');
//$twig = new Twig\Environment($loader);

//require_once 'Controller/HomeController.php';
require "templates/header.php";
?>
<?php
$user = '';
//echo $_SESSION['user']['name'];

//echo $_SESSION['user']['surname'];

?>
<body>
    <main>
        <div class="text-center ">
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
            <!--button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button--->

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

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


