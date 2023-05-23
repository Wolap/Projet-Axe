
<?php
    require "connect.php"; 
    require "login.php"; 

    var_dump($_FILES);
    var_dump($_POST);

    if(isset($_FILES['fichier'])) {
        /* on rentre dans la condition vu que la requete part en bdd */

        /* stockage des infos du fichier dans var */
        /*tmp c'est l état tempo de l'img avant traitement */
        $tmpName = $_FILES['fichier']['tmp_name']; 
        $name = $_FILES['fichier']['name'];
        $size = $_FILES['fichier']['size'];

        $maxSize = 2097152;
        
        if($size <= $maxSize) {
            $link = 'tweet_images/' . $_FILES['fichier']['name'];

            /* fonction php qui déplace un fichier dl*/
            /* le __DIR__ indique répertoire fichier courant*/
            move_uploaded_file($tmpName, __DIR__ . "/" . $link);
        }
        else {
            echo "fichier trop volumineux";
        }

        //$link = 'tweet_images/' . $_FILES['fichier']['name'];
        //move_uploaded_file($tmpName, $link);
        
        $requete = $database->prepare("INSERT INTO tweet 
        (tweet_contenuTweet, tweet_tag, tweet_file, tweet_userid) VALUES 
        (:formTweet, :formTag, :formFile, :formUserid) ");

        $requete->execute(
            ["formTweet" => $_POST['tweet'],
            "formTag" => $_POST['select'],
            "formFile" => $link,
            "formUserid" => $_SESSION['id']]
        );
        
        header('Location: index.php');
    };

    $requete = $database->prepare("INSERT INTO tweet 
        (tweet_contenuTweet, tweet_tag, tweet_file, tweet_userid) VALUES 
        (:formTweet, :formTag, :formFile, :formUserid) ");

    $requete->execute(
        ["formTweet" => $_POST['tweet'],
        "formTag" => $_POST['select'],
        "formFile" => $_POST['fichier'],
        "formUserid" => $_SESSION['id']]
    ); 

    header('Location: index.php');

?>