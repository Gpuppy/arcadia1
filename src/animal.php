<?php

use App\Config\DbConnection;


//require_once 'Config/pdo.php';
require_once __DIR__ . '/../src/Config/DbConnection.php';
require_once "../templates/header.php";

$db = new DbConnection();

$animal_id = 1;
$animal = '';
$image = 0;



$query = DbConnection::getPdo()->query("SELECT * FROM animal
                                                 JOIN race ON race.id = animal.race_id ");
$animals = $query->fetchAll(PDO::FETCH_ASSOC);

//SELECT animal.*, race.abel as race_abel FROM animal
//JOIN race ON race.id = animal.category_id;

$imageData = $query->fetchColumn();



?>
<main>
    <div class="text-center mb-5">
    <h1>Nos animaux </h1>
    </div>
    <?php
         if(isset($_SESSION['message_add_animal'])): ?>
    <div class="alert alert-success" role="alert" aria-live="assertive" aria-atomic="true">
        <?php echo $_SESSION['message_add_animal'];?>
        <?php unset($_SESSION['message_add_animal']);?>
    </div>
    <!--button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button--->

        <?php endif; ?>

<div class="container">
    <div class="row">
       <?php foreach ($animals as $animal): ?>

        <div class="col-sm-6 mb-3 mb-sm-0">
            <h4>Nom: <?php echo $animal['name']; ?> </h4>
            <div class="card h-100">
                <div class="card-body " >

                    <?php

                    $imagePath = 'uploads/' . $animal['image'];
                    if (file_exists($imagePath)) {
                        echo "<div>";
                        /*echo "<h4>{$animal['race_id']}</h4>";*/
                        echo "<h4>Race : {$animal['abel']}</h4>";
                        echo "<img src='{$imagePath}' alt='{$animal['name']} ' class='img-fluid' style='width: 300px; height: 250px; object-fit: cover;'>";
                        echo "<p>Etat: {$animal['state']}</p>";
                        echo "</div>";
                    } else {
                        echo "<p>Image for {$animal['name']} not found.</p>";
                    }

                    ?>

                    <a href="#"  class="btn btn-primary">Description</a>

                    <div id="modal-layer"></div>
                    <div id="modal">
                        <header>
                    <a href="#" class="btn btn-danger">Close</a>
                        </header>
                    </div>


                                                      </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <!--?php foreach ($animals as $animal): ?-->
    <!--?php echo $animals['id'].'' ?-->
    <!--?php endforeach; ?-->
</main>

<?php
require "../templates/footer.php";