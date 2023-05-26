<?php
    require 'connect.php';
    require 'login.php';

    $userId = $_SESSION['id'];

    $requete = $database->prepare("SELECT * FROM tweet INNER JOIN user ON tweet.tweet_userid = user.user_id WHERE tweet.tweet_userid = $userId ORDER BY tweet.tweet_date DESC");
    $requete->execute();
    $tweets = $requete->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <title>Axe project</title>
</head>
<body>
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
    
        <section class="mid-part">

            <aside class="sidenav">
                <button class="btn-sidenav" id="btn-sidenav"> - </button>
                <button class="btn-closenav" id="btn-closenav"> X </button>
            </aside>

            <div class="container-banner">
                <img class="pp-profile" src="assets/images/raison.jpg">
            </div>

            <div class="container-profile">
                <p class="profile-nom-user"> Nom utilisateur </p>
                <button class="btn-edit-profile"> Edit Profile</button>
                <p class="identifiant"> identifiant</p> 
            </div>

            <?php foreach($tweets as $tweet) { ?>
                <div class="container-post">
                    <p class="tweet"> <?php echo $tweet['tweet_contenuTweet'];?></p>
                    <p class="date"> <?php echo $tweet['tweet_date'] ?></p>
                    <p class="tag"> <?php echo $tweet['tweet_tag'] ?> </p>
                    <p class="user"> <?php echo $tweet['user_pseudo']; ?> </p>

                    <img class="img-tweet" src=" <?php echo $tweet['tweet_file'] ?>">
                            
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
            
        </section>
    
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
    <script src="script.js"></script>
</body>
</html>