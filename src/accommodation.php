<?php

use App\Config\DbConnection;


//require_once 'Config/pdo.php';
//require_once __DIR__ . '/../Config/DbConnection.php';
require_once __DIR__ . '/../src/Config/DbConnection.php';
require_once "../templates/header.php";
//require_once __DIR__ . '/../../templates/header.php';


$db = new DbConnection();

$animal_id = 1; // Example value for $animal_id (replace this with user input safely)
$image = 0;

$query = DbConnection::getPdo()->query("SELECT * FROM accommodation");
$accommodations = $query->fetchAll(PDO::FETCH_ASSOC);


?>
    <main>
        <div class="text-center mb-5">
            <h1>Nos habitats </h1>
        </div>
        <?php
        if(isset($_SESSION['message_add_accommodation'])): ?>
            <div class="alert alert-success" role="alert" aria-live="assertive" aria-atomic="true">
                <?php echo $_SESSION['message_add_accommodation'];?>
                <?php unset($_SESSION['message_add_accommodation']);?>
            </div>
            <!--button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button--->

        <?php endif; ?>

        <div class="container">
            <div class="row">
                <?php foreach ($accommodations as $accommodation): ?>

                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <h4>Habitats: <?php echo $accommodation['name']; ?> </h4>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"> <?php echo htmlspecialchars($accommodation['description']) . ' animal_id: ' . htmlspecialchars($accommodation['animal_id']) . ' abel image: ' . htmlspecialchars($accommodation['image']);?> </h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <!--img src="..." class="img-fluid" alt="..."-->

                                <!--div class="">
                                width='200' height='200'-->
                                <?php
                                if (!empty($accommodation['image'])) {
                                    echo '<img src="data:image/' . base64_encode($accommodation['image']) . '" alt="Data image' . htmlspecialchars($accommodation['name']) . '" class="img-fluid" />';
                                } else {
                                    echo '<p>No image available.</p>';
                                }
                                ?>


                                <a href="#" class="btn btn-primary">Go somewhere</a>
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
require_once '../templates/footer.php';