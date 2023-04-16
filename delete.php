

<?php 
    require "connect.php";

    $data = ['suppForm' => $_POST['supprimer']]; 
    //var_dump($data); // test
    $supprimer = $database->prepare('DELETE FROM tweet 
    WHERE tweet_id = :suppForm');
    $supprimer->execute($data);

    header('Location: index.php')
?> 