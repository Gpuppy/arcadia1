<?php

//require_once "config/pdo.php";
require_once "config/DbConnection.php";


if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
    if (!$_POST['name'] ||
    !$_POST['state'] ||
    !$_POST['race'] ||
    !$_POST['image']
    ) {echo 'Un des champs est vide. Insertion impossible';
}else{

 $query = DbConnection::getPdo()->prepare('INSERT INTO animal
    (name, state, race_id, image)
 VALUES (
         :name,
         :state,
         :race,
         :image
 )
    ');
$query->bindParam('name',$_POST['name'],PDO::PARAM_STR);
$query->bindParam('state',$_POST['state'],PDO::PARAM_STR);
$query->bindParam('race',$_POST['race'],PDO::PARAM_STR);
$query->bindParam('image',$_POST['image'],PDO::PARAM_STR);

$query->execute();

$_SESSION ['message_add_animal'] = 'annonce bien ajouté';

    header('Location: animal.php');
    }

}else{
    echo 'impossible d \'arriver sur cette page en GET ';
}

