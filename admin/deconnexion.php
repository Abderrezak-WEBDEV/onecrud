<?php
session_start();

if(isset($_SESSION['dsrez334'])) {
    // supprimer la cession et envoyer un tableau vide
    $_SESSION ['dsrez334'] = array(); 
    // destruction de la cession et rediriger l'utlisateur
    session_destroy();

    header("Location: ../admin");
    header("Location: ../login.php");

} 

?>