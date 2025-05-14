<?php
session_start();
use App\Config\DbConnection;


//require_once 'Config/pdo.php';
require_once __DIR__ . '/../src/Config/DbConnection.php';
require_once "../templates/header.php";

$db = new DbConnection();
//$version = '';


?>

<body>

<form class="contact-form" action="contact_form.php" method="post">
    <div class="row">
        Name: <input type="text" name="name" value="">
        Email: <input type="text" name="email" value="">
        Sujet: <input type="text" name="subject" value="">
        Message: <textarea name="message" rows="5" ></textarea>
        <button type="submit" class="btn btn-success">Envoyer</button>
    </div>
 </form>
</body>

<?php
require "../templates/footer.php";
?>