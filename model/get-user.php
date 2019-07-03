<?php 

if (isset($_SESSION["profil"]) && $_SESSION["profil"] ){
require('dbConnection.php');
    $sql = "SELECT nom, prenom, idcomptes, profil FROM comptes WHERE idcomptes ='" . $_GET['id'] . "'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    
        while($row = $result->fetch_assoc()) {
        
            $idcomptes = $row["idcomptes"];
            $nom = $row["nom"];
            $prenom = $row["prenom"];
            $profil = $row["profil"];
             
        }
  
    }  
}