<?php
    require('isAdmin.php');
    include('navbar.php');
    echo $_SESSION['nom'];
    echo '</br>';
    echo $_SESSION['prenom'];
    echo '</br>';
    echo $_SESSION['profil'];
    include('get-message.php');
    

