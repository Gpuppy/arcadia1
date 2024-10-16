<?php

require_once 'config/pdo.php';
require_once 'index.php';
require_once 'config/DbConnection.php';


$animal_id = 1; // Example value for $animal_id (replace this with user input safely)
//$animal_id = $_GET['$animal_id'];

// Prepare the SQL statement with a placeholder
//$query = $pdo->prepare("SELECT * FROM animal WHERE id = :animal_id");
//$query = $pdo->prepare('SELECT * FROM animal');
$query = DbConnection::getPdo()->query("SELECT * FROM animal where id = ".$animal_id);
$animal = $query->fetchAll(PDO::FETCH_ASSOC);

$query = DbConnection::getPdo()->query("SELECT image FROM animal");
$images = $query->fetchAll(PDO::FETCH_ASSOC);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="' . $row['name'] . '" />';
    }
    }
//$animals = get_animals();
?>
<main>
    <div class="text-center mb-5">
    <h1>Nos animaux  </h1>
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
            <h4>Animaux: <?php echo $animal['name']; ?> </h4>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $animal['state'].'race_id'.$animal['race_id'].'abel'.$race['abel'].'image'.$animal['image']?> </h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <!--img src="..." class="img-fluid" alt="..."-->
                    <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="' . $row['name'] . '" />'; ?>
                    <!--div class="">
                    <img src="<?=$image['image']?>"
                         title="<?=$image['name'] ?>"
                         width='200' height='200'-->

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
require "./templates/footer.php";