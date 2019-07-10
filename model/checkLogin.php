<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    require('dbConnection.php');
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = hash('sha384',mysqli_real_escape_string($db,htmlspecialchars($_POST['password'])));
    
   
    if($username !== "" && $password !== "")
    {
        $requete = "SELECT count(*), profil, nom, prenom FROM comptes where 
              idcomptes = '".$username."' and password = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count==1) // nom d'utilisateur et mot de passe correctes
        {
            $_SESSION['username'] = $username;
            $_SESSION['nom'] = $reponse['nom'];
            $_SESSION['prenom'] = $reponse['prenom'];
            $_SESSION['profil'] = (int)$reponse['profil'];
            if($_SESSION['profil'] == 42 || $_SESSION['profil']==12){
                header("Location: ../controller/router.php?direction=admin");
            }
            else{
                header("Location: ../controller/router.php?direction=dashboard");
                echo '<script> console.log("ici") </script>';
            }
        }
        else
        {
            if($count > 1)
            {
                header('Location: ../view/connexion.php?erreur=3');
            }
            else 
            {
                header('Location: ../view/connexion.php?erreur=1'); // utilisateur ou mot de passe incorrect
            }
           
        }
    }
    else
    {
       header('Location: connexion.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: connexion.php');
}
mysqli_close($db); // fermer la connexion
?>