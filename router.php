<?php
    session_start();
    if (isset($_GET['deconnexion']) && $_GET['deconnexion'] == 'true')
    {
        session_destroy();
        header('Location: connexion.php');
    }
    if (isset($_GET['direction']) && $_GET['direction'] == 'admin')
    {
        if($_SESSION['profil'] == 42){
            header('Location: administrator.php');
        }
        else{
            session_destroy();
            header('Location: connexion.php');
        }
        
    }
    if (isset($_GET['direction']) && $_GET['direction'] == 'creation')
    {
        if($_SESSION['profil'] == 42){
            header('Location: creation-de-compte.php');
        }
        else{
            session_destroy();
            header('Location: connexion.php');
        }
        
    }