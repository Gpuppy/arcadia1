<?php

use App\Config\DbConnection;

require_once "Config/DbConnection.php";

$title = 'Add an animal';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
    try {
        // Vérification des champs du formulaire
        if (empty($_POST['name']) || empty($_POST['state']) || empty($_POST['race']) || empty($_POST['description'])) {
            throw new Exception('Un des champs est vide. Insertion impossible.');
        }

        // Gestion du téléchargement de l'image
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true); // Crée le dossier si nécessaire
        }

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['image']['tmp_name'];
            $fileName = $_FILES['image']['name'];
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

            // Validation de l'extension de fichier
            if (!in_array($fileExtension, $allowedExtensions)) {
                throw new Exception('Type de fichier non autorisé. Extensions autorisées : jpg, jpeg, png, gif.');
            }

            // Génération d'un nom unique pour éviter les collisions
            $uniqueFileName = uniqid('', true) . '.' . $fileExtension;
            $fileDest = $uploadDir . $uniqueFileName;

            // Déplacement du fichier téléchargé
            if (!move_uploaded_file($fileTmpPath, $fileDest)) {
                throw new Exception('Erreur lors du téléchargement de l\'image.');
            }
        } else {
            throw new Exception('Aucune image sélectionnée ou erreur lors du téléchargement.');
        }

        // Insertion dans la base de données
        $query = DbConnection::getPdo()->prepare(
            'INSERT INTO animal (name, state, race_id, description, image) VALUES (:name, :state, :race, :description,:image)'
        );

        $query->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
        $query->bindParam(':state', $_POST['state'], PDO::PARAM_STR);
        $query->bindParam(':race', $_POST['race'], PDO::PARAM_STR);
        $query->bindParam(':description', $_POST['description'], PDO::PARAM_STR);
        $query->bindParam(':image', $uniqueFileName, PDO::PARAM_STR); // Utilisation du nom unique généré

        $query->execute();

        // Redirection ou message de succès
        $_SESSION['message_add_animal'] = 'Animal bien ajouté.';
        header('Location: animal_list.php');
        exit;

    } catch (Exception $e) {
        // Gestion des erreurs
        echo 'Erreur : ' . $e->getMessage();
    }
} else {
    echo 'Impossible d\'arriver sur cette page en GET.';

    //Update
    /*if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            // Ensure $id is set (e.g., via $_POST or $_GET)
            if (empty($_POST['id'])) {
                throw new Exception('ID is required for updating.');
            }

            $id = $_GET['id']; // Use proper validation

            $query = DbConnection::getPdo()->prepare(
                'UPDATE animal SET name= :name, state= :state, race_id = :race, image = :image WHERE id= :id '
            );

            $query->bindParam(':name', $_GET['name'], PDO::PARAM_STR);
            $query->bindParam(':state', $_GET['state'], PDO::PARAM_STR);
            $query->bindParam(':race', $_GET['race'], PDO::PARAM_INT);
            $query->bindParam(':image', $_GET['$uniqueFileName'], PDO::PARAM_STR);
            $query->bindParam(':id', $id, PDO::PARAM_INT);

            $query->execute();

            $_SESSION['message_update_animal'] = 'Animal mis a jour.';
            header('Location : animal.php');
            exit;

        } catch (Exception $e) {
            error_log('Error updating animal: ' . $e->getMessage());
            echo 'Erreur : ' . $e->getMessage();
        }

    }*/

    //Delete
    /*$animai_id = $_GET['$animal_id'];
    $query = DbConnection::getPdo()->prepare('DELETE FROM animal where id = '.$animal_id);
    $animal = $query->fetch(PDO::FETCH_ASSOC);
    header('Location:animal.php');*/
}