<?php
require('../controller/isAllowed.php');
require('dbConnection.php');
include('trace.php');
$sql = 'UPDATE mp SET affichage=1 WHERE number="' .$_GET['id'].'"';   
//$sql = "DELETE FROM message WHERE number=".$_GET['id'];

if ($db->query($sql) === TRUE) {
    trace("suppression du message privé: ".$_GET['id']);
    echo '<script type="text/javascript">document.location.href="../controller/router.php?direction=boite"</script>';

} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}


$db->close();
