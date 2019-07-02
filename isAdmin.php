<?php
    session_start();
    if (isset($_SESSION['profil'])){
        if($_SESSION['profil'] != 42){
            return true;
        }
    }
    else{
            return false;
    }