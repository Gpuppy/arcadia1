<?php

//use Dotenv\Dotenv as Dotenv;

require 'vendor/autoload.php';
require 'vendor/vlucas/phpdotenv/src/Dotenv.php';
//require 'vendor/vlucas/phpdotenv/src/Loader.php';
require 'vendor/vlucas/phpdotenv/src/Validator.php';

//use Dotenv\Dotenv;
//require_once '.env';




//$username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
//$password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

//connexion a la base de données

/*$dsn = "mysql:host=localhost;dbname:arcadia, charset=uf8mb4";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

];

$pdo = new PDO($dsn, 'username', 'password', $options);*/
//$db = DbConnection::getPdo();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv -> load();

//var_dump($_ENV);


$jawsdbhost = $_ENV['JAWSDB_HOST'];
$jawsdbname = $_ENV['JAWSDB_NAME'];
$jawsdbuser = $_ENV['JAWSDB_USER'];
$jawsdbpassword = $_ENV['JAWSDB_PASSWORD'];




//Get Heroku JawsDB connection information
$url = parse_url(getenv("JAWSDB_DATABASE_URL"));
$jawsdb_server = ["host"];
$jawsdb_username = ["user"];
$jawsdb_password = ["pass"];
$jawsdb_db = ["path"];

$active_group = 'default';
$query_builder = TRUE;
// Connect to DB

$conn = mysqli_connect($jawsdbhost, $jawsdbuser, $jawsdbpassword, $jawsdbname);

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
});*/



try {
    $pdo = new PDO("mysql:$jawsdbhost;dbname:$jawsdbname", $jawsdbuser, $jawsdbpassword);
    echo " Connexion à la base de données";
}
catch (PDOException $e) {
    echo "erreur de connection" .$e->getMessage();
}

class DbConnection
{
    private static ?PDO $pdo = null;

    public static function getPdo(): PDO
    {
        if (self::$pdo !== null) {
            return self::$pdo;
        }

        // If you're running locally, we use the individual components from the .env file
        $jawsdb_url_string = getenv("JAWSDB_DATABASE_URL");

        if ($jawsdb_url_string !== false) {
            // Heroku: parse the JAWSDB_DATABASE_URL
            $jawsdb_url = parse_url($jawsdb_url_string);
            $jawsdb_server = $jawsdb_url['host'];
            $jawsdb_username = $jawsdb_url['user'];
            $jawsdb_password = $jawsdb_url['pass'];
            $jawsdb_db = ltrim($jawsdb_url['path'], '/');  // Remove the leading slash from the database name
        } else {
            // Local Development: Use the local variables from .env
            $jawsdb_server = $_ENV['JAWSDB_HOST'];
            $jawsdb_username = $_ENV['JAWSDB_USER'];
            $jawsdb_password = $_ENV['JAWSDB_PASSWORD'];
            $jawsdb_db = $_ENV['JAWSDB_NAME'];
        }

        // Create the DSN (Data Source Name) for MySQL
        $dsn = "mysql:host=$jawsdb_server;dbname=$jawsdb_db;charset=utf8mb4";

        // Create PDO instance and set error mode
        self::$pdo = new PDO($dsn, $jawsdb_username, $jawsdb_password);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return self::$pdo;
    }
}


/*class DbConnection
{
    private static ?PDO $pdo = null;

    public static function getPdo(): PDO
    {
        if (self::$pdo !== null) {
            return self::$pdo;
        }

        // Get Heroku JawsDB connection information
        $jawsdb_url_string = getenv("JAWSDB_DATABASE_URL");
        if ($jawsdb_url_string === false) {
            throw new Exception("JAWSDB_DATABASE_URL is not set.");
        }

        //$jawsdb_url = parse_url($jawsdb_url_string);

        // Check if parsing was successful
        if (!isset($jawsdb_url["host"])) {
            throw new Exception("Could not parse JAWSDB_DATABASE_URL. Parsed result: " . print_r($jawsdb_url, true));
        }

        $jawsdb_server = $jawsdb_url["host"];
        $jawsdb_username = $jawsdb_url["user"];
        $jawsdb_password = $jawsdb_url["pass"];
        $jawsdb_db = ltrim($jawsdb_url["path"], '/'); // Remove leading slash

        // Create DSN
        $dsn = "mysql:host=$jawsdb_server;dbname=$jawsdb_db;charset=utf8mb4";

        // Create PDO instance
        self::$pdo = new PDO($dsn, $jawsdb_username, $jawsdb_password);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return self::$pdo;
    }
}*/


/*class DbConnection
{
    private static ?PDO $pdo = null;

    public static function getPdo(): PDO
    {
        if (self::$pdo !== null) {
            return self::$pdo;
        }

        // Get Heroku JawsDB connection information
        $jawsdb_url = parse_url(getenv("JAWSDB_DATABASE_URL"));
        $jawsdb_server = $jawsdb_url["host"];
        $jawsdb_username = $jawsdb_url["user"];
        $jawsdb_password = $jawsdb_url["pass"];
        $jawsdb_db = ltrim($jawsdb_url["path"], '/'); // Remove leading slash

        // Create DSN
        $dsn = "mysql:host=$jawsdb_server;dbname=$jawsdb_db;charset=utf8mb4";

        // Create PDO instance
        self::$pdo = new PDO($dsn, $jawsdb_username, $jawsdb_password);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return self::$pdo;
    }
}*/
//requete préparé

//$pdo_prep->execute([$username, $password]);


//var_dump(getenv('APP_ENV'));

/*class DbConnection
{
    private static ?PDO $pdo = null;

    private static function getDsn(): string
    {
        return 'mysql:dbname=' . getenv('DB_DATABASE') . ';host=' . getenv('DB_HOST') . ';charset=utf8';
    }

    private static function getUser(): string
    {
        return getenv('DB_USERNAME');
    }

    private static function getPassword(): string
    {
        return getenv('DB_PASSWORD');
    }

    public static function getPdo(): PDO
    {
        if (self::$pdo === null) {
            self::$pdo = new PDO(self::getDsn(), self::getUser(), self::getPassword());
        }

        return self::$pdo;
    }
}*/
/*
class DbConnection
{
    const DSN = 'mysql:dbname=arcadia';
    const USER = 'root';
    const PASSWORD = '';

    static ? PDO $pdo = null;

    public static function getPdo(): PDO
    {
        if(self::$pdo !== null){
            return self::$pdo;
        }
        self::$pdo = new PDO(self::DSN,self::USER, self::PASSWORD);

        return self::$pdo;
    }
}*/
