<?php 
    require "connect.php";
    session_start();
     

    if(isset($_POST['connexion'])) {
        echo 'ok';

        $email = $_POST['email'];
        $password = $_POST['password'];
        $pseudo = $_POST['pseudo'];

        $requete = $database->prepare(
            "SELECT * FROM user WHERE user_mail = '$email' ");
        $requete->execute();

        /* rowCount pour voir s'il y a bien des users dans la table */
        if($requete->rowCount() > 0) {

            /* recup les infos et retourne en tableau*/
            $data = $requete->fetchAll();

            if($password == $data[0]["user_password"]) {
                echo "t'es co";

                $_SESSION['id'] = $data[0]["user_id"];
                $_SESSION['email'] = $data[0]["user_mail"];
                $_SESSION['pseudo'] = $data[0]["user_pseudo"];
                header('Location: profil.php?pseudo='.$_SESSION['pseudo']);
            }
        }
        else{
            header('Location: inscription.html'); 
        }
    }

?>