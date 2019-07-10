<?php
    
require('../controller/isAllowed.php');
    include('navbar.php');
    echo '<h1>Bienvenue '.$_SESSION['prenom'].' '. $_SESSION['nom'].'</h1>';
    include('../model/get-message.php');

    

