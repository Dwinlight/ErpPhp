<html>

<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
</head>

<body>
    <?php
    session_start();
    include('navbar.php');
    ?>
    <div id="container">
        <!-- zone de connexion -->

        <form action="creation.php" method="POST">
            <h2>Création d'un compte utilisateur</h2>

            <label><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

            <label><b>Nom</b></label>
            <input type="text" placeholder="Entrer le nom" name="nom" required>

            <label><b>Prénom</b></label>
            <input type="text" placeholder="Entrer le prénom" name="prenom" required>

            <label><b>Type de compte</b></label>
            <div>
                <input type="radio" name="profil" value="utilisateur" checked>Utilisateur
                <input type="radio" name="profil" value="administrateur">Administrateur<br>
            </div>
            <input type="submit" id='submit' value='Création'>

        </form>
    </div>
</body>

</html>