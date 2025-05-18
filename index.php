<?php

use App\Config\DbConnection;
use Dotenv\Dotenv;

require_once __DIR__ . '/vendor/autoload.php';
//require_once __DIR__ . '/../src/Config/DbConnection.php';
//require_once __DIR__ . '/../src/Config/session.php';


//$dotenv = Dotenv::createImmutable(__DIR__);
//$dotenv->load();

if (file_exists(__DIR__ . '/.env')) {
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}


//var_dump(getenv('APP_ENV'));


//require_once 'animal.php';


$db = new DbConnection();


$query = DbConnection::getPdo()->query('SELECT * FROM animal');
$animals = $query->fetchAll(PDO::FETCH_ASSOC);
//$animal = $query->fetch(PDO::FETCH_OBJ);
$race = $query->fetchAll(PDO::FETCH_ASSOC);
//$query = $pdo->query("SELECT * FROM user");
//$users = $query->fetchAll(PDO::FETCH_ASSOC);

//$animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
//print_r($animals);
//$stmt->closeCursor();
//print_r($animals);
//$infos = json_encode($animals);

//var_dump($animals);


//session_start();


//require_once 'Controller/HomeController.php';
require "templates/header.php";
?>
<?php
$user = '';
//echo $_SESSION['user']['name'];

//echo $_SESSION['user']['surname'];

?>
<body >

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arcadia</title>
</head>
<body>
<header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!--script src="public/js/app.js"></script-->

</header>

    <main>
        <div class="text-center">
        <h1>Zoo Arcadia<?php echo $_SESSION['test'] ?? null ?></h1></div>

            <!-- Carousel wrapper -->

        <div id="carouselExampleAutoplaying" class="carousel slide row text-center" data-bs-ride="carousel">
            <div class="carousel-inner center">
                <div class="carousel-item active ">
                    <img src="Images/ostrich-8579501_1280.jpg" class="img-fluid " alt="...">
                </div>
                <div class="carousel-item">
                    <img src="Images/penguin-6905568_1280.jpg" class="img-fluid " alt="...">
                </div>
                <div class="carousel-item">
                    <img src="Images/zebras-4258909_1280.jpg" class="img-fluid " alt="...">
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

        </div>

        <div class="text-center bg-secondary mt-3 mx-3 ">
            <h3>Présentation</h3>
        <h5>Arcadia est un zoo situé en France près de la forêt de Brocéliande, en bretagne depuis 1960. Ils possèdent tout un panel d’animaux, réparti par habitat (savane, jungle, marais) et font extrêmement attention à leurs santés.
            Les animaux sont heureux et cela fait la fierté de son directeur</h5>
        </div>

        <div class="text">
            <Témoignage>
                <?php
                $testimonials = [
                    [
                        "text" => "Phasellus sem justo, <a href='#'>pretium eu lacus ut</a>, aliquet diam. Morbi sit amet dolor eu erat ornare viverra.",
                        "author" => "Luna John",
                        "role" => "Marketer",
                        "image" => "https://randomuser.me/api/portraits/women/44.jpg"
                    ],
                    [
                        "text" => "Phasellus sem justo, <a href='#'>pretium eu lacus ut</a>, aliquet diam. Morbi sit amet dolor eu erat ornare viverra.",
                        "author" => "Mark Smith",
                        "role" => "Designer",
                        "image" => "https://randomuser.me/api/portraits/men/46.jpg"
                    ],
                    [
                        "text" => "Phasellus sem justo, <a href='#'>pretium eu lacus ut</a>, aliquet diam. Morbi sit amet dolor eu erat ornare viverra.",
                        "author" => "Michael Wilson",
                        "role" => "SEO",
                        "image" => "https://randomuser.me/api/portraits/men/33.jpg"
                    ],
                    [
                        "text" => "Phasellus sem justo, <a href='#'>pretium eu lacus ut</a>, aliquet diam. Morbi sit amet dolor eu erat ornare viverra.",
                        "author" => "Luke Reeves",
                        "role" => "Sales",
                        "image" => "https://randomuser.me/api/portraits/women/55.jpg"
                    ]
                ];
                ?>

                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <title>Témoignages</title>
                    <style>
                        body {
                            margin: 0;
                            font-family: Arial, sans-serif;
                        }

                        .testimonials-section {
                            background-color: #e9e9e9;
                            padding: 60px 20px;
                            text-align: center;
                        }

                        .testimonials-container {
                            display: flex;
                            flex-wrap: wrap;
                            justify-content: center;
                            gap: 30px;
                            margin-top: 40px;
                        }

                        .testimonial-card {
                            background: white;
                            padding: 30px 20px;
                            border-radius: 15px;
                            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
                            width: 100%;
                            max-width: 400px;
                            text-align: center;
                        }

                        .testimonial-card img {
                            width: 80px;
                            height: 80px;
                            object-fit: cover;
                            border-radius: 50%;
                            margin-bottom: 15px;
                        }

                        .testimonial-card p {
                            font-size: 15px;
                            margin-bottom: 15px;
                            color: #333;
                        }

                        .testimonial-card strong {
                            display: block;
                            font-weight: 600;
                            color: #111;
                        }

                        @media (min-width: 768px) {
                            .testimonial-card {
                                width: calc(50% - 30px);
                            }
                        }

                        a {
                            color: #3a63d1;
                            text-decoration: none;
                        }

                        a:hover {
                            text-decoration: underline;
                        }
                    </style>
                </head>
                <body>

                <div class="testimonials-section">
                    <h2>Témoignages</h2>
                    <p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>

                    <div class="testimonials-container">
                        <?php foreach ($testimonials as $t): ?>
                            <div class="testimonial-card">
                                <img src="<?= htmlspecialchars($t['image']) ?>" alt="<?= htmlspecialchars($t['author']) ?>">
                                <p><?= $t['text'] ?></p>
                                <strong><?= htmlspecialchars($t['author']) ?> - <?= htmlspecialchars($t['role']) ?></strong>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                </body>
                </html>
+
            </Témoignage>

        </div>


        <style>


            .carousel-item img{
                width: 70%; /* Set to your desired width */
                height: 500px; /* Set to your desired height */
                object-fit: cover; /* This will crop the image to fit */
                data-bs-interval="0.1";
            }

        </style>
        <!-- Carousel wrapper -->



        <?php
        if(isset($_SESSION['message'])): ?>
            <div class="alert alert-success" role="alert" aria-live="assertive" aria-atomic="true">
                <?php echo $_SESSION['message'];?>
                        <?php unset($_SESSION['message']);?>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
            <?php endif; ?>
        <?php if(isset($_SESSION['success_message'])):?>
        <div class="alert alert-success" role="alert">
            <?php
            echo $_SESSION['success_message'];
            unset($_SESSION['success_message']);
            ?>
            <?php endif; ?>



    </main>


</body>

<?php

require "templates/footer.php";
?>


