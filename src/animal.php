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
    <!--script src="/js/app.js"></script-->
    <script src="/public/js/app.js"></script>

    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
        }
        .modal.show {
            display: flex;
        }
        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
        }
    </style>


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

                   <!----MODAL------->
                    <button class="open-modal btn btn-success" data-description="<?= htmlspecialchars($animal['description']) ?>">Description</button>

                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

    <div id="animal-modal" class="modal"  aria-modal="true" tabindex="-1">
        <div class="modal-content">
            <h2>Description</h2>
            <p id="modal-description">Loading...</p>
            <button class="close-modal">Fermer</button>
        </div>
    </div>
</main>


<?php
require "../templates/footer.php";