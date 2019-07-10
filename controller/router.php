<?php
    session_start();
   require('get-profil.php');



    if (isset($_GET['deconnexion']) && $_GET['deconnexion'] == 'true')
    {
        session_destroy();
        header('Location: ../view/connexion.php');
    }

    if (isset($_GET['direction']))
    {
        
        switch ($_GET['direction']) {
            case 'new-mp':
                header('Location: ../view/envoi-mp.php');
                break;
            case 'boite':
                header('Location: ../view/messenger.php');
                break;
            case 'dashboard':
                if(isUser()){
                    header('Location: ../view/dashboard.php');
                }
                break;
            case 'admin':
                if(isSuperAdmin() || isAdmin()){
                    header('Location: ../view/administrator.php');
                }
                else{
                    session_destroy();
                    header('Location: ../view/connexion.php');
                }
                break;
            case 'home':
                if(isSuperAdmin() || isAdmin()){
                    header('Location: ../view/administrator.php');
                }
                else{
                    if(isUser()){
                        
                        header('Location: ../view/dashboard.php');
                    }
                    else{
                        session_destroy();
                        header('Location: ../view/connexion.php');
                    }
                   
                }
                break;
            case 'creation':
                if(isSuperAdmin() || isAdmin()){
                    if(isset($_GET['err']) && $_GET['err'] == 1){
                        header('Location: ../view/creation-de-compte.php?err=1');
                    }
                    else{
                        header('Location: ../view/creation-de-compte.php');
                    }
                }
                else{
                    session_destroy();
                    header('Location: ../view/connexion.php');
                }
                break;
            case 'comptes':
                if(isSuperAdmin() || isAdmin()){
                    header('Location: ../view/liste-compte.php');
                }
                else{
                    session_destroy();
                    header('Location: ../view/connexion.php');
                }
                break;
            case 'modification':
                if(isset($_SESSION['profil'])  && isset($_GET['id'])){
                    if(isset($_GET['err'])) {
                        header('Location: ../view/modification.php?id=' . $_GET['id'] . '&err=' .$_GET['err'] );   
                    }
                    else{
                        header('Location: ../view/modification.php?id=' . $_GET['id']);
                    }
                }
                else{
                    session_destroy();
                    header('Location: ../view/connexion.php');
                }
                break;
            case 'message':
                if(isSuperAdmin() || isAdmin()){
                    header('Location: ../view/message.php');
                    
                }
                echo 'coucou';
                echo isSuperAdmin();
                break;
            case 'historique':
                if(isSuperAdmin()){
                    header('Location: ../view/historique.php');
                    
                }
                echo 'coucou';
                echo isSuperAdmin();
                break;
            case 'old':
                if(isSuperAdmin()){
                    header('Location: ../view/old-message.php');
                    
                }
                echo 'coucou';
                echo isSuperAdmin();
                break;
            
            default:
                session_destroy();
                header('Location: ../view/connexion.php');
        
        }   
        
    }


