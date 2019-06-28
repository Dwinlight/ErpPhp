<?php 
if(!isset($_SESSION['profil']) || ($_SESSION['profil'] != 42 && $_SESSION['profil'] != 12)){
            session_destroy();
            header('Location: connexion.php');
        }
require('dbConnection.php');
$sql = "SELECT nom, prenom, idcomptes, profil FROM comptes WHERE profil<" . $_SESSION['profil'];
$result = $db->query($sql);
echo '<table style="width:100%">';

echo "<th> Nom d'utilisateur </th>";

echo "<th> Nom </th>";

echo "<th> Prénom </th>";

if ($result->num_rows > 0) {
    // output data of each row
    
    while($row = $result->fetch_assoc()) {
        
        echo '<tr>';
        echo '<td>' . $row["idcomptes"].  '</td>';
        echo '<td>' . $row["nom"] .'</td>';
        echo '<td>' . $row["prenom"] . '</td>';
        echo '<td> <a href="router.php?direction=modification&id='.$row["idcomptes"].'">Modifier</a></td>';
        echo '<td> <a href="delete-user.php?id='.$row["idcomptes"].'">Supprimer</a></td>';
        echo '</tr>';
        
        
        
    }
    
}
echo '</table> ';
