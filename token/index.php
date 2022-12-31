<?php 
require("./model/connexion.php");
if (isset($_GET['token']) && $_GET['token'] != "" ) {
    $stmt = $db->prepare('SELECT email FROM `admin` WHERE token=?');
    $stmt->execute([$_GET['token']]);
    $email=$stmt->fetchColumn();
    if($email) {
      ?>
      <!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Récuperation MDP</title>
      </head>
      <body>
      <section class="background-radial-gradient overflow-hidden">
   
   <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
     <div class="row gx-lg-5 align-items-center mb-5">
       <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
         <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
         <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
             <div class="card bg-glass">
               <div class="card-body px-4 py-5 px-md-5">
                 <form method="POST">
                   <h1><strong>Nouveau Mot de passe</strong></h1>
                 
                   <div class="form-outline mb-4">
                     <label class="form-label" for="form3Example3"> Nouveau mot de passe : </label>
                     <input type="name" id="form3Example3" class="form-control" name="newPassword" required/>
                   </div>
  
                   <!-- Submit button -->
                   <button type="submit" class="btn btn-primary btn-block mb-4" name="valide">
                     Confirmer
                   </button>
                 </form>
               </div>
         </div>
       </div>
     </div>
   </div>
  </section>
      </body>
      </html>
      <?php
    }
}
if(isset($_POST['newPassword'])) {
    $hashedPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
    $req =  "UPDATE `admin` SET password= ? email= ?";
    $stmt = $db->prepare($req);
    $stmt->execute([$token, $_POST['email']]);
    echo "mot de passe modifé avec succés";
}
