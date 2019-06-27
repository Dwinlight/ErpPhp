<?php
    session_start();
    if (isset($_SESSION['profil'])){
        if($_SESSION['profil'] != 42){
            session_destroy();
            header('Location: connexion.php');
        }
    }
    else{
            session_destroy();
            header('Location: connexion.php');
    }