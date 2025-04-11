<?php

require_once __DIR__ . '/vendor/autoload.php';

include 'Src/Config/DbConnection.php';
//require_once 'config/pdo.php';
use App\Config\DbConnection;


$db = new DbConnection();

$title = 'Edit animal';

require_once 'templates/header.php';

$id = $_GET['id'] ?? $_POST['id'] ?? null;


if (!$id) {
    die('Error: Animal ID is required.');
}


$query = DbConnection::getPdo()->prepare(
        'SELECT animal.id, animal.name, animal.state, animal.race_id, animal.image, race.abel AS race_abel
        FROM animal
        JOIN race ON animal.race_id = race.id
        WHERE animal.id = :id'
);
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();
$animal = $query->fetch(PDO::FETCH_ASSOC);

if (!$animal) {
    die('Error: Animal not found.');
}

// Fetch all races for the dropdown
$racesQuery = DbConnection::getPdo()->query('SELECT id, abel FROM race');
$races = $racesQuery->fetchAll(PDO::FETCH_ASSOC);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {
        // Ensure $id is set (e.g., via $_POST or $_GET)
        if (empty($_POST['id']) ||  empty($_POST['name']) || empty($_POST['state']) || empty($_POST['race_id']) || empty($_POST['description'])/*|| empty($_POST['image'])*/) {
                        throw new Exception('All fields are required.');
        }


        $id = $_POST["id"];
        $name = $_POST["name"];
        $state = $_POST["state"];
        $race_id = $_POST["race_id"];
        $race_id = $_POST["description"];
        $image = $_FILES["image"]["name"] ?? null;

        // Process uploaded image if provided
        if ($image) {
            $uploadDir = __DIR__ . '/src/uploads/';
            $uniqueFileName = uniqid() . '-' . basename($image);
            $targetFile = $uploadDir . $uniqueFileName;

            if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                throw new Exception('Failed to upload image.');
            }
        } else {
            $uniqueFileName = $animal['image']; // Use the existing image if no new file is uploaded

        }



// Update query
        $query = DbConnection::getPdo()->prepare(
        'UPDATE animal SET 
                  name= :name, 
                  state= :state, 
                  race_id = :race_id, 
                  description = :description, 
                  image = :image 
              WHERE id= :id '


    );
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':state', $state, PDO::PARAM_STR);
    $query->bindParam(':race_id', $race_id, PDO::PARAM_INT);
    $query->bindParam(':description', $description, PDO::PARAM_INT);
    $query->bindParam(':image', $uniqueFileName, PDO::PARAM_STR);
    $query->bindParam(':id', $id, PDO::PARAM_INT);

    $query->execute();



    $_SESSION['message_update_animal'] = 'Animal mis a jour.';
    header('Location: /src/animal.php');
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
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($animal['id'] ?? ''); ?>">


            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo ($animal['name'] ?? ''); ?>" placeholder="Nom" required>
            </div>

            <div class="mb-3">
                <label for="state" class="form-label">Etat</label>
                <select class="form-control" id="state" name="state" value="<?php echo ($animal['state'] ?? ''); ?>"  required>
                <!--select name="state" id="state"-->
                    <option value="Mauvais">Mauvais</option>
                    <option value="Correct">Correct</option>
                    <option value="Bien">Bien</option>
                    <option value="Trés bien">Trés bien</option>
                </select>
            </div>

            <!----------Race------------->
            <!--div class="mb-3">
                <label for="race_id" class="form-label">Race</label>
                <input class="form-control" id="race_id" name="race" value="<!-?php echo ($animal['race_id'] ?? ''); ?>" placeholder="Race_id">
            </div>

            <div class="mb-3">
                <label for="abel" class="form-label">Race</label>
                <input class="form-control" id="race_abel" name="abel" value="<!-?php echo ($race['abel'] ?? ''); ?>" placeholder="Race">
            </div--->
            <div class="mb-3">
                <label for="race_id" class="form-label">Race</label>
                <select class="form-control" id="race_id" name="race_id" required>
                    <?php foreach ($races as $race): ?>
<option value="<?= $race['id']; ?>"
        <?= $animal['race_id'] == $race['id'] ? 'selected' : '' ?>>
        <?= htmlspecialchars($race['abel']); ?>
        </option>
                    <?php endforeach; ?>
                </select>

            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Nom</label>
                <input type="text" class="form-control" id="description" name="description" value="<?php echo ($animal['description'] ?? ''); ?>" placeholder="Descripion" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-label" id="image" name="image">
                <?php if(!empty($animal['image'])): ?>
                   <img src="/uploads/<?= ($animal['image']); ?>" alt="Animal Image" width="100">
         <?php endif;?>
            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Enregistrer</button>
            </div>
        </form>
    </div>

<?php
require_once 'templates/footer.php';
