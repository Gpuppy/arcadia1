<?php

use App\Config\DbConnection;

require_once __DIR__ . '/../src/Config/DbConnection.php';
require_once "../templates/header.php";


$db = new DbConnection();

//$animal_id = 1;
//$animal = '';

/*$query = DbConnection::getPdo()->query("SELECT * FROM animal
                                                JOIN race ON race.id = animal.race_id");*/

$query = DbConnection::getPdo()->query("SELECT animal.id AS animal_id, animal.name, animal.state, race.abel, animal.image
                                        FROM animal
                                        JOIN race ON race.id = animal.race_id");

$animals = $query->fetchAll(PDO::FETCH_ASSOC);


/*SELECT *
FROM users
JOIN orders ON users.id = orders.user_id;*/

?>

    <body>
<div class="container">
    <div class="row">
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Race</th>
            <th>State</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

       <?php foreach ($animals as $animal): ?>
           <tr>
               <td><?=$animal['animal_id']?></td>
               <td><?=$animal['name']?></td>
               <td><?=$animal['abel']?></td>
               <td><?=$animal['state']?></td>
               <td><?=$animal['image']?></td>
               <td>
                   <a class='btn btn-primary btn-sm' href='/edit.php?id=<?= $animal['animal_id'] ?>'>Edit</a>
                   <a class='btn btn-danger btn-sm' href='/delete.php?id=<?= $animal['animal_id'] ?>'>Delete</a>
               </td>
           </tr>
       <?php endforeach; ?>
                    <?php

                    $imagePath = 'uploads/' . $animal['image'];
                    if (file_exists($imagePath)) {

                        echo "
                       
                        </tbody>
                        </table>
                        ";

                    }


                    ?>

    </div>
</div>
    </body>


<a class="btn btn-success" href="/add_animal.php">Ajouter un animal</a>

<?php
require_once "../templates/footer.php";