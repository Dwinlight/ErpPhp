<?php 

require('dbConnection.php');
require('isAdmin.php');
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';
    for ($i = 0; $i < 5; $i++) {
        $password = $password . $characters[rand(0, strlen($characters))];
    }
    

 echo ' <body onload="alert(\' '. $password.' \');"> </body>';

// set parameters and execute
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$idcomptes = $_POST['username'];
if ($_POST['profil'] == 'utilisateur'){
    $profil = 1;
}
else{
   $profil = 42; 
}
$pass = hash('sha384',$password);
$stmt = $db->prepare("INSERT INTO comptes (idcomptes, nom, prenom, profil, password) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssis",$idcomptes, $nom, $prenom, $profil, $pass);


$stmt->execute();
$stmt->close();
$db->close();
header("Location: router.php?direction=admin");

