<?php 

if (isset($_SESSION["profil"]) && $_SESSION["profil"] ){
    require('dbConnection.php');
    $sql = "SELECT nom, prenom, idcomptes FROM comptes WHERE idcomptes!='".$_SESSION['username']."'";
    $result = $db->query($sql);
    $noms=[];
    $prenoms=[];
    $ids=[];
    

    if ($result->num_rows > 0) {
    // output data of each row
    
        while($row = $result->fetch_assoc()) {
            array_push($noms,$row["nom"]);
            array_push($prenoms,$row["prenom"]);
            array_push($ids,$row["idcomptes"]);
            
            
            
             
        }
        
  
    }  
}