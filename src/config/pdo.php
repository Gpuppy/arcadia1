<?php

//namespace App\config;

$pdo = new PDO("mysql:dbname=arcadia;host=localhost;charset=utf8", "root","root");

//session_start();

$_SESSION['test'] = ' Bienvenue';