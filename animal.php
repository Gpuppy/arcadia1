<?php

require_once 'config/pdo.php';
require_once 'index.php';
//require_once 'config/DbConnection.php';

//$animal_id = 1; // Example value for $animal_id (replace this with user input safely)

// Prepare the SQL statement with a placeholder
//$query = $pdo->prepare("SELECT * FROM animal WHERE id = :animal_id");
$query = $pdo->prepare('SELECT * FROM animal');


//$animal_id = $_GET['animal_id'];

//$query = DbConnection::getPdo()->query("SELECT * FROM animal where id = ".$animal_id);
//$query = $pdo->query("SELECT * FROM animal where id = ".$animal_id);
$animal = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<main>


<div class="container">
    <div class="row">
        <?php foreach ($animals as $animal) { ?>

        <div class="col-sm-6 mb-3 mb-sm-0">
            <h4>Animaux: <?php echo $animal['name']; ?> </h4>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $animal['state'].'race_id'.$animal['race_id'].'abel'.$race['abel'].'image'.$animal['image']?> </h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                    <img width="100">
                                    </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <!--?php foreach ($animals as $animal): ?-->
    <!--?php echo $animals['id'].'' ?-->
    <!--?php endforeach; ?-->
</main>