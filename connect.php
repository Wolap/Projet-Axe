

<?php
    // contient de quoi se co à la base de donnée

    try {
        $database = new PDO(
        "mysql:host=localhost; dbname=axe_cdi",
        "root", // identifiant
        ""); // MDP
    }

    catch(PDOException $error) {
        die($error);
    }   

?>