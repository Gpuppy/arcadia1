<?php
session_start();
use App\Config\DbConnection;


//require_once 'Config/pdo.php';
require_once __DIR__ . '/../src/Config/DbConnection.php';
require_once "../templates/header.php";

$db = new DbConnection();
$version = '';


?>
<?php
require "../templates/footer.php";
?>