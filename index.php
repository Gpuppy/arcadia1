<?php
//$pdo = new PDO("mysql:dbname=arcadia;host=localhost;charset=utf8", "root","root");
//require_once 'config/pdo.php';
require_once 'config/DbConnection.php';
//require_once 'animal.php';

//$animal = new Animal();

//DbConnection::getPdo();

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

    <main>
        <div class="text-center">
        <h1>Zoo Arcadia<?php echo $_SESSION['test'] ?? null ?></h1></div>

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

    </main>



<?php
require "./templates/footer.php";
?>


