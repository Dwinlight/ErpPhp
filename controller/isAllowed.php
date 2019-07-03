<?php
session_start();
$fileName = basename(getcwd());
$profil = $_SESSION['profil'];

switch ($fileName) {
            case 'administrator':
                if($profil =! 12 && $profil =!42 ){
                    session_destroy();
                    header('../view/connexion.php');
                }
                break;
            case 'dashboard':
                if($profil =! 1){
                    session_destroy();
                    header('../view/connexion.php');
                }
                break;
            case 'liste-compte':
                if($profil =! 12 && $profil =!42 ){
                    session_destroy();
                    header('../view/connexion.php');
                }
                break;
            case 'message':
                if($profil =! 12 && $profil =!42 ){
                    session_destroy();
                    header('../view/connexion.php');
                }
                break;
            case 'modification':
                if($profil =! 12 && $profil =!42 ){
                    session_destroy();
                    header('../view/connexion.php');
                }
                break;
            case 'creation-de-compte':
                if($profil =! 12 && $profil =!42 ){
                    session_destroy();
                    header('../view/connexion.php');
                }
                break;
            case 'historique':
                if ($profil =!42){
                    session_destroy();
                    header('../view/connexion.php');
                }
                break;
            case 'old-message':
                if ($profil =!42){
                    session_destroy();
                    header('../view/connexion.php');
                }
                break;
        }