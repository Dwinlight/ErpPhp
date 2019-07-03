<?php

function trace($description){
    
    require('dbConnection.php');
    $sql = "INSERT INTO trace (nom, prenom, id, description, date) VALUES ('".$_SESSION['nom']."','" .$_SESSION['prenom']."','" .$_SESSION['username']."','" .$description. "', NOW())";
    if ($db->query($sql) === TRUE) {
        

    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
}
    $db->close();
}