<?php

require_once 'Config/session.php';
require_once 'Config/session.php';

if(isset($_SESSION['user'])){
    unset($_SESSION['user']);

    $_SESSION['success_message'] = 'Vous avez bien été déconnecté';
}

header('Location: connection.php ');