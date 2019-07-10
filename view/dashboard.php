<?php
session_start();
include('navbar.php');
?>

<html>

<head>
    <meta charset="utf-8">
</head>

<body>

<?php
    
    echo '<h1>Bienvenue '.$_SESSION['prenom'].' '. $_SESSION['nom'] . '</h1>';
    include('../model/get-message.php');
    ?>

    </body>
</html>