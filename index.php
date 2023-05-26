
<?php
    require 'connect.php';
    require 'login.php';

    /* pour recup les données */
    
    $requete = $database->prepare("SELECT * FROM tweet INNER JOIN user ON tweet.tweet_userid = user.user_id ORDER BY tweet_date DESC");
    $requete->execute();
    $tweets = $requete->fetchAll(PDO::FETCH_ASSOC);

    $requete = $database->prepare("SELECT * FROM tweet INNER JOIN user ON tweet.tweet_userid = user.user_id WHERE tweet_tag = 'Code' ORDER BY tweet_date DESC ");
    $requete->execute();
    $tagsCode = $requete->fetchAll(PDO::FETCH_ASSOC);

    $requete = $database->prepare("SELECT * FROM tweet INNER JOIN user ON tweet.tweet_userid = user.user_id WHERE tweet_tag = 'Musique' ORDER BY tweet_date DESC ");
    $requete->execute();
    $tagsMusique = $requete->fetchAll(PDO::FETCH_ASSOC);

    $requete = $database->prepare("SELECT * FROM tweet INNER JOIN user ON tweet.tweet_userid = user.user_id WHERE tweet_tag = 'Trash' ORDER BY tweet_date DESC ");
    $requete->execute();
    $tagsTrash = $requete->fetchAll(PDO::FETCH_ASSOC);

    $requete = $database->prepare("SELECT * FROM tweet INNER JOIN user ON tweet.tweet_userid = user.user_id WHERE tweet_tag = 'JeuxVideos' ORDER BY tweet_date DESC ");
    $requete->execute();
    $tagsJV = $requete->fetchAll(PDO::FETCH_ASSOC);

    $requete = $database->prepare("SELECT * FROM tweet INNER JOIN user ON tweet.tweet_userid = user.user_id WHERE tweet_tag = 'Art' ORDER BY tweet_date DESC ");
    $requete->execute();
    $tagsArt = $requete->fetchAll(PDO::FETCH_ASSOC);

    $requete = $database->prepare("SELECT * FROM tweet INNER JOIN user ON tweet.tweet_userid = user.user_id WHERE tweet_tag = 'Temps' ORDER BY tweet_date DESC ");
    $requete->execute();
    $tagsTemps = $requete->fetchAll(PDO::FETCH_ASSOC);

    $requete = $database->prepare("SELECT * FROM tweet INNER JOIN user ON tweet.tweet_userid = user.user_id WHERE tweet_tag = 'News' ORDER BY tweet_date DESC ");
    $requete->execute();
    $tagsNews = $requete->fetchAll(PDO::FETCH_ASSOC);

    $requete = $database->prepare("SELECT * FROM tweet INNER JOIN user ON tweet.tweet_userid = user.user_id WHERE tweet_tag = 'Apprentissage' ORDER BY tweet_date DESC ");
    $requete->execute();
    $tagsApprendre = $requete->fetchAll(PDO::FETCH_ASSOC);

    $requete = $database->prepare("SELECT * FROM tweet INNER JOIN user ON tweet.tweet_userid = user.user_id WHERE tweet_tag = 'Mood' ORDER BY tweet_date DESC ");
    $requete->execute();
    $tagsMood = $requete->fetchAll(PDO::FETCH_ASSOC);

    $requete = $database->prepare("SELECT * FROM tweet INNER JOIN user ON tweet.tweet_userid = user.user_id WHERE tweet_tag = 'Guerre' ORDER BY tweet_date DESC ");
    $requete->execute();
    $tagsGuerre = $requete->fetchAll(PDO::FETCH_ASSOC);

    $requete = $database->prepare("SELECT * FROM user");
    $requete->execute();
    $infos = $requete->fetchAll( PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">
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
    if(isset($_SESSION['email'])) { ?>
    
        <section class="parties"> 
            <section class="left-part" id="left-part">     
                <img class="logo-site" id="logo-site" src="assets/images/raison.jpg" alt="logo_site">

                <div class="user-part" id="user-part"> 
                    <div class="user-menu" id="user-menu">
                        <img class="user-img-profile" src="assets/icones/icons8-user-48.png" alt="icone_profil_menu">
                        <a href="profil.php?pseudo=<?php echo $_SESSION['pseudo']; ?>">Profile</a>
                    </div>

                    <div class="user-menu" id="user-menu-2">
                        <img src="assets/icones/icons8-home-page-48.png" alt="icone_home_menu">
                        <a href="index.php">Accueil</a>
                    </div>

                    <a href="index_login.php"> Connexion </a>
                </div>
            </section>

            <main class="mid-part" id="mid-part" >

                <aside class="sidenav">
                    <button class="btn-sidenav" id="btn-sidenav"> - </button>
                    <button class="btn-closenav" id="btn-closenav"> X </button>
                </aside>

                <div class="container-partage" id="container-partage" style="display: none;" >
                    <button class="btn-annuler" id="btn-annuler" > X </button>
                    <form action="insert_tweet.php" method="POST" class="partage-txt" enctype="multipart/form-data">
                        <label for="tweet"> Votre tweet </label>
                        <input type="text" name="tweet" id="input-tweet" onKeyUp="StoreTweetNotSent()">
                        <input type="file" name="fichier" id="fichier" accept=".png, .gif, .jpg">
                    
                        <input type="hidden" name="pseudo-tweet" id="pseudo-tweet">

                        <label for="tag-select"> Sélectionnez un tag </label>
                        <select name="select" id="select" onChange="StoreTweetNotSent()"> 
                            <option value="Code"> Code </option>
                            <option value="Musique"> Musique </option>
                            <option value="Trash"> Poubelle </option>
                            <option value="JeuxVideos"> Jeux vidéos </option>
                            <option value="Art"> Art </option>
                            <option value="Temps"> Temps </option>
                            <option value="News"> News </option>
                            <option value="Apprentissage"> Apprentissage </option>
                            <option value="Mood"> Mood </option>
                            <option value="Guerre"> Guerre </option>
                        </select>
                            
                        <button class="btn-envoyer" type="submit" id="btn-envoyer"> Envoyer </button>  
                    </form>
                                    
                </div>


                <div class="container-mid" id="container-mid">
                    
                    <?php foreach($tweets as $tweet) { ?>
                        <div class="container-post" id="container-post">
                            
                            <p class="user"> <?php echo $tweet['user_pseudo']; ?> </p>
                            <p class="date"> <?php echo $tweet['tweet_date']; ?></p>
                            <p class="tag"> <?php echo $tweet['tweet_tag']; ?> </p>
                            <p class="tweet"> <?php echo $tweet['tweet_contenuTweet']; ?></p>

                            <?php  if(!is_null($tweet['tweet_file']) && $tweet['tweet_file'] != "tweet_images/") { ?>
                                <img class="img-tweet" src=" <?php echo $tweet['tweet_file'] ?>">
                            <?php } ?>
                            
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
                    <?php foreach($tagsCode as $tagCode) { 
                       
                        ?>
                        <div class="container-post">
                            <p class="user"> <?php echo $tagCode['user_pseudo']; ?> </p>
                            <p class="date"> <?php echo $tagCode['tweet_date']; ?></p>
                            <p class="tag"> <?php echo $tagCode['tweet_tag']; ?> </p>
                            <p class="tweet"> <?php echo $tagCode['tweet_contenuTweet']; ?></p>

                            <?php  if(!is_null($tagCode['tweet_file']) && $tagCode['tweet_file'] != "tweet_images/") { ?>
                                <img class="img-tweet" src=" <?php echo $tagCode['tweet_file'] ?>">
                            <?php } ?>
                  
                        </div>

                    <?php } ?>
                </div>
                
                <div id="container-post-musique" style="display: none;">
                    <?php foreach($tagsMusique as $tagMusique) { ?>
                        <div class="container-post">
                            <p class="user"> <?php echo $tagMusique['user_pseudo']; ?> </p>
                            <p class="date"> <?php echo $tagMusique['tweet_date']; ?></p>
                            <p class="tag"> <?php echo $tagMusique['tweet_tag']; ?> </p>
                            <p class="tweet"> <?php echo $tagMusique['tweet_contenuTweet']; ?></p>

                            <?php  if(!is_null($tagMusique['tweet_file']) && $tagMusique['tweet_file'] != "tweet_images/") { ?>
                                <img class="img-tweet" src=" <?php echo $tagMusique['tweet_file'] ?>">
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <div id="container-post-trash" style="display: none;">
                    <?php foreach($tagsTrash as $tagTrash) { ?>
                        <div class="container-post">
                            <p class="user"> <?php echo $tagTrash['user_pseudo']; ?> </p>
                            <p class="date"> <?php echo $tagTrash['tweet_date']; ?></p>
                            <p class="tag"> <?php echo $tagTrash['tweet_tag']; ?> </p>
                            <p class="tweet"> <?php echo $tagTrash['tweet_contenuTweet']; ?></p>

                            <?php  if(!is_null($tagTrash['tweet_file']) && $tagTrash['tweet_file'] != "tweet_images/") { ?>
                                <img class="img-tweet" src=" <?php echo $tagTrash['tweet_file'] ?>">
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <div id="container-post-jv" style="display: none;">
                    <?php foreach($tagsJV as $tagJV) { ?>
                        <div class="container-post">
                            <p class="user"> <?php echo $tagJV['user_pseudo']; ?> </p>
                            <p class="date"> <?php echo $tagJV['tweet_date']; ?></p>
                            <p class="tag"> <?php echo $tagJV['tweet_tag']; ?> </p>
                            <p class="tweet"> <?php echo $tagJV['tweet_contenuTweet']; ?></p>

                            <?php  if(!is_null($tagJV['tweet_file']) && $tagJV['tweet_file'] != "tweet_images/") { ?>
                                <img class="img-tweet" src=" <?php echo $tagJV['tweet_file'] ?>">
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <div id="container-post-art" style="display: none;">
                    <?php foreach($tagsArt as $tagArt) { ?>
                        <div class="container-post">
                            <p class="user"> <?php echo $tagArt['user_pseudo']; ?> </p>
                            <p class="date"> <?php echo $tagArt['tweet_date']; ?></p>
                            <p class="tag"> <?php echo $tagArt['tweet_tag']; ?> </p>
                            <p class="tweet"> <?php echo $tagArt['tweet_contenuTweet']; ?></p>

                            <?php  if(!is_null($tagArt['tweet_file']) && $tagArt['tweet_file'] != "tweet_images/") { ?>
                                <img class="img-tweet" src=" <?php echo $tagArt['tweet_file'] ?>">
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <div id="container-post-temps" style="display: none;">
                    <?php foreach($tagsTemps as $tagTemps) { ?>
                        <div class="container-post">
                            <p class="user"> <?php echo $tagTemps['user_pseudo']; ?> </p>
                            <p class="date"> <?php echo $tagTemps['tweet_date']; ?></p>
                            <p class="tag"> <?php echo $tagTemps['tweet_tag']; ?> </p>
                            <p class="tweet"> <?php echo $tagTemps['tweet_contenuTweet']; ?></p>

                            <?php  if(!is_null($tagTemps['tweet_file']) && $tagTemps['tweet_file'] != "tweet_images/") { ?>
                                <img class="img-tweet" src=" <?php echo $tagTemps['tweet_file'] ?>">
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <div id="container-post-news" style="display: none;">
                    <?php foreach($tagsNews as $tagNews) { ?>
                        <div class="container-post">
                            <p class="user"> <?php echo $tagNews['user_pseudo']; ?> </p>
                            <p class="date"> <?php echo $tagNews['tweet_date']; ?></p>
                            <p class="tag"> <?php echo $tagNews['tweet_tag']; ?> </p>
                            <p class="tweet"> <?php echo $tagNews['tweet_contenuTweet']; ?></p>

                            <?php  if(!is_null($tagNews['tweet_file']) && $tagNews['tweet_file'] != "tweet_images/") { ?>
                                <img class="img-tweet" src=" <?php echo $tagNews['tweet_file'] ?>">
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <div id="container-post-apprendre" style="display: none;">
                    <?php foreach($tagsApprendre as $tagApprendre) { ?>
                        <div class="container-post">
                            <p class="user"> <?php echo $tagApprendre['user_pseudo']; ?> </p>
                            <p class="date"> <?php echo $tagApprendre['tweet_date']; ?></p>
                            <p class="tag"> <?php echo $tagApprendre['tweet_tag']; ?> </p>
                            <p class="tweet"> <?php echo $tagApprendre['tweet_contenuTweet']; ?></p>

                            <?php  if(!is_null($tagApprendre['tweet_file']) && $tagApprendre['tweet_file'] != "tweet_images/") { ?>
                                <img class="img-tweet" src=" <?php echo $tagApprendre['tweet_file'] ?>">
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <div id="container-post-mood" style="display: none;">
                    <?php foreach($tagsMood as $tagMood) { ?>
                        <div class="container-post">
                            <p class="user"> <?php echo $tagMood['user_pseudo']; ?> </p>
                            <p class="date"> <?php echo $tagMood['tweet_date']; ?></p>
                            <p class="tag"> <?php echo $tagMood['tweet_tag']; ?> </p>
                            <p class="tweet"> <?php echo $tagMood['tweet_contenuTweet']; ?></p>

                            <?php  if(!is_null($tagMood['tweet_file']) && $tagMood['tweet_file'] != "tweet_images/") { ?>
                                <img class="img-tweet" src=" <?php echo $tagMood['tweet_file'] ?>">
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <div id="container-post-guerre" style="display: none;">
                    <?php foreach($tagsGuerre as $tagGuerre) { ?>
                        <div class="container-post">
                            <p class="user"> <?php echo $tagGuerre['user_pseudo']; ?> </p>
                            <p class="date"> <?php echo $tagGuerre['tweet_date']; ?></p>
                            <p class="tag"> <?php echo $tagGuerre['tweet_tag']; ?> </p>
                            <p class="tweet"> <?php echo $tagGuerre['tweet_contenuTweet']; ?></p>

                            <?php  if(!is_null($tagGuerre['tweet_file']) && $tagGuerre['tweet_file'] != "tweet_images/") { ?>
                                <img class="img-tweet" src=" <?php echo $tagGuerre['tweet_file'] ?>">
                            <?php } ?>
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
                    <button class="btn-JV" id="btn-JV"> Jeux Vidéos </button>
                    <button class="btn-art" id="btn-art"> Art </button>
                    <button class="btn-temps" id="btn-temps"> Temps </button>
                    <button class="btn-news" id="btn-news"> News </button>
                    <button class="btn-apprendre" id="btn-apprendre"> Apprentissage </button>
                    <button class="btn-mood" id="btn-mood"> Mood </button>
                    <button class="btn-guerre" id="btn-guerre"> Guerre </button>
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

                <div class="container-inscription" id="container-inscription" style="display: none;">
                    <p> Inscrivez vous !</p>
                    <a href="inscription.html"> Inscription </a>
                    <a href="index_login.php"> Connexion </a>
                </div>

                <aside class="sidenav">
                    <button class="btn-sidenav" id="btn-sidenav"> - </button>
                    <button class="btn-closenav" id="btn-closenav"> X </button>
                </aside>


                <div class="container-mid" id="container-mid">
                    <?php foreach($tweets as $tweet) { ?>
                        <div class="container-post">
                            <p class="user"> <?php echo $tweet['user_pseudo']; ?> </p>
                            <p class="date"> <?php echo $tweet['tweet_date']; ?></p>
                            <p class="tag"> <?php echo $tweet['tweet_tag']; ?> </p>
                            <p class="tweet"> <?php echo $tweet['tweet_contenuTweet']; ?></p>

                            <?php  if(!is_null($tweet['tweet_file']) && $tweet['tweet_file'] != "tweet_images/") { ?>
                                <img class="img-tweet" src=" <?php echo $tweet['tweet_file'] ?>">
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
                
                <div id="container-post-code" style="display: none;">
                    <?php foreach($tagsCode as $tagCode) { ?>
                        <div class="container-post">
                            <p class="user"> <?php echo $tagCode['user_pseudo']; ?> </p>
                            <p class="date"> <?php echo $tagCode['tweet_date']; ?></p>
                            <p class="tag"> <?php echo $tagCode['tweet_tag']; ?> </p>
                            <p class="tweet"> <?php echo $tagCode['tweet_contenuTweet']; ?></p>

                            <?php  if(!is_null($tagCode['tweet_file']) && $tagCode['tweet_file'] != "tweet_images/") { ?>
                                <img class="img-tweet" src=" <?php echo $tagCode['tweet_file'] ?>">
                            <?php } ?>
                        </div>

                    <?php } ?>
                </div>
                
                <div id="container-post-musique" style="display: none;">
                    <?php foreach($tagsMusique as $tagMusique) { ?>
                        <div class="container-post">
                            <p class="user"> <?php echo $tagMusique['user_pseudo']; ?> </p>
                            <p class="date"> <?php echo $tagMusique['tweet_date']; ?></p>
                            <p class="tag"> <?php echo $tagMusique['tweet_tag']; ?> </p>
                            <p class="tweet"> <?php echo $tagMusique['tweet_contenuTweet']; ?></p>

                            <?php  if(!is_null($tagMusique['tweet_file']) && $tagMusique['tweet_file'] != "tweet_images/") { ?>
                                <img class="img-tweet" src=" <?php echo $tagMusique['tweet_file'] ?>">
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <div id="container-post-trash" style="display: none;">
                    <?php foreach($tagsTrash as $tagTrash) { ?>
                        <div class="container-post">
                            <p class="user"> <?php echo $tagTrash['user_pseudo']; ?> </p>
                            <p class="date"> <?php echo $tagTrash['tweet_date']; ?></p>
                            <p class="tag"> <?php echo $tagTrash['tweet_tag']; ?> </p>
                            <p class="tweet"> <?php echo $tagTrash['tweet_contenuTweet']; ?></p>

                            <?php  if(!is_null($tagTrash['tweet_file']) && $tagTrash['tweet_file'] != "tweet_images/") { ?>
                                <img class="img-tweet" src=" <?php echo $tagTrash['tweet_file'] ?>">
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>   
                <div id="container-post-jv" style="display: none;">
                    <?php foreach($tagsJV as $tagJV) { ?>
                        <div class="container-post">
                            <p class="user"> <?php echo $tagJV['user_pseudo']; ?> </p>
                            <p class="date"> <?php echo $tagJV['tweet_date']; ?></p>
                            <p class="tag"> <?php echo $tagJV['tweet_tag']; ?> </p>
                            <p class="tweet"> <?php echo $tagJV['tweet_contenuTweet']; ?></p>

                            <?php  if(!is_null($tagJV['tweet_file']) && $tagJV['tweet_file'] != "tweet_images/") { ?>
                                <img class="img-tweet" src=" <?php echo $tagJV['tweet_file'] ?>">
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <div id="container-post-art" style="display: none;">
                    <?php foreach($tagsArt as $tagArt) { ?>
                        <div class="container-post">
                            <p class="user"> <?php echo $tagArt['user_pseudo']; ?> </p>
                            <p class="date"> <?php echo $tagArt['tweet_date']; ?></p>
                            <p class="tag"> <?php echo $tagArt['tweet_tag']; ?> </p>
                            <p class="tweet"> <?php echo $tagArt['tweet_contenuTweet']; ?></p>

                            <?php  if(!is_null($tagArt['tweet_file']) && $tagArt['tweet_file'] != "tweet_images/") { ?>
                                <img class="img-tweet" src=" <?php echo $tagArt['tweet_file'] ?>">
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <div id="container-post-temps" style="display: none;">
                    <?php foreach($tagsTemps as $tagTemps) { ?>
                        <div class="container-post">
                            <p class="user"> <?php echo $tagTemps['user_pseudo']; ?> </p>
                            <p class="date"> <?php echo $tagTemps['tweet_date']; ?></p>
                            <p class="tag"> <?php echo $tagTemps['tweet_tag']; ?> </p>
                            <p class="tweet"> <?php echo $tagTemps['tweet_contenuTweet']; ?></p>

                            <?php  if(!is_null($tagTemps['tweet_file']) && $tagTemps['tweet_file'] != "tweet_images/") { ?>
                                <img class="img-tweet" src=" <?php echo $tagTemps['tweet_file'] ?>">
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <div id="container-post-news" style="display: none;">
                    <?php foreach($tagsNews as $tagNews) { ?>
                        <div class="container-post">
                            <p class="user"> <?php echo $tagNews['user_pseudo']; ?> </p>
                            <p class="date"> <?php echo $tagNews['tweet_date']; ?></p>
                            <p class="tag"> <?php echo $tagNews['tweet_tag']; ?> </p>
                            <p class="tweet"> <?php echo $tagNews['tweet_contenuTweet']; ?></p>

                            <?php  if(!is_null($tagNews['tweet_file']) && $tagNews['tweet_file'] != "tweet_images/") { ?>
                                <img class="img-tweet" src=" <?php echo $tagNews['tweet_file'] ?>">
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <div id="container-post-apprendre" style="display: none;">
                    <?php foreach($tagsApprendre as $tagApprendre) { ?>
                        <div class="container-post">
                            <p class="user"> <?php echo $tagApprendre['user_pseudo']; ?> </p>
                            <p class="date"> <?php echo $tagApprendre['tweet_date']; ?></p>
                            <p class="tag"> <?php echo $tagApprendre['tweet_tag']; ?> </p>
                            <p class="tweet"> <?php echo $tagApprendre['tweet_contenuTweet']; ?></p>

                            <?php  if(!is_null($tagApprendre['tweet_file']) && $tagApprendre['tweet_file'] != "tweet_images/") { ?>
                                <img class="img-tweet" src=" <?php echo $tagApprendre['tweet_file'] ?>">
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <div id="container-post-mood" style="display: none;">
                    <?php foreach($tagsMood as $tagMood) { ?>
                        <div class="container-post">
                            <p class="user"> <?php echo $tagMood['user_pseudo']; ?> </p>
                            <p class="date"> <?php echo $tagMood['tweet_date']; ?></p>
                            <p class="tag"> <?php echo $tagMood['tweet_tag']; ?> </p>
                            <p class="tweet"> <?php echo $tagMood['tweet_contenuTweet']; ?></p>

                            <?php  if(!is_null($tagMood['tweet_file']) && $tagMood['tweet_file'] != "tweet_images/") { ?>
                                <img class="img-tweet" src=" <?php echo $tagMood['tweet_file'] ?>">
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <div id="container-post-guerre" style="display: none;">
                    <?php foreach($tagsGuerre as $tagGuerre) { ?>
                        <div class="container-post">
                            <p class="user"> <?php echo $tagGuerre['user_pseudo']; ?> </p>
                            <p class="date"> <?php echo $tagGuerre['tweet_date']; ?></p>
                            <p class="tag"> <?php echo $tagGuerre['tweet_tag']; ?> </p>
                            <p class="tweet"> <?php echo $tagGuerre['tweet_contenuTweet']; ?></p>

                            <?php  if(!is_null($tagGuerre['tweet_file']) && $tagGuerre['tweet_file'] != "tweet_images/") { ?>
                                <img class="img-tweet" src=" <?php echo $tagGuerre['tweet_file'] ?>">
                            <?php } ?>
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
                    <button class="btn-JV" id="btn-JV"> Jeux Vidéos </button>
                    <button class="btn-art" id="btn-art"> Art </button>
                    <button class="btn-temps" id="btn-temps"> Temps </button>
                    <button class="btn-news" id="btn-news"> News </button>
                    <button class="btn-apprendre" id="btn-apprendre"> Apprentissage </button>
                    <button class="btn-mood" id="btn-mood"> Mood </button>
                    <button class="btn-guerre" id="btn-guerre"> Guerre </button>
                </div>
            </section>

        </section>

    <?php    
    }
    ?>

    <script src="script.js"></script>
</body>
</html>