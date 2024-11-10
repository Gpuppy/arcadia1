<?php

require_once 'config/session.php';
require_once 'config/session.php';

if(isset($_SESSION['user'])){
    unset($_SESSION['user']);

    $_SESSION['success_message'] = 'Vous avez bien été déconnecté';
}

header('Location: connection.php ');