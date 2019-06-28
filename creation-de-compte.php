<html>

<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    <script>var users = [];</script>
</head>

<body>
    <?php
    session_start();
    include('navbar.php');
    require('dbConnection.php');
    $sql = "SELECT idcomptes FROM comptes";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    
        while($row = $result->fetch_assoc()) {
        
            echo '<script>users.push("'.$row["idcomptes"].'")</script>';
             
        }
  
    }   
    ?>
    <div id="container">
        <!-- zone de connexion -->

        <form action="creation.php" method="POST">
            <h2>Création d'un compte utilisateur</h2>

            <label><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" id="username" name="username" required>
            <p style="color:red"; id="result"></p>
            <script>
                console.log(users);
                username.oninput = function() {
                    if (users.includes(username.value)){
                        console.log('contient');
                        result.innerHTML = "Nom d'utilisateur non disponible";
                    }
                    else{
                         result.innerHTML = "";
                    }
                };
</script>
            
            <?php
                if(isset($_GET['err'])){
                    $err = $_GET['err'];
                    if($err==1)
                        echo "<p style='color:red'>Nom d'utilisateur non disponible</p>";
                }
                ?>

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
