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



/*try {
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
}*/

class DbConnection
{
    private static ?\PDO $pdo = null;

    public static function getPdo(): \PDO
    {
        if (self::$pdo !== null) {
            return self::$pdo;
        }

        // Check for JAWSDB_DATABASE_URL in the environment
        //$jawsdb_url_string = getenv("JAWSDB_DATABASE_URL");

        //if ($jawsdb_url_string) {
        // Parse JAWSDB_DATABASE_URL
        //$jawsdb_url = parse_url($jawsdb_url_string);
        //$host = $jawsdb_url['host']?? null;
        //$username = $jawsdb_url['user']?? null;
        //$password = $jawsdb_url['pass']?? null;
        //$dbname = ltrim($jawsdb_url['path']?? '', '/');
        //$port = $jawsdb_url['port'] ?? 3306;
        /*} else {
            // Local Development: Use fallback credentials
            $host = "127.0.0.1";//$jawsdb_server = $_ENV['JAWSDB_HOST'] ?? '127.0.0.1';
            $password = "root";//$jawsdb_password = $_ENV['JAWSDB_PASSWORD'] ?? '';
            $username = "root";//$jawsdb_username = $_ENV['JAWSDB_USER'] ?? 'root';
            $dbname= "arcadia";
            $port = 3306;

            //$jawsdb_db = $_ENV['JAWSDB_NAME'] ?? 'my_local_database';
        }

        //if (!$jawsdb_server || !$jawsdb_username || !$jawsdb_db)
        if (!$host || !$username || !$dbname) {
            throw new \Exception("Database credentials are missing.");
        }

        $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";

        try {
            // Establish the PDO connection
            self::$pdo = new \PDO($dsn, $username, $password);
            self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            throw new \Exception("Database connection failed: " . $e->getMessage());
        }*/

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



