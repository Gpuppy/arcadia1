<?php

//require_once __DIR__ . '/vendor/autoload.php';
require_once "Src/Config/DbConnection.php";
//require_once 'config/pdo.php';
use App\Config\DbConnection;


$db = new DbConnection();

$title = 'Edit animal';

require_once 'templates/header.php';

$id = $_GET['id'] ?? $_POST['id'] ?? null;


if (!$id) {
    die('Error: Animal ID is required.');
}

if (!$id) {
    die('Error: Animal ID is missing.');
}
echo 'ID: ' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . '<br>';


// Fetch existing animal data for the form
try{
    $query = DbConnection::getPdo()->prepare('SELECT * FROM animal WHERE id = :id');
    $query->bindParam(':id',$id, PDO::PARAM_INT);
    $query->execute();
    $animal = $query->fetch(PDO::FETCH_ASSOC);

    if(!$animal){
        throw new Exception('Animal not found.');
    }
} catch (Exception $e){
    die('Error: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8'));
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Ensure $id is set (e.g., via $_POST or $_GET)
        if (empty($_POST['name']) || empty($_POST['state']) || empty($_POST['race']) || empty($_POST['image'])) {
                        throw new Exception('ID is required for updating.');
        }


        //$id = $_POST["id"];
        $name = $_POST["name"];
        $state = $_POST["state"];
        $race = $_POST["race"];
        $image = $_FILES["image"]/*["name"]*/ ?? null;

        // Process uploaded image if provided
        if ($image) {
            $uploadDir = __DIR__ . '/uploads/';
            $uniqueFileName = uniqid() . '-' . basename($image);
            $targetFile = $uploadDir . $uniqueFileName;

            if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                throw new Exception('Failed to upload image.');
            }
        } else {
            $uniqueFileName = null;
        }



        $query = DbConnection::getPdo()->prepare(
        'UPDATE animal SET 
                  name= :name, 
                  state= :state, 
                  race_id = :race, 
                  image = :image 
              WHERE id= :id '


    );
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':state', $state, PDO::PARAM_STR);
    $query->bindParam(':race', $race_id, PDO::PARAM_INT);
    $query->bindParam(':image', $uniqueFileName, PDO::PARAM_STR);
    $query->bindParam(':id', $id, PDO::PARAM_INT);

    $query->execute();

    $_SESSION['message_update_animal'] = 'Animal mis a jour.';
    header('Location: animal.php');
    exit;

} catch (Exception $e) {
    error_log('Error updating animal: ' . $e->getMessage());
    echo 'Error : ' . $e->getMessage();
}

    }else{
    // POST method: update animal data
}



?>

    <div class="container">
        <h1>Edit animal</h1>
        <!--form action="src/animal_list.php" method="post" enctype="multipart/form-data"--->
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($animal['$id'] ?? ''); ?>">

            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo ($animal['name'] ?? ''); ?>" placeholder="Nom" required>
            </div>

            <div class="mb-3">
                <label for="state" class="form-label">Etat</label>
                <input class="form-control" id="state" name="state" value="<?php echo ($animal['state'] ?? ''); ?>"  required>
                <!--select name="state" id="state">
                    <option value="Mauvais">Mauvais</option>
                    <option value="Correct">Correct</option>
                    <option value="Bien">Bien</option>
                    <option value="Trés bien">Trés bien</option>
                </select-->
            </div>

            <!--div class="mb-3">
                <label for="race" class="form-label">Race-id</label>
                <input class="form-control" id="race_id" name="race" placeholder="Race">
            </div-->

            <div class="mb-3">
                <label for="abel" class="form-label">Race</label>
                <input class="form-control" id="abel" name="abel" value="<?php echo htmlspecialchars($animal['race'] ?? ''); ?>" placeholder="Race">
            </div>

            <!---div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" id="image" name="image" accept="image/*">

            </div-->

            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Enregistrer</button>
            </div>
        </form>
    </div>

<?php
require_once 'templates/footer.php';
