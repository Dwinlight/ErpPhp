<?php 
require('../controller/isAllowed.php');
include('trace.php');
require('dbConnection.php');
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';
    for ($i = 0; $i < 5; $i++) {
        $password = $password . $characters[rand(0, strlen($characters))];
    }
    
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$idcomptes = $_POST['username'];


$sql = "SELECT idcomptes FROM comptes WHERE idcomptes='" . $idcomptes . "'";

$result = $db->query($sql);


if ($result->num_rows> 0){
      
    header('Location: ../controller/router.php?direction=creation&err=1');
}
else{
 

// set parameters and execute

if ($_POST['profil'] == 'utilisateur'){
    $profil = 1;
}
else{
   $profil = 12; 
}
$pass = hash('sha384',$password);
$stmt = $db->prepare("INSERT INTO comptes (idcomptes, nom, prenom, profil, password) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssis",$idcomptes, $nom, $prenom, $profil, $pass);
$stmt->execute();
$stmt->close();
$db->close();
trace("creation profil: id:".$idcomptes.", nom: ".$nom.", prenom: ".$prenom.", profil: ".$profil);
//sleep(10);
echo '<script type="text/javascript">window.alert("Veuillez noter le mot de passe temporaire:'.$password.'");</script>';
//header("Location: router.php?direction=admin");
echo '<script type="text/javascript">document.location.href="../controller/router.php?direction=admin"</script>';

}