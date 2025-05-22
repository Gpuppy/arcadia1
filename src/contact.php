<?php
session_start();
use App\Config\DbConnection;

require_once __DIR__ . '/../src/Config/DbConnection.php';
require_once "../templates/header.php";

$db = new DbConnection();
//$version = '';
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

//var_dump($_ENV['SMTP_USERNAME'] ?? 'not set', getenv('SMTP_USERNAME'));
//var_dump($_ENV('SMTP_USERNAME'), $_ENV('SMTP_PASSWORD'));


session_unset();

?>

<body>

<div class="mb-3">
<form class="contact-form" action="contact_form.php" method="post">
    <h3>Formulaire de Contact</h3>
    <div class="row">
        Nom :<input type="text" name="name" class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>" value="<?= htmlspecialchars($old['name'] ?? '') ?>">
        <div class="invalid-feedback"><?= $errors['name'] ?? '' ?></div>

        Email:<input type="text" name="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" value="<?= htmlspecialchars($old['email'] ?? '') ?>">
        <div class="invalid-feedback"><?= $errors['email'] ?? '' ?></div>

        Sujet:<input type="text" name="subject" class="form-control <?= isset($errors['subject']) ? 'is-invalid' : '' ?>" value="<?= htmlspecialchars($old['subject'] ?? '') ?>">
        <div class="invalid-feedback"><?= $errors['subject'] ?? '' ?></div>

        Message:<textarea name="message" rows="5" class="form-control <?= isset($errors['message']) ? 'is-invalid' : '' ?>" value="<?= htmlspecialchars($old['message'] ?? '') ?>"></textarea>
        <div class="invalid-feedback "><?= $errors['message'] ?? '' ?></div>

        <div class="button">
        <button type="submit" class="btn btn-success btn-sm mt-3">Envoyer</button>
        </div>


</form>
</body>

<?php
require "../templates/footer.php";
?>