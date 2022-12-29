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

require("../model/commande.php");
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
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="../assets/logo.png" height="40" width="150" alt="logo"></a>
                <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link "  aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link " style ="font-weight:bold"  href="./index.php">Create</a>
                    </li>
                    <li class="nav-item outline-primary">
                    <a class="nav-link " href="./delet.php">Delete</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" style ="font-weight:bold" href="affiche.php">Products</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="./edite.php">Update</a>
                    </li>
                </ul>
                </div>
                <div style="display: flex; justify-content: flex-end;">
                    <a class="btn  btn-danger"  href="./deconnexion.php">Logout</a>
                </div>
            </div>
            </nav>
    </header>
    <section class="background-radial-gradient overflow-hidden">
  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
          <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
            <div class="row bg-glass" style="width: 150vh; margin-left:10vh">
            <div class="row gx-lg-5 align-items-center "><h1>Toutes Mes Annonces</h1></div>  
              <div class="card-body px-4 py-5 px-md-5">
                <div class="container">
                  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-6 g-3">
                       <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Description</th>
                                <th scope="col">Editer</th>
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
                          
                            </tbody>
                        </table> 
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
require("../footer.php");
?>
</body>
</html>