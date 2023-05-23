<?php
    require 'connect.php';
    require 'login.php';

    $requete = $database->prepare("SELECT * FROM tweet INNER JOIN user ON tweet.tweet_userid = user.user_id ORDER BY tweet_date DESC");
    $requete->execute();
    $tweets = $requete->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <title>Document</title>
</head>
<body>
    <section class="parties"> 
        <section class="left-part"> 

            <img class="logo-site" src="assets/images/raison.jpg">

            <div class="user-part"> 

                <div class="user-menu">
                    <img src="assets/icones/icons8-user-48.png">
                    <p> Profile</p>
                </div>
    
                <div class="user-menu">
                    <img src="assets/icones/icons8-home-page-48.png">
                    <a href="index.php">Accueil</a>
                </div>
    
            </div>
        </section>
    
        <section class="mid-part">
            <div class="container-banner">
                <img class="pp-profile" src="assets/images/raison.jpg">
            </div>

            <div class="container-profile">
                <p class="profile-nom-user"> Nom utilisateur </p>
                <button class="btn-edit-profile"> Edit Profile</button>
                <p class="identifiant"> identifiant</p>
                <p class="suivis"> nb suivi</p>
                <p class="followers"> nb followers</p>  
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
            </div>
        </section>
        
    </section>
    
</body>
</html>