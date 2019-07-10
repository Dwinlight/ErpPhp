<?php
require('../controller/isAllowed.php');
include('navbar.php');
require('../model/get-messenger.php');
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Boite de réception</title>
    <style type="text/css">
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
        }

        table {
            border-spacing: 5px;
        }
    </style>
    <script src="js/bootstrap.js"></script>
</head>
