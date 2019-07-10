<?php
require('../controller/isAllowed.php');

include('navbar.php');
require('../model/get-all-user.php');
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

        <form action="../model/send-mp.php" method="POST">
            <h2>Nouveau message privé</h2>
            <label><b>Destinataire</b></label>
            <select name="nom">
                <?php 
                for ($i = 0; $i < count($ids) ; $i++){
                    echo '<option value="'.$ids[$i].'">'.$prenoms[$i].' '.$noms[$i].'</option>';
                }
                 ?>
            </select><br><br>   
            <label><b>Objet</b></label>
            <input type="text" placeholder="Titre" name="title" required>

            <label><b>Contenu</b></label>
            <TEXTAREA name="contenu" rows=10 cols=52></TEXTAREA>
            <input type="submit" id='submit' value='Poster'>
            
        </form>
    </div>
</body>

</html>