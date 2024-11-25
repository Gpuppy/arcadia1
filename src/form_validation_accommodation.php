<?php

use App\Config\DbConnection;

require_once "Config/DbConnection.php";
require_once "Config/Pdo.php";

$db = new DbConnection();

$title = 'Add accommodation';


if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
    if (!$_POST['name'] ||
        !$_POST['description'] ||
        !$_POST['accommodation_review'] ||
        !$_POST['image']
    ) {echo 'Un des champs est vide. Insertion impossible';
    }else{

        $query = DbConnection::getPdo()->prepare('INSERT INTO accommodation
    (name, description, accommodation_review, image)
 VALUES (
         :name,
         :description,
         :accommodation_review,
         :image
 )
    ');
        $query->bindParam('name',$_POST['name'],PDO::PARAM_STR);
        $query->bindParam('description',$_POST['description'],PDO::PARAM_STR);
        $query->bindParam('accommodation_review',$_POST['accommodation_review'],PDO::PARAM_STR);
        $query->bindParam('image',$_POST['image'],PDO::PARAM_STR);

        $query->execute();

        $_SESSION ['message_add_accommodation'] = 'annonce bien ajouté';

        header('Location: accommodation.php');
    }

}else{
    echo 'impossible d \'arriver sur cette page en GET ';
}


