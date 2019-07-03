<?php
session_start();
if(isset($_SESSION['profil'])){
    
    header('Location: controller/router.php?direction=home');
}
else{
    header('Location: view/connexion.php');
}

