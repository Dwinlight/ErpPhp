<?php
    include('navbar.php');
    session_start();
    echo $_SESSION['nom'];
    echo '</br>';
    echo $_SESSION['prenom'];
    echo '</br>';
    echo $_SESSION['profil'];
    

