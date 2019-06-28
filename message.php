<?php
include('isAdmin.php');
?>
<html>

<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    <style type="text/css">
        
    </style>
</head>

<body>
    <div id="container">
        <!-- zone de connexion -->

        <form action="new-message.php" method="POST">
            <h1>Nouveau message</h1>

            <label><b>Titre</b></label>
            <input type="text" placeholder="Titre" name="title" required>

            <label><b>Contenu</b></label>
            <TEXTAREA name="contenu" rows=10 cols=54></TEXTAREA>
            <input type="submit" id='submit' value='LOGIN'>
            
        </form>
    </div>
</body>

</html>