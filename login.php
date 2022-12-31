<?php 
session_start();
include "model/function.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>


<body style="background: black;">


<nav class="nav nav-masthead d-flex p-2 bd-highlight position-fixed">
    <a href="index.php">
     <img src="./assets/Akel1.png" height="40" width="150" alt="logo">
    </a>
</nav>

<section >
    <div class="container-fluid " style="height: 80vh; padding-top: 80px;">
        <div class="row">
            <div class="col-md-3"></div>
                <div class="col-md-6">
                <h1> Identifiez-vous !</h1>
                <form method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label" style="color: antiquewhite;">Adresse Email </label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email">
                        
                    </div>
                    <div class="mb-3">
                        <label for="Password1" class="form-label" style="color: antiquewhite;">Mot de passe </label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="mb-5">

                        <input type="submit" class="btn btn-success" name="envoyer" value="Login"/>
                        <a style="display: flex; justify-content: flex-end;" href="mdp.php">Mot de passe oublié !</a>
                        
                    </div>
                </form>
            </div>
          
        </div>
    </div>
</section>

<?php
require("footer.php");
?>
</body>
</html>

<!-- < hache un mot de passe
$pass= 'test';
echo password_hash("test", PASSWORD_DEFAULT);
 -->

<?php
if(isset($_POST['envoyer'])) 
{
    if(!empty($_POST['email']) AND !empty($_POST['password']))
    {
        $email= htmlspecialchars($_POST['email']);
        $password= htmlspecialchars($_POST['password']);
        $admin = getAdmin($email, $password);

        if($admin) {
            $_SESSION ['dsrez334'] = $admin;
            // rediregier l'administrateur
            header("Location:admin/");
           
        } else {
            echo "Problème d'email ou mot de passe !";
        }
    }
}
