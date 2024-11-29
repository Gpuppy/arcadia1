<?php

require_once __DIR__ . '/vendor/autoload.php';
//require_once 'config/pdo.php';
use App\Config\DbConnection;


$db = new DbConnection();

$title = 'Add an animal';

require_once 'templates/header.php';

?>

<div class="container">
    <h1>Ajouter un animal</h1>
<form action="src/form_validation_animal.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
    <label for="name" class="form-label">Nom</label>
    <input class="form-control" id="name" name="name" placeholder="Nom" required>
    </div>

    <div class="mb-3">
    <label for="state" class="form-label">Etat</label>
    <select name="state" id="state">
        <option value="Mauvais">Mauvais</option>
        <option value="Correct">Correct</option>
        <option value="Bien">Bien</option>
        <option value="Trés bien">Trés bien</option>
    </select>
    </div>

    <div class="mb-3">
    <label for="race" class="form-label">Race-id</label>
    <input class="form-control" id="race_id" name="race" placeholder="Race">
    </div>

    <div class="mb-3">
        <label for="abel" class="form-label">Race</label>
        <input class="form-control" id="abel" name="abel" placeholder="Race">
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" id="image" name="image" accept="image/*">

    </div>

    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Enregistrer</button>
    </div>
</form>
</div>

<?php
require_once 'templates/footer.php';