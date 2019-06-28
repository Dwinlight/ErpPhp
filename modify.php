<?php 

require('dbConnection.php');
require('isAdmin.php');

    
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$password = hash('sha384', $_POST['password1']);
$idcomptes = $_SESSION['modifyID'];
// set parameters and execute

if ($_POST['profil'] == 'utilisateur'){
    $profil = 1;
}
else{
   $profil = 12; 
}
$sql = 'UPDATE comptes SET profil="'.$profil.'" , nom="'.$nom. '" , prenom="' .$prenom. '" , password= "'.$password. '" WHERE idcomptes="' . $idcomptes .'"';

if ($db->query($sql) === TRUE) {
    echo "Record updated successfully";
    echo '<script type="text/javascript">document.location.href="router.php?direction=admin"</script>';
} else {
    echo $sql;
    echo "Error updating record: " . $db->error;
    echo '<script type="text/javascript">document.location.href="router.php?direction=admin"</script>';
}

$db->close();
//sleep(10);
//header("Location: router.php?direction=admin");


