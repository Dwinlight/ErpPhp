<?php
    
require('../controller/isAllowed.php');
    include('navbar.php');
    include('../model/get-message.php');
    echo $_SESSION['nom'];
    echo '</br>';
    echo $_SESSION['prenom'];
    echo '</br>';
    echo $_SESSION['profil'];
    
    

