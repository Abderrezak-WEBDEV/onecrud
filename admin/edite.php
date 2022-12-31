<?php
session_start() ;
// si la cession existe (securite)
if(!isset($_SESSION['dsrez334'])) 
{
   header("Location: ../login.php");
}
// si la cession n'est pas vide (securite)

if(empty($_SESSION['dsrez334'])) 
{
  header("Location: ../login.php");
}

if(!isset($_GET['pdt']))
{
  header("Location: affiche.php");
}   

if(empty($_GET['pdt']) AND !is_numeric($_GET['pdt'])) 
{
  header("Location: affiche.php");
}

require("../model/function.php");

// $id = $_get('pdt');

// $produits = getProduct($id);

// foreach($produits as $produit) {

//      $idpt = $produit-> id;
//      $img = $produit-> image;
//      $nom = $produit-> name;
//      $prix = $produit-> price;
//      $desc = $produit-> description;
// }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Connexion admin</title>
</head>
<style>
  .background-radial-gradient {
    background-color: hsl(218, 41%, 15%);
    background-image: radial-gradient(650px circle at 0% 0%,
        hsl(218, 41%, 35%) 15%,
        hsl(218, 41%, 30%) 35%,
        hsl(218, 41%, 20%) 75%,
        hsl(218, 41%, 19%) 80%,
        transparent 100%),
      radial-gradient(1250px circle at 100% 100%,
        hsl(218, 41%, 45%) 15%,
        hsl(218, 41%, 30%) 35%,
        hsl(218, 41%, 20%) 75%,
        hsl(218, 41%, 19%) 80%,
        transparent 100%);
  }
  #radius-shape-1 {
    height: 220px;
    width: 220px;
    top: -60px;
    left: -130px;
    background: radial-gradient(#44006b, #ad1fff);
    overflow: hidden;
  }
  
  #radius-shape-2 {
    border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
    bottom: -60px;
    right: -110px;
    width: 300px;
    height: 300px;
    background: radial-gradient(#44006b, #ad1fff);
    overflow: hidden;
  }
  
  .bg-glass {
    background-color: hsla(0, 0%, 100%, 0.9) !important;
    backdrop-filter: saturate(200%) blur(25px);
  }
</style>
<body>

<nav class="nav nav-masthead d-flex p-2 bd-highlight position-fixed">
  <a class="navbar-brand" href="../index.php"><img src="../assets/Akel1.png" height="40" width="150" alt="logo"></a>
  <a class="nav-link text-light"  href="../index.php">Home</a>
  <a class="nav-link text-light"   href="./admin/">Create</a>
  <a class="nav-link text-primary"  style ="font-weight:bold" href="affiche.php">Pin Up</a>
  <a class="nav-link active text-light"  href="./delet.php">Delete</a>
  <a class="nav-link text-light"  href="edite.php">Update</a>
  <button class="bg-danger text-center rounded"><a class="btn" href="deconnexion.php">Se déconnecter</a></button>
</nav>
    <!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">
 
  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          The best offer  <br />
          <span style="color: hsl(218, 81%, 75%)">for your business Automobile</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
         Changez-vos annonces en quelques clicks
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
            <div class="card bg-glass">
              <div class="card-body px-4 py-5 px-md-5">
                <form method="POST">
                  <h1><strong>Nouvelle fiche Produit</strong></h1>
                  <!-- Titre -->
                  <div class="form-outline mb-4">
                      <label class="form-label" for="form3Example3">URL de l'image</label>
                    <input type="name" id="form3Example3" class="form-control" name="image" value = "<?= $img ?>" required/>
                  </div>

                  <!-- Name -->
                  <div class="form-outline mb-4">
                      <label class="form-label" for="form3Example4">Nom du produit</label>
                    <input type="name" id="form3Example4" class="form-control" name="name" value = "<?= $nom ?> " required />
                  </div>

                  <!-- prix -->
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4">Prix</label>
                    <input type="number" id="form3Example4" class="form-control" name="price" value = "<?= $prix ?>" required />
                  </div>
                  <!-- descrition -->
                  <div class="form-outline mb-4">
                      <label class="form-label" for="form3Example4">Descrition</label>
                    <textarea type="text" id="form3Example4" class="form-control" required name="description"><?= $desc  ?></textarea>
                  </div>
                  <!-- Submit button -->
                  <button type="submit" class="btn btn-primary btn-block mb-4" name="valide">
                    Add New Product
                  </button>
                </form>
              </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->
<?php 
require("../footer.php");
?>
   </body>
</html>