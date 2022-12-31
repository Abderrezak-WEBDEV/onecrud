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
$produits = affiche();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link href="/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title></title>
</head>
<body style="background:black;">

<nav class="nav nav-masthead d-flex p-2 bd-highlight position-fixed" style="z-index:2; margin:2px;">
    <a class="navbar-brand" href="index.php"><img src="../assets/Akel1.png" height="40" width="120" alt="logo"></a>
      <a class="nav-link text-light" href="../index.php">Home</a>
      <a class="nav-link text-light"  href="./create.php">Create</a>
      <a class="nav-link active text-primary" style ="font-weight:bold" href="affiche.php">Pin Up</a>
      <a class="nav-link text-light" href="./delet.php">Delete</a>
      <a class="nav-link  text-light" href="./edite.php">Update</a>
      <button class="bg-danger text-center rounded"><a class="btn" href="./deconnexion.php">Se déconnecter</a></button>
</nav>
    
<section div class="container-fluid " style="height: auto; padding-top: 80px;">
  <div class="row">
  <div class="col-md-1"></div>
    <div class="col-md-10">
      <table class="table">
        <thead>
        <tr>
          <th class="text-light text-center"scope="col">Id</th>
          <th class="text-light text-center"scope="col">Image</th>
          <th class="text-light text-center"scope="col">Name</th>
          <th class="text-light text-center"scope="col">Price</th>
          <th class="text-light text-center"scope="col">Description</th>
          <th class="text-light text-center"scope="col">Editer</th>
        </tr>
      </thead>
      <tbody>
        <tr>
 <th scope="row"><?= $produit-> id ?></th>
 <td><img src="<?= $produit-> image ?>" style="width:  50px; hight: 30px;"></td>
 <td><?= $produit-> name ?></td>
 <td><?= $produit-> price ?></td>
 <td><?= $produit-> description ?></td>
 <td><a href="edite.php?pdt=<?= $produit->id ?>"><i class="bi bi-pencil-square" style="font-size: 1.5rem;"></i></a></td>
  </tr>
    </div>
    </div>
 </div>
</table> 
          
</section>
<?php 
require("../footer.php");
?>
</body>
</html>