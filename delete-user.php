<?php
require('isAdmin.php');
require('dbConnection.php');

$sql = "SELECT profil FROM comptes WHERE idcomptes='" . $_GET['id'] ."'";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    
    while($row = $result->fetch_assoc()) {
        
        if ($row["profil"]>= $_SESSION["profil"]){
            echo 'prb';
            session_destroy();
            header('Location: connexion.php');
        }
        
        
        
    }
    
}
else{
    session_destroy();
    header('Location: connexion.php');
    echo 'user pas trouvé';
}
$sql = "DELETE FROM comptes WHERE idcomptes='".$_GET['id'] . "'";

if ($db->query($sql) === TRUE) {
    echo '<script type="text/javascript">document.location.href="router.php?direction=admin"</script>';

} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}


$db->close();
