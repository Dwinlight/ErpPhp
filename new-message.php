<?php 

require('dbConnection.php');
require('isAdmin.php');
   
    
$title = $_POST['title'];
$contenu = $_POST['contenu'];





// set parameters and execute

$sql = "INSERT INTO message (nom, prenom, title, content, date) VALUES ('".$_SESSION['nom']."','" .$_SESSION['prenom']."','" .$title."','".$contenu. "', NOW())";

if ($db->query($sql) === TRUE) {
    echo '<script type="text/javascript">document.location.href="router.php?direction=admin"</script>';

} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}


$db->close();
//sleep(10);

//header("Location: router.php?direction=admin");

