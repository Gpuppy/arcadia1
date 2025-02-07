<?php

require_once __DIR__ . '/vendor/autoload.php';
use App\Config\DbConnection;

$db = new DbConnection();


$title = 'Add accommodation';

require_once 'templates/header.php';

?>

    <div class="container">
        <h1>Ajouter un habitat</h1>
        <form action="src/form_validation_accommodation.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input class="form-control" id="name" name="name" placeholder="Nom" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input class="form-control" id="description" name="description" placeholder="">
            </div>


            <div class="mb-3">
                <label for="review" class="form-label">Avis</label>
                <input class="form-control" id="accomodation" name=accommodation_review placeholder="">
            </div>

            <div class="mb-3">
                <label for="animal" class="form-label">Animal</label>
                <input class="form-control" id="animal_id" name=animal_id placeholder="id">
            </div>



            <div class="mb-3">
                <label for="formFile" class="form-label">Image</label>
                <input class="form-control" type="file" id="formFile" name="image">

            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Enregistrer</button>
            </div>
        </form>
    </div>

<?php
require_once 'templates/footer.php';