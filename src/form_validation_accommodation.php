<?php

use App\Config\DbConnection;

require_once "Config/DbConnection.php";
require_once "Config/Pdo.php";

$db = new DbConnection();

$title = 'Add accommodation';


if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
    if (empty($_POST['name']) || empty($_POST['description']) || empty($_POST['accommodation_review'])) {
        echo "All fields required.";
        exit;
        }

        $imageId = null; // Default value

        if(!empty($FILES['image']['name'])) {
            $uploadDir = 'uploads/';
            $imageName = basename($FILES['image']['name']);
            $uploadFile = $uploadDir . $imageName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                echo "Image uploaded succesfully!";

                //Insert image in image table
                $queryImage = $db->getPdo()->prepare('INSERT INTO table image(file) VALUES (:file)');
                $queryImage ->bindParam(':file', $imageName, PDO::PARAM_STR);
                $queryImage ->execute();

                //Get last inserted image ID
            } else {
                echo "Error uploading image.";
                exit;
            }
        }

        $query = DbConnection::getPdo()->prepare('INSERT INTO accommodation
    (name, description, accommodation_review, image_id)
 VALUES (
         :name,
         :description,
         :accommodation_review,
         :image_id
 )
    ');
        $query->bindParam(':name',$_POST['name'],PDO::PARAM_STR);
        $query->bindParam(':description',$_POST['description'],PDO::PARAM_STR);
        $query->bindParam(':accommodation_review',$_POST['accommodation_review'],PDO::PARAM_STR);
        $query->bindParam(':image_id',$imageId,PDO::PARAM_INT);

        $query->execute();

        $_SESSION ['message_add_accommodation'] = 'annonce bien ajouté';

        header('Location: accommodation.php');

}else{
    echo 'impossible d \'arriver sur cette page en GET ';
}


