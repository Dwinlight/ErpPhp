<?php 
if (isset($_SESSION["profil"]) && $_SESSION["profil"]== 42 ){
require('dbConnection.php');
$sql = "SELECT * FROM trace";
$result = $db->query($sql);

echo '<table style="width:100%">';

echo "<th> Executeur </th>";

echo "<th> ID executeur </th>";
echo "<th> Date </th>";
echo "<th> Action </th>";
if ($result->num_rows > 0) {
    // output data of each row
    
    while($row = $result->fetch_assoc()) {
        
        echo '<tr>';
        echo '<td>' . $row["nom"] . ' '  . $row["prenom"] .'</td>';
        echo '<td>' . $row["id"].  '</td>';
        echo '<td>' . $row["date"] . '</td>';
        echo '<td>' . $row["description"] . '</td>';
        echo '</tr>';
        
        
        
    }
    
}
echo '</table> ';
}