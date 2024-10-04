<?php

require_once "config/pdo.php";

if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
    if (!$_POST['name'] ||
    !$_POST['state'] ||
    !$_POST['race'] ||
    !$_POST['image']
    ) {echo 'Un des champs est vide. Insertion impossible';
}else{

 $query = $pdo->prepare('INSERT INTO animal
    (name, state, race_id, image)
 VALUES (
         :name,
         :state,
         :race,
         :image
 )
    ');
$query->bindParam('name',$_POST['name']);
$query->bindParam('state',$_POST['state']);
$query->bindParam('race',$_POST['race']);
$query->bindParam('image',$_POST['image']);

$query->execute();

    header('Location: index.php');
    }

}else{
    echo 'impossible d \'arriver sur cette page en GET ';
}

