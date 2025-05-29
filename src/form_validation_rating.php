<?php

use App\Config\DbConnection;

require_once "Config/DbConnection.php";

$title = 'Add a rating';

if(isset($_POST['rating_data'])){

    $data = array(
        'user_name' => $_POST['user_name'],
        'user_email' => $_POST['user_email'],
        'user_rating' => $_POST['user_data'],
        'user_review' => $_POST['user_review'],
        'datetime' => time()
    );
    $query = DbConnection::getPdo() ->Prepare('INSERT INTO review 
    (user_name,user_rating, user_review, user_email, user_data, :datetime)
        VALUES(
            
        ');
}