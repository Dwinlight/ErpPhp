<?php
require('isAdmin.php');
require('dbConnection.php');


$sql = "DELETE FROM message WHERE number=".$_GET['id'];

if ($db->query($sql) === TRUE) {
    echo '<script type="text/javascript">document.location.href="router.php?direction=admin"</script>';

} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}


$db->close();
