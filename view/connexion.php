<html>

<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    <style type="text/css">
        body {
            background: #67BE4B;
        }
    </style>
</head>

<body>
    <div id="container">
        <!-- zone de connexion -->

        <form action="../model/checkLogin.php" method="POST">
            <h1>Connexion</h1>

            <label><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>

            <input type="submit" id='submit' value='LOGIN'>
            <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                    if($err==3)
                        echo "<p style='color:red'>Erreur: merci de contacter le service technique en leur communiquant le code d'erreur suivant: ERR_PROF_TW</p>";
                }
                ?>
        </form>
    </div>
</body>

</html>