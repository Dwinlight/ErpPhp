<html>

<head>
    <meta charset="utf-8">
    <style type="text/css">
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
</head>

<body>
    <?php 
if(!isset($_SESSION['profil'])){
            session_destroy();
            header('Location: connexion.php');
        }
require('dbConnection.php');
$sql = "SELECT * FROM message ORDER BY number DESC";
$result = $db->query($sql);


if ($result->num_rows > 0) {
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
        
        if ($_SESSION['profil'] == 12 || $_SESSION['profil'] == 42 ){
            echo '<a href="delete-post.php?id='.$row["number"].'"><button type="button" class="btn btn-danger">Supprimer</button></a>';
        }
        echo '</li>';
        
        
        
    }
    echo '</ul>';
    
}
?>
</body>


</html>