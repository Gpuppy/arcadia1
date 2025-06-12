<?php

require_once __DIR__ . '/../../vendor/autoload.php';

include '../../Src/Config/DbConnection.php';

use App\Config\DbConnection;

$db = new DbConnection();

$title = 'Delete animal';

require_once '../../templates/header.php';

$id = $_GET['id'] ?? $_POST['id'] ?? null;


$query = DbConnection::getPdo()->prepare(
    'SELECT animal.id, animal.name, animal.state, animal.race_id,animal.description, animal.image, race.abel AS race_abel
        FROM animal
        JOIN race ON animal.race_id = race.id
        WHERE animal.id = :id'
);
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();
$animal = $query->fetch(PDO::FETCH_ASSOC);


// Fetch all races for the dropdown
$racesQuery = DbConnection::getPdo()->query('SELECT id, abel FROM race');
$races = $racesQuery->fetchAll(PDO::FETCH_ASSOC);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {
        // Ensure $id is set
        if (empty($_POST['id'])) {
            throw new Exception('Animal ID is required for deletion.');
        }


        $id = $_POST["id"];



//Delete query
        $query = DbConnection::getPdo()->prepare(
            'DELETE FROM animal WHERE id = :id ');

        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();


        $_SESSION['message_deleted_animal'] = 'Animal effacé.';
        header('Location: /src/admin/animal_list.php');
        exit;

    } catch (Exception $e) {
        error_log('Error deleting animal: ' . $e->getMessage());
        echo 'Error : ' . $e->getMessage();
    }

}


?>

    <div class="container">
        <h1>Delete animal</h1>

        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($animal['id'] ?? ''); ?>">


            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo ($animal['name'] ?? ''); ?>" placeholder="Nom" >
            </div>

            <div class="mb-3">
                <label for="state" class="form-label">Etat</label>
                <input class="form-control" id="state" name="state" value="<?php echo ($animal['state'] ?? ''); ?>"  >
                    <!--option value="Mauvais">Mauvais</option>
                    <option value="Correct">Correct</option>
                    <option value="Bien">Bien</option>
                    <option value="Trés bien">Trés bien</option-->
                </input>
            </div>


            <div class="mb-3">
                <label for="race_id" class="form-label">Race</label>
                <select class="form-control" id="race_id" name="race_id" >
                    <?php foreach ($races as $race): ?>
                        <option value="<?= $race['id']; ?>"
                            <?= $animal['race_id'] == $race['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($race['abel']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="<?php echo ($animal['description'] ?? ''); ?>" placeholder=">Description" >
            </div>



                <?php if(!empty($animal['image'])): ?>
                    <img src="/uploads/<?= ($animal['image']); ?>" alt="Animal Image" width="100">
                <?php endif;?>


            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Effacer</button>
            </div>
        </form>
    </div>

<?php
require_once '../../templates/footer.php';
