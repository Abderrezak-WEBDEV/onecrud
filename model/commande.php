<?php 
// Methde Ajouter
function addProduct ($image, $name, $price , $description){
  if (require("connexion.php"))
  {  
    $req = $access->prepare("INSERT INTO produits (image , name , price , description) VALUES (:image, :name, :price ,:description)");
    $req->execute(array(
      'image'=> $image ,
      'name'=> $name,
      'price'=> $price ,
      'description'=>$description));
    $req->closeCursor();
  }
}
// methode afficher
function  affiche() {
    if (require("connexion.php"))
    {
    $req=$access->prepare("SELECT * FROM produits ORDER BY id DESC");
    $req->execute();
    $data= $req->fetchAll(PDO::FETCH_OBJ); 
    return $data;
    $req ->closeCursor();
    }
}
// Methode supprimer
function delet($id){
    if (require("connexion.php"))
    {
      $req=$access->prepare("DELETE FROM produits WHERE id=?");
      $req->execute(array($id));
    }
}
// fonction de vefication de connexion

function getAdmin($email, $password){

    if(require("connexion.php")) {
      $req = $access -> prepare("SELECT * FROM `admin` WHERE email=? AND password = ?");

      $req -> execute(array($email, $password));

      if($req->rowCount() == 1) {

      $data = $req -> fetch();

        return $data;

      } else {

        return false;

        }

      $req ->closeCursor();
    }
  }
?>

<!-- fonction pour modifier le produit -->

<?php 

function getProduct($id) {

  if(require("connexion.php")) {
    $req = $access -> prepare("SELECT * FROM `produits` WHERE id=?");

    $req -> execute(array($id));

    if($req->rowCount() == 1) {

    $data = $req -> fetchAll(PDO::FETCH_OBJ);

      return $data;

    } else {

      return false;

      }

    $req ->closeCursor();
  }
}
?>