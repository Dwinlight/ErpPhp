<?php
    require('../controller/isAllowed.php');
    include('navbar.php');
    echo '<h1>Messages supprimés:</h1>';
    include('../model/get-deleted-message.php');