<?php 
require('../controller/isAllowed.php');
require('dbConnection.php');
include('trace.php');
   
    
$title = $_POST['title'];
$contenu = $_POST['contenu'];





// set parameters and execute

$sql = "INSERT INTO message (nom, prenom, title, content, date, affichage) VALUES ('".$_SESSION['nom']."','" .$_SESSION['prenom']."','" .$title."','".$contenu. "', NOW(), 0)";

if ($db->query($sql) === TRUE) {
    trace("Message poster: titre: ".$title." -- contenu:" .$contenu);
    echo '<script type="text/javascript">document.location.href="../controller/router.php?direction=admin"</script>';

} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}


$db->close();
//sleep(10);

//header("Location: router.php?direction=admin");

