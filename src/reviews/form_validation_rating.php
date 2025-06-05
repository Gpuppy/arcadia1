<?php

use App\Config\DbConnection;

require_once "../Config/DbConnection.php";

$title = 'Add a rating';

if(isset($_POST['rating_data'])){

    $date = date('Y-m-d');

    $data = array(
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'rating' => $_POST['rating_data'],
        'user_review' => $_POST['user_review'],
        'date' => $date
    );
    $query = DbConnection::getPdo() ->prepare('INSERT INTO review 
    (name,email, rating, user_review, date)
        VALUES(:name,:email, :rating, :user_review, :date
            )');
    $query->bindParam(':name',$_POST['name'],PDO::PARAM_STR);
    $query->bindParam(':email',$_POST['email'],PDO::PARAM_STR);
    $query->bindParam(':user_review',$_POST['user_review'],PDO::PARAM_STR);
    $query->bindParam(':rating',$_POST['rating_data'],PDO::PARAM_STR);
    $query->bindParam(':date',$data['date'],PDO::PARAM_STR);

    $query->execute();

    echo 'Votre avis a bien été envoyé :)';
}

if(isset($_POST["action"]))
{
    $average_rating = 0;
    $total_review = 0;
    $five_star_review = 0;
    $four_star_review = 0;
    $three_star_review = 0;
    $two_star_review = 0;
    $one_star_review = 0;
    $total_user_review = 0;
    $review_content = array();

    $query = "
    SELECT * FROM review
    ORDER BY review_id DESC
    ";

    $result = $connect->query($query, PDO::FETCH_ASSOC);

    foreach ($result as $row)
    {
        $review_content[] = array(
            'name' => $row["name"],
            'email' => $row["email"],
            'user_review' => $row["user_review"],
            'rating' => $row["rating"],
            'date' => date('Y-m-d', $row["datetime"]),

        );
        if($row["user_rating"] == '5')
        {
            $five_star_review++;
        }
        if($row["user_rating"] == '4')
        {
            $four_star_review++;
        }
        if($row["user_rating"] == '3')
        {
            $three_star_review++;
        }
        if($row["user_rating"] == '2')
        {
            $two_star_review++;
        }
        if($row["user_rating"] == '1')
        {
            $one_star_review++;
        }
        $total_review++;

        $total_user_rating = $total_user_rating + $row["user_rating"];
    }
    $average_rating = $total_user_rating/ $total_review;

}

?>