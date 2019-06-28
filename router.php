<?php
    session_start();
    if (isset($_GET['deconnexion']) && $_GET['deconnexion'] == 'true')
    {
        session_destroy();
        header('Location: connexion.php');
    }
    if (isset($_GET['direction']) && $_GET['direction'] == 'admin')
    {
        
        
    }
    if (isset($_GET['direction']))
    {
        
        switch ($_GET['direction']) {
            case 'dashboard':
                if($_SESSION['profil'] == 1 ){
                    header('Location: dashboard.php');
                }
                break;
            case 'admin':
                if($_SESSION['profil'] == 42 || $_SESSION['profil'] == 12){
                    header('Location: administrator.php');
                }
                else{
                    session_destroy();
                    header('Location: connexion.php');
                }
                break;
            case 'creation':
                if($_SESSION['profil'] == 42 || $_SESSION['profil'] == 12){
                    if(isset($_GET['err']) && $_GET['err'] == 1){
                        //echo 'okok';
                        header('Location: creation-de-compte.php?err=1');
                    }
                    else{
                    header('Location: creation-de-compte.php');
                    }
                }
                else{
                    session_destroy();
                    header('Location: connexion.php');
                }
                break;
            case 'comptes':
                if($_SESSION['profil'] == 42 || $_SESSION['profil'] == 12){
                    header('Location: liste-compte.php');
                }
                else{
                    session_destroy();
                    header('Location: connexion.php');
                }
                break;
            case 'modification':
                if(($_SESSION['profil'] == 42 || $_SESSION['profil'] == 12)  && isset($_GET['id'])){
                    if(isset($_GET['err'])) {
                        header('Location: modification.php?id=' . $_GET['id'] . '&err=' .$_GET['err'] );   
                    }
                    else{
                        header('Location: modification.php?id=' . $_GET['id']);
                    }
                }
                else{
                    session_destroy();
                    header('Location: connexion.php');
                }
                break;
            case 'message':
                if($_SESSION['profil'] == 42 || $_SESSION['profil'] == 12 ){
                    header('Location: message.php');
                }
                break;
            
            default:
                session_destroy();
                header('Location: connexion.php');
        
        }   
        
    }


