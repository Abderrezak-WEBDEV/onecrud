<?php 

require("model/function.php");

$myproducts = affiche();

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <link href="/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/style.css">
    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>Boutique LUXRY AUTOMOBILE</title>
</head>

<body style="background: black;">
<nav class="nav nav-masthead d-flex p-2 bd-highlight position-fixed" style="margin:5px;">
            <a href="index.php"><img class="masthead-brand " style="width:120px; height:40px;" src="./assets/Akel1.png" ></a> 
            <a class="nav-link text-primary active" style ="font-weight:bold;" href="./admin/">Home</a>
            <a class="nav-link text-light" href="./admin/create.php">Create</a>
            <a class="nav-link text-light" href="./admin/affiche.php">Pin Up</a>
            <a class="nav-link text-light" href="./admin/delet.php">Delete</a>
            <a class="nav-link text-light" href="./admin/edite.php">Update</a>
            <?php
                session_start() ;
                
                if(!isset($_SESSION['dsrez334'])) { ?>
                  
                  <?php if(!empty($_SESSION['dsrez334']))  { ?>
                    
                    <a class="btn  btn-danger" href="./deconnexion.php"></a>
                    
                    <?php } ?>
                    
                    <?php if(!isset($_SESSION['dsrez334'])) { ?>
                      
                   <div class="d-flex justify-content-end"> 
                   <a class="btn btn-primary" href="login.php">Login</a> 
                  </div>
                  
                  <?php } ?>
              <?php } ?>
</nav>
<section class="text-center background-radial-gradient overflow-hidden" style="height:auto;">
<div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
<main role="main" class="inner cover" style= margin-top:40px;>
  <?php foreach($myproducts as $product): ?>
        <h1 class="cover-heading" style=" color:aliceblue;"><?= $product -> name ?></h1>
        <img style=" width:150vh; height: 100vh; border-radius:20px;" src="<?= $product -> image ?>">
        <p class="lead" style=" color:aliceblue;"><?= substr( $product -> description,0, 200 ); ?></p>
        <p class="group-btn">
          <a href="#" class="btn btn-lg btn-primary">Acheter</a>
          <a href="#" class="btn btn-lg btn-primary">Voir</a>
          <p class="btn btn-lg-end btn-lg btn-danger"><?= $product -> price ?> €</p>
        </p>
  <?php endforeach; ?>
</main>
 <?php
    require("footer.php");
  ?>
</body>
</html>
 
