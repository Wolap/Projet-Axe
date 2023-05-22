
<?php
    require 'connect.php';
    require 'login.php';

    /* pour recup les données */
    
    $requete = $database->prepare("SELECT * FROM tweet INNER JOIN user ON tweet.tweet_userid = user.user_id ORDER BY tweet_date DESC");
    $requete->execute();
    $tweets = $requete->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre style='color:white'>";
    //var_dump($tweets);
    echo "</pre>";

    $requete = $database->prepare("SELECT * FROM tweet WHERE tweet_tag = 'Code' ORDER BY tweet_date DESC ");
    $requete->execute();
    $tagsCode = $requete->fetchAll(PDO::FETCH_ASSOC);

    $requete = $database->prepare("SELECT * FROM tweet WHERE tweet_tag = 'Musique' ORDER BY tweet_date DESC ");
    $requete->execute();
    $tagsMusique = $requete->fetchAll(PDO::FETCH_ASSOC);

    $requete = $database->prepare("SELECT * FROM tweet WHERE tweet_tag = 'Trash' ORDER BY tweet_date DESC ");
    $requete->execute();
    $tagsTrash = $requete->fetchAll(PDO::FETCH_ASSOC);

    $requete = $database->prepare("SELECT * FROM user");
    $requete->execute();
    $infos = $requete->fetchAll( PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css"/>
    <title>Axe project</title>
</head>
<body id="body">

    <?php 
    /* Si l'utilisateur est co */
    if(isset($_SESSION['email'])) {
        echo "tu es co sur ton profile";
        
    ?>
        <section class="parties"> 
            <section class="left-part" id="left-part">     
                <img class="logo-site" id="logo-site" src="assets/images/raison.jpg" alt="logo_site">

                <div class="user-part" id="user-part"> 
                    <div class="user-menu" id="user-menu">
                        <img class="user-img-profile" src="assets/icones/icons8-user-48.png" alt="icone_profil_menu">
                        <a href="profil.php">Profile</a>
                    </div>

                    <div class="user-menu" id="user-menu-2">
                        <img src="assets/icones/icons8-home-page-48.png" alt="icone_home_menu">
                        <a href="index.php">Accueil</a>
                    </div>

                    <a href="index_login.php"> Connexion </a>
                </div>
            </section>

            <main class="mid-part" id="mid-part" >

                <nav class="sidenav">
                    <button class="btn-sidenav" id="btn-sidenav"> - </button>
                    <button class="btn-closenav" id="btn-closenav"> X </button>
                </nav>

                <div class="container-partage" id="container-partage" style="display: none;" >
                    <button class="btn-annuler" id="btn-annuler" > X </button>
                    <form action="insert_tweet.php" method="POST" class="partage-txt">
                        <label for="tweet"> Votre tweet </label>
                        <input type="text" name="tweet" id="input-tweet" onKeyUp="StoreTweetNotSent()">
                        <input type="file" name="fichier" id="fichier">
                    
                        <input type="hidden" name="pseudo-tweet" id="pseudo-tweet">

                        <label for="tag-select"> Sélectionnez un tag </label>
                        <select name="select" id="select" onChange="StoreTweetNotSent()"> 
                            <option value="Code"> Code</option>
                            <option value="musique"> Musique </option>
                            <option value="Trash"> Poubelle </option>
                        </select>
                            
                        <button class="btn-envoyer" type="submit" id="btn-envoyer"> Envoyer </button>  
                    </form>
                                    
                </div>


                <div class="container-mid" id="container-mid">
                    
                    <?php foreach($tweets as $tweet) { ?>
                        <div class="container-post">
                            
                            <p class="tweet"> <?php echo $tweet['tweet_contenuTweet']; ?></p>
                            <p class="date"> <?php echo $tweet['tweet_date']; ?></p>
                            <p class="tag"> <?php echo $tweet['tweet_tag']; ?> </p>
                            <p class="user"> <?php echo $tweet['user_pseudo']; ?> </p>
                            
                            <div class="container-suppr" id="container-suppr" style="display: none;">
                                <p> Etes vous sure de vouloir supprimez ce tweet ?</p>
                                <div class="container-btn-suppr">
                                    <button class="btn-non" id="btn-non"> Non</button>
                                    <form action="delete.php" method="POST">
                                        <input type="hidden" name="supprimer" value="<?php echo $tweet['tweet_id'];?>">
                                        <button type="submit" class="btn-oui" id="btn-oui"> Oui</button>
                                    </form>
                                </div>
                            </div>

                            <div class="container-btn-delete">
                                <button class="btn-delete" id="btn-delete"> <img src="assets/icones/icons8-trash-48.png"> </button>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                
                <div id="container-post-code" style="display: none;">
                    <?php foreach($tagsCode as $tagCode) { ?>
                        <div class="container-post-code">
                            <p class="tweet"> <?php echo $tagCode['tweet_contenuTweet'];?></p>
                            <p class="date"> <?php echo $tagCode['tweet_date']; ?></p>
                            <p class="tag"> <?php echo $tagCode['tweet_tag']; ?> </p>
                  
                        </div>

                    <?php } ?>
                </div>
                
                <div id="container-post-musique" style="display: none;">
                    <?php foreach($tagsMusique as $tagMusique) { ?>
                        <div class="container-post-code">
                            <p class="tweet"> <?php echo $tagMusique['tweet_contenuTweet'];?></p>
                            <p class="date"> <?php echo $tagMusique['tweet_date']; ?></p>
                            <p class="tag"> <?php echo $tagMusique['tweet_tag']; ?> </p>
                        </div>
                    <?php } ?>
                </div>

                <div id="container-post-trash" style="display: none;">
                    <?php foreach($tagsTrash as $tagTrash) { ?>
                        <div class="container-post-code">
                            <p class="tweet"> <?php echo $tagTrash['tweet_contenuTweet'];?></p>
                            <p class="date"> <?php echo $tagTrash['tweet_date']; ?></p>
                            <p class="tag"> <?php echo $tagTrash['tweet_tag']; ?> </p>
                        </div>
                    <?php } ?>
                </div>


                <div class="btn-post" id="btn-post">
                    <p> Post </p>
                </div>    
            </main>

            <section class="right-part" id="right-part"> 
                <p> Tags </p>
                <div class="container-tags">
                    <button class="btn-reset" id="btn-reset">Reset</button>
                    <button class="btn-code" id="btn-code"> Code </button>
                    <button class="btn-musique" id="btn-musique"> Musique </button>
                    <button class="btn-poubelle" id="btn-poubelle"> Poubelle </button>
                </div>
            </section>

        </section>
    <?php
    } 
    else {
    ?>
        <section class="parties"> 
            <section class="left-part" id="left-part">     
                <img class="logo-site" id="logo-site" src="assets/images/raison.jpg" alt="logo_site">

                <div class="user-part" id="user-part"> 

                    <div class="user-menu" id="user-menu-2">
                        <img src="assets/icones/icons8-home-page-48.png" alt="icone_home_menu">
                        <a href="index.php">Accueil</a>
                    </div>

                    <a href="inscription.html"> Inscription </a>
                    <a href="index_login.php"> Connexion </a>
                </div>
            </section>

            <main class="mid-part" id="mid-part" >

                <div class="container-inscription" id="container-inscription" 
                style="display: none;">
                    <p> Inscrivez vous !</p>
                    <a href="inscription.html"> Inscription </a>
                    <a href="index_login.php"> Connexion </a>
                </div>

                <nav class="sidenav">
                    <button class="btn-sidenav" id="btn-sidenav"> - </button>
                    <button class="btn-closenav" id="btn-closenav"> X </button>
                </nav>


                <div class="container-mid" id="container-mid">
                    <?php foreach($tweets as $tweet) { ?>
                        <div class="container-post">
                            <p class="tweet"> <?php echo $tweet['tweet_contenuTweet'];?></p>
                            <p class="date"> <?php echo $tweet['tweet_date'] ?></p>
                            <p class="tag"> <?php echo $tweet['tweet_tag'] ?> </p>
                            <p class="user"> <?php echo $tweet['user_pseudo']; ?> </p>
                        </div>
                    <?php } ?>
                </div>
                
                <div id="container-post-code" style="display: none;">
                    <?php foreach($tagsCode as $tagCode) { ?>
                        <div class="container-post-code">
                            <p class="tweet"> <?php echo $tagCode['tweet_contenuTweet'];?></p>
                            <p class="date"> <?php echo $tagCode['tweet_date']; ?></p>
                            <p class="tag"> <?php echo $tagCode['tweet_tag']; ?> </p>
                        </div>

                    <?php } ?>
                </div>
                
                <div id="container-post-musique" style="display: none;">
                    <?php foreach($tagsMusique as $tagMusique) { ?>
                        <div class="container-post-code">
                            <p class="tweet"> <?php echo $tagMusique['tweet_contenuTweet'];?></p>
                            <p class="date"> <?php echo $tagMusique['tweet_date']; ?></p>
                            <p class="tag"> <?php echo $tagMusique['tweet_tag']; ?> </p>
                        </div>
                    <?php } ?>
                </div>

                <div id="container-post-trash" style="display: none;">
                    <?php foreach($tagsTrash as $tagTrash) { ?>
                        <div class="container-post-code">
                            <p class="tweet"> <?php echo $tagTrash['tweet_contenuTweet'];?></p>
                            <p class="date"> <?php echo $tagTrash['tweet_date']; ?></p>
                            <p class="tag"> <?php echo $tagTrash['tweet_tag']; ?> </p>
                        </div>
                    <?php } ?>
                </div>   
            </main>

            <section class="right-part" id="right-part"> 
                <p> Tags </p>
                <div class="container-tags">
                    <button class="btn-reset" id="btn-reset">Reset</button>
                    <button class="btn-code" id="btn-code"> Code </button>
                    <button class="btn-musique" id="btn-musique"> Musique </button>
                    <button class="btn-poubelle" id="btn-poubelle"> Poubelle </button>
                </div>
            </section>

        </section>

    <?php    
    }
    ?>

    <script src="script.js"></script>
</body>
</html>