<?php
//$pdo = new PDO("mysql:dbname=arcadia;host=localhost;charset=utf8", "root","root");

require_once 'config/pdo.php';
require_once 'config/DbConnection.php';

DbConnection::getPdo();


$query = DbConnection::getPdo()->query('SELECT * FROM animal');
$animals = $query->fetchAll(PDO::FETCH_ASSOC);
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
require "./templates/header.php";
//require "./templates/index.html.twig";

//require __DIR__ . "/vendor/autoload.php";
//require "User.php";
//require "Entity/Animal.php";
//require_once "Controller/HomeController.php";
//require_once "Controller/UserController.php";
//require_once "Controller/LogoutController.php";



//$animal1 = new Animal();
//$animal1->setName("Joe");
//var_dump($animal1);

//$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . 'index.php/');
//$dotenv -> load();

//$dbhost = $_ENV['DB_HOST'];
//$dbname = $_ENV['DB_NAME'];
//$dbuser = $_ENV['DB_USER'];
//$dbpassword = $_ENV['DB_PASSWORD'];


//Get Heroku JawsDB connection information
//$jawsdb_url = parse_url(getenv("JAWSDB_DATABASE_URL"));
//$jawsdb_server = $jawsdb_url["host"];
//$jawsdb_username = $jawsdb_url["user"];
//$jawsdb_password = $jawsdb_url["pass"];
//$jawsdb_db = substr($jawsdb_url["path"], 1);
//$active_group = 'default';
//$query_builder = TRUE;
// Connect to DB
//$conn = mysqli_connect($jawsdb_server, $jawsdb_username, $jawsdb_password, $jawsdb_db);

// Add Database connection to Container
/*$container->set(PDO::class, function() {
    $dburl = parse_url(getenv('DATABASE_URL') ?: throw new Exception('no DATABASE_URL'));
    return new PDO(sprintf(
        "pgsql:host=%s;port=%s;dbname=%s;user=%s;password=%s",
        $dburl['host'],
        $dburl['port'],
        ltrim($dburl['path'], '/'), // URL path is the DB name, must remove leading slash
        $dburl['user'],
        $dburl['pass'],
    ));
});



try {
    $pdo = new PDO("mysql:$dbhost;dbname:$dbname", $dbuser, $dbpassword);
    echo " Connexion à la base de données";
}
catch (PDOException $e) {
    echo "erreur de connection" .$e->getMessage();
}

/*try {

}
catch(){

}*/

?>


<?php
require "./templates/footer.php";
?>