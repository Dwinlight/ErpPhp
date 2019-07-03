<?php 
require('../controller/isAllowed.php');
require('dbConnection.php');
if($_SESSION['modifyID'] != $_SESSION['username']) {
    if (isset($_SESSION['profil'])){
        if($_SESSION['profil'] != 42 && $_SESSION['profil'] != 12){
            session_destroy();
            header('Location: connexion.php');
        }
    }
    else{
            session_destroy();
            header('Location: connexion.php');
    }
}

    
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$password = hash('sha384', $_POST['password1']);
$idcomptes = $_SESSION['modifyID'];
// set parameters and execute
if(!isset($_POST['profil'])){
    $profil = $_SESSION['profil'];
}
else{
    if ($_POST['profil'] == 'utilisateur'){
        $profil = 1;
    }
    else{
    $profil = 12; 
    }
}
if($_POST['password1'] == ""){
 $sql = 'UPDATE comptes SET profil="'.$profil.'" , nom="'.$nom. '" , prenom="' .$prenom. '" WHERE idcomptes="' . $idcomptes .'"';   
}
else{
    

$sql = 'UPDATE comptes SET profil="'.$profil.'" , nom="'.$nom. '" , prenom="' .$prenom. '" , password= "'.$password. '" WHERE idcomptes="' . $idcomptes .'"';
}
if ($db->query($sql) === TRUE) {
    if($_SESSION['modifyID'] == $_SESSION['username']){
        $_SESSION['nom'] = $nom;
        $_SESSION['prenom'] = $prenom;
    }
    if($_SESSION['profil'] == 1){
        echo '<script type="text/javascript">document.location.href="../controller/router.php?direction=dashboard"</script>';    
    }
    else{
        echo '<script type="text/javascript">document.location.href="../controller/router.php?direction=admin"</script>';
        
    }
    
} else {
    echo $sql;
    echo "Error updating record: " . $db->error;
    //echo '<script type="text/javascript">document.location.href="router.php?direction=admin"</script>';
}

$db->close();
//sleep(10);
//header("Location: router.php?direction=admin");


