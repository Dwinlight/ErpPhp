<?php
function isAdmin()
{
    if (isset($_SESSION['profil'])){
        if($_SESSION['profil'] == 12){
            return true;
        }
        else {
            return false;
        }
    }
    else{
            return false;
    }
}
function isSuperAdmin()
{
    if (isset($_SESSION['profil'])){
        if($_SESSION['profil'] == 42){
            return true;
        }
        else {
            return false;
        }
    }
    else{
            return false;
    }
}
function isUser()
{
    if (isset($_SESSION['profil'])){
        if($_SESSION['profil'] == 1){
            return true;
        }
        else {
            return false;
        }
    }
    else{
            return false;
    }
}
echo '<script>console.log("'.isAdmin().'")</script>';

echo '<script>console.log("'.isSuperAdmin().'")</script>';

echo '<script>console.log("'.isUser().'")</script>';
?>