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
require("../model/function.php");

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

<body style="background: black">

<nav class="nav nav-masthead d-flex p-2 bd-highlight position-fixed" style="margin:5px;" >
  <a href="../index.php"><img class="masthead-brand " style="width:120px; height:40px;" src="../assets/Akel1.png" ></a> 
  <a class="nav-link text-light" href="../index.php">Home</a>
  <a class="nav-link text-primary active"   style ="font-weight:bold" href="./admin/">Create</a>
  <a class="nav-link text-light"  href="affiche.php">Pin up</a>
  <a class="nav-link text-light " href="./delet.php">Delete</a>
  <a class="nav-link text-light"  href="edite.php">Update</a>
  <button class="bg-danger text-center rounded"><a class="btn"  href="deconnexion.php">Se déconnecter</a></button>
</nav>

    <!-- Section: Design Block -->
<section>
    <div class="container-fluid " style="height: 100vh; padding-top: 80px;">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
            <form method="POST">
              <h1 class="text-light text-center">Fiche Produit</h1>
              <!-- Titre -->
              <div class="form-outline mb-4">
                  <label class="form-label  text-light" for="form3Example3">URL de l'image</label>
                <input type="name" id="form3Example3" class="form-control" name="image" required/>
              </div>

              <!-- Name -->
              <div class="form-outline mb-4">
                  <label class="form-label text-light" for="form3Example4">Nom du produit</label>
                <input type="name" id="form3Example4" class="form-control" name="name"required />
              </div>

              <!-- prix -->
              <div class="form-outline mb-4">
                 <label class="form-label text-light" for="form3Example4">Prix</label>
                <input type="number" id="form3Example4" class="form-control" name="price" required />
              </div>
               <!-- descrition -->
              <div class="form-outline mb-4">
                  <label class="form-label text-light" for="form3Example4">Descrition</label>
                <textarea type="text" id="form3Example4" class="form-control" required name="description"></textarea>
              </div>
              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block mb-4" name="valide">
                Ajouter un nouveau produit
              </button>
            </form>
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
<?php 
if(isset($_POST['valide'])) {

 if(isset($_POST['image']) AND isset($_POST['name']) AND isset($_POST['price']) AND isset($_POST['description']))
   {
      if(!empty($_POST['image']) AND !empty($_POST['name']) AND !empty($_POST['price']) AND !empty($_POST['description']))
    {
        // filtrer les données htmlspecialchar + strip_tags 
        $image = htmlspecialchars(strip_tags($_POST['image']));
        $name = htmlspecialchars(strip_tags($_POST['name']));
        $price = htmlspecialchars(strip_tags($_POST['price']));
        $description= htmlspecialchars(strip_tags($_POST['description']));
        try 
        {
            addProduct ($image, $name, $price , $description);
        }
        catch(Exception $e)
        {
            $e->getMessage();
        }
    }
   }
}

?>