<?php

use Src\Config\DbConnection;


$title = 'Add accommodation';

require_once 'templates/header.php';

?>

    <div class="container">
        <h1>Ajouter un habitat</h1>
        <form action="src/form_validation_accommodation.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input class="form-control" id="name" name="name" placeholder="Nom" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input class="form-control" id="description" name="description" placeholder="Description">
            </div>


            <div class="mb-3">
                <label for="review" class="form-label">Accommodation_Review</label>
                <input class="form-control" id="accommodation" name=accommodation placeholder="Accommodation_Review">
            </div>

            <div class="mb-3">
                <label for="animal" class="form-label"></label>
                <input class="form-control" id="accommodation" name=animal_id placeholder="Animal_id">
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