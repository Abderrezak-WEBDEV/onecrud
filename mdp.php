<?php 
include ("./model/connexion.php");
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
  <header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="./assets/logo.png" height="40" width="150" alt="logo"></a>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link "  aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style ="font-weight:bold"  href="./admin/">Create</a>
            </li>
            <li class="nav-item outline-primary">
              <a class="nav-link " href="./admin/delet.php">Delete</a>
            </li>
            <li class="nav-item">
              <a class="nav-link "  href="./admin/affiche.php">Products</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link active"  style ="font-weight:bold" href="#">Update</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
    <!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">
 
  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
     
      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
            <div class="card bg-glass">
              <div class="card-body px-4 py-5 px-md-5">
                <form method="POST">
                  <h1><strong>Changez votre Mot de passe</strong></h1>
                
                  <div class="form-outline mb-4">
                      <label class="form-label" for="form3Example3">Email</label>
                    <input type="name" id="form3Example3" class="form-control" name="email" required/>
                  </div>

                  <!-- Submit button -->
                  <button type="submit" class="btn btn-primary btn-block mb-4" name="valide">
                    Send me a randam password
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
require("footer.php");
?>
</body>
</html>
<?php 
if(isset($_POST['email'])) {
    $password =  uniqid();
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    $message = "Bonjour , voici votre nouveau mot de passe : $password";
    $headers = 'content-type: text/plain; charset="utf-8"'. " ";

    if (mail($_POST['email'], 'mot de passe oublié', $message, $headers)){
      $req =  "UPDATE `admin` SET password = ? email=?";
      $stmt = $db->prepare($req);
      $stmt->execute([$hashedPassword, $_POST['email']]);
      echo "Mail envoyé";
    } else {
        echo "une erreur est survenue.. avec votre serveur"; 
    }
}