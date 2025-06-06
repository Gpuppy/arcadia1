<?php

namespace App\Config;


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



