<?php 
session_start()
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />
    <title>Axe project</title>
</head>
<body>
    <p class="txt-connexion"> Connexion </p>
    <section class="container"> 
        <div class="row align-items-center justify-content-center">
            <form class="form" action="login.php" method="POST">
       
                <label for="formGroupInput" class="form-label">Adresse Email</label>
                <input type="email" name="email" class="form-control" id="formGroupExampleInput" >

                <label for="formGroupInput2" class="form-label">Pseudo</label>
                <input type="text" name="pseudo" class="form-control" id="formGroupExampleInput2">
                
                <label for="formGroupInput3" class="form-label">Mot de passe</label>
                <input type="text" name="password" class="form-control" id="formGroupExampleInput3">
                
                <div class="container-btn-inscription">
                    <button name="connexion" type="submit" class="btn btn-secondary btn-connecter">Se connecter</button>
                </div>
                
            </form>
        </div>
        
    </section>
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>