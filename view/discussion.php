<?php
session_start();
include('../model/get-messenger.php');
$_SESSION["username"]='administrator';

?>


<script>var messages =[];</script>


<?php 
while (1 == 1) {
    sleep (1);
    echo '<script>console.log("ok")</script>';
}
getMessage('user'); ?>