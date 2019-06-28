<html>
<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style type="text/css">
        .list-group-item{
            width:100%;
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
        
    
        
        
        echo '<li class="list-group-item" style="background:#67BE4B" >';
        echo '<div class="list-group" >';
        echo '<h1 class="list-group-item" ><b>' . $row["title"] . '</b></h1>';
        echo '<h3 class="list-group-item" style="color: grey">' . $row["prenom"] .' '.$row["nom"]. '</h1>';
        echo '<h5 class="list-group-item" style="color: grey" >' . $row["date"] .'</h5>';
        
        echo '<p class="list-group-item" >' .$row["content"].'</p>';
        
        echo '</div>';
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
