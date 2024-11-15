<?php

namespace App\Config;

//use Dotenv\Dotenv;

//$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
//$dotenv->load();

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


//Get Heroku ClearDB connection information
/*$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
?>*/



try {
    $pdo = new \PDO("mysql:$jawsdbhost;dbname:$jawsdbname", $jawsdbuser, $jawsdbpassword);
    echo " Connexion à la base de données";
}
catch (\PDOException $e) {
    echo "erreur de connection" .$e->getMessage();
}

class DbConnection
{
    private static ?\PDO $pdo = null;

    public static function getPdo(): \PDO
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
            $jawsdb_db = $_ENV['JAWSDB_NAME'] ?? 'my_database';
        }

        // Create the DSN (Data Source Name) for MySQL
        $dsn = "mysql:host=$jawsdb_server;dbname=$jawsdb_db;charset=utf8mb4";

        // Create PDO instance and set error mode
        self::$pdo = new \PDO($dsn, $jawsdb_username, $jawsdb_password);
        self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return self::$pdo;
    }
}



