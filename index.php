<?php 
require("model/commande.php");
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
  <body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="./assets/logo.png" height="40" width="150" alt="logo"></a>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active " style ="font-weight:bold;"  aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="./admin/">Create</a>
            </li>
            <li class="nav-item outline-primary">
              <a class="nav-link " href="./admin/delet.php">Delete</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="./admin/affiche.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="./admin/edite.php">Update</a>
            </li>
          </ul>
          </div>
          <div style="display: flex; justify-content: flex-end;">

              <?php 
                session_start() ;

                if(!isset($_SESSION['dsrez334'])) { ?>
                   
                 <?php if(!empty($_SESSION['dsrez334']))  { ?>

                      <a class="btn  btn-danger" href="./deconnexion.php"></a>
                  
                  <?php } ?>

                  <?php if(!isset($_SESSION['dsrez334'])) { ?>

                    <a class="btn btn-primary" href="login.php">Login</a>
                  
                  <?php  } ?>
              <?php  } ?>
          </div>
       
        </div>
      </div>
    </nav>
    </header>

<section class="background-radial-gradient overflow-hidden" style=" height:auto;">
  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
          <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
          <?php foreach($myproducts as $product): ?>
          <div class="row bg-glass" style="width: 185vh; margin-right:10vh">
              <div class="card-body px-4 py-5 px-md-5">
                <div class="container">
                  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                      <div class="row">
                        <div class="card shadow-sm" >
                           <title><?= $product -> name ?></title>
                           <img src="<?= $product -> image ?>">
                        </div>
                        <div class="card-body">
                                <p class="card-text"><?= substr( $product -> description,0, 200 ); ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">acheter</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">voir</button>
                              </div>
                            </div>
                        </div>
                        <div>
                          <small class="text-muted"><?= $product -> price ?> €</small>
                        </div>
                      </div>
                      </div>
                      </div>
                    <?php endforeach ?>
                  </div>
                </div>
              </div>        
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

    <?php
    require("footer.php");
    ?>
  </body>
</html>
