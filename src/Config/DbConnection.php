<?php

namespace App\Config;

//use Dotenv\Dotenv;

//$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
//$dotenv->load();

//var_dump($_ENV);

/*$jawsdbhost = $_ENV['JAWSDB_HOST'];
$jawsdbname = $_ENV['JAWSDB_NAME'];
$jawsdbuser = $_ENV['JAWSDB_USER'];
$jawsdbpassword = $_ENV['JAWSDB_PASSWORD'];

//Get Heroku JawsDB connection information
$url = parse_url(getenv("JAWSDB_DATABASE_URL"));
$jawsdb_server = $url["host"];
$jawsdb_username = $url["user"];
$jawsdb_password = $url["pass"];
$jawsdb_db = ltrim($url["path"],'/');

$active_group = 'default';
$query_builder = TRUE;
// Connect to DB

$conn = mysqli_connect($jawsdb_server, $jawsdb_username, $jawsdb_password, $jawsdb_db);

if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}*/

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




class DbConnection
{
    private static ?\PDO $pdo = null;

    public static function getPdo(): \PDO
    {
        if (self::$pdo !== null) {
            return self::$pdo;
        }


        $host = "nba02whlntki5w2p.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $user = "tvr7jf7pjfcxahch";
        $password = "k4jwc1moepkum601";
        $dbname = "y0dtxwzjt63cmuoj";
        $port = "3306";

        // Create DSN (Data Source Name) for PDO
        $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";

        try {
            // Initialize the PDO instance and store it in the static property
            self::$pdo = new \PDO($dsn, $user, $password);
            self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            // If connection fails, throw an exception
            throw new \Exception("Database connection failed: " . $e->getMessage());
        }

        return self::$pdo;
    }
}



