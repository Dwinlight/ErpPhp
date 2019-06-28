<?php
    session_start();
    if (isset($_SESSION['profil'])){
        if($_SESSION['profil'] != 42 && $_SESSION['profil'] != 12){
            session_destroy();
            header('Location: connexion.php');
        }
    }
    else{
            session_destroy();
            header('Location: connexion.php');
    }