
<?php
    require "connect.php"; 

    $requete = $database->prepare("INSERT INTO tweet 
    (tweet_contenuTweet, tweet_tag, tweet_file) VALUES 
    (:formTweet, :formTag, :formFichier) ");

    $requete->execute(
        ["formTweet" => $_POST['tweet'],
        "formTag" => $_POST['select'],
        /* le $_FILES ne fonctionne pas, idk why */
        "formFichier" => $_POST['fichier']
        ]
    );

    /*
    if(isset($_FILES['fichier'])) {
        try {
            $requete = $database->prepare("INSERT INTO tweet (tweet_file)
            VALUES (:formFile) ");
            $requete->execute(["formFile" => $_FILES['fichier']]);
            echo "img dans la db";
        }
        catch (Exception $error) {
            echo $error->getMessage();
        }
    };
    */

    header('Location: index.php');
?>