<html>

<head>
    <meta charset="utf-8">
    <style type="text/css">
        .aucun{
            color: grey;
            text-align: center;
        }
        .list-group-item {
            
            background-color: white;
        }

        .list-group {
            margin: 0;
            padding: .3rem;
            background-color: #eee;
            
        }

        .list-group>h1,
        .list-group-item {
            margin: .5rem;
            padding: .3rem;
            font-size: 1.2rem;
        }

       

        .list-group-item>h2,
        .list-group-item>p {
            margin: .2rem;
            font-size: 1rem;
        }
    </style>
    <script>
        function confirmation(number) {
            var r = confirm("Voulez-vous supprimer ce message ?");
            if (r == true) {
                document.location.href="../model/delete-message-prive.php?id="+number;
                
            }
        }
    </script>
</head>

<body>
    <?php 
require('dbConnection.php');

$sql = "SELECT * FROM mp WHERE affichage = 0 && destinataire ='".$_SESSION['username']."' ORDER BY number DESC";
$result = $db->query($sql);


if (isset($_SESSION["profil"]) && $result->num_rows > 0) {
    // output data of each row
    echo '<ul class="list-group" >';
    while($row = $result->fetch_assoc()) {
        
        
        //echo '<li class="list-group-item" style="background:#67BE4B" >';
        echo '<article class="list-group-item" >';
        echo '<h1><b>' . $row["title"] . '</b></h1>';
        echo '<h4  style="color: grey"><i>' . $row["prenom"] .' '.$row["nom"]. '</i></h4>';
        echo '<h5  style="color: grey" ><i>' . $row["date"] .'</i></h5>';
        
        echo '<p  >' .$row["content"].'</p>';
        
        echo '</article>';
        
        
        echo '<a><button type="button"  onClick="confirmation('.$row["number"].');" class="btn btn-danger">Supprimer</button></a>';
        
        echo '</li>';
        
        
        
    }
    echo '</ul>';
    
}
    
if($result->num_rows == 0) {
    echo '<h2 class="aucun"> Aucun nouveau message</h2>';
}
?>
</body>

</html>