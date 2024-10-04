<?php

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
}