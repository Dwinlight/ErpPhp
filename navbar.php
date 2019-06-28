<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Titre de la page</title>
    <style type="text/css">
        .active {
            background-color: #4CAF50;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        /* Change the link color to #111 (black) on hover */
        li a:hover {
            background-color: #111;
        }
    </style>
    <script src="js/bootstrap.js"></script>
</head>

<body>


    <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#news">News</a></li>
        <li><a href="#contact">Contact</a></li>
        <?php
        
        if ($_SESSION['profil'] == 42 || $_SESSION['profil'] == 12){
            echo '<li><a href="router.php?direction=message">Poster un message</a></li>';
        }
        ?>
        <?php
        
        if ($_SESSION['profil'] == 42 || $_SESSION['profil'] == 12){
            echo '<li><a href="router.php?direction=creation">Création</a></li>';
        }
        ?>
        <?php
        
        if ($_SESSION['profil'] == 42  || $_SESSION['profil'] == 12){
            echo '<li><a href="router.php?direction=comptes">Liste des comptes</a></li>';
        }
        ?>
        <li style="float:right"><a class="active" href="router.php?deconnexion=true">Déconnexion</a></li>
    </ul>

</body>

</html>