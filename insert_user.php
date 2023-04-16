<?php
    require "connect.php";

    $requete = $database->prepare("INSERT INTO user 
    (user_mail, user_pseudo, user_password) VALUES 
    (:formEmail, :formPseudo, :formPassword)");

    $requete->execute(
        ["formEmail" => $_POST['email'],
        "formPseudo" => $_POST['pseudo'],
        "formPassword" => $_POST['password'] ]
    );

    header('Location: index.php'); 
    // faut pas oublier l'espace après les :
?>