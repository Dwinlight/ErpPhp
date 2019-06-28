<?php
    session_start();
    if(!isset($_SESSION['profil']) || $_SESSION['profil'] != 42){
            session_destroy();
            header('Location: connexion.php');
        }
    require('dbConnection.php');
    $sql = "SELECT nom, prenom, idcomptes, profil FROM comptes WHERE idcomptes ='" . $_GET['id'] . "'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    
        while($row = $result->fetch_assoc()) {
        
            $idcomptes = $row["idcomptes"];
            $nom = $row["nom"];
            $prenom = $row["prenom"];
            $profil = $row["profil"];
             
        }
  
    }   
    if($profil>$_SESSION['profil']){
            session_destroy();
            header('Location: connexion.php');
        }
    if($profil == 1){
        $admin = '';
        $utilisateur = 'checked';
    }
    else {
        $admin = 'checked';
        $utilisateur = '';
    }
?>
<html>

<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
</head>

<body>
    <?php
    include('navbar.php');
    $_SESSION['modifyID'] = $idcomptes;
    ?>
    <div id="container">
        <!-- zone de connexion -->

        <form action="modify.php" method="POST">
            <h2>Création d'un compte utilisateur</h2>

            <label><b>Nom d'utilisateur</b></label>
            <?php
            echo '<input type="text" placeholder="Entrer le nom d\'utilisateur" name="username" value="' .$idcomptes .'" required disabled>';
            
            echo '<label><b>Nom</b></label>';
            
            echo '<input type="text" placeholder="Entrer le nom" value="'. $nom. '"name="nom" required>';

            echo '<label><b>Prénom</b></label>';
            
            echo '<input type="text" placeholder="Entrer le prenom" value="'. $prenom. '"name="prenom" required>';
            
            echo '<label><b>Mot de passe</b></label>';
            
            echo '<input type="password" placeholder="Nouveau mot de passe (laisser vide pour ne pas changer)" name="password1" id="password1" required>';
            
            ?>
            <p style="color:red"; id="taille"></p>
            <script>
                password1.oninput = function() {
                    if (password1.value.length>0 && password1.value.length < 5){
                        taille.innerHTML = "Taille du mot de passe insuffisante (5 charatères minimum)";
                        document.getElementById("submit").disabled = true;
                    }
                    else{
                         taille.innerHTML = "";
                        document.getElementById("submit").disabled = false;
                    }
                    if (password1.value !== password2.value){
                        confirmation.innerHTML = "Mots de passe différents, merci de vérifier vos saisies";
                        document.getElementById("submit").disabled = true;
                    }
                    else{
                         confirmation.innerHTML = "";
                        document.getElementById("submit").disabled = false;
                    }
                };
</script>
             
            
            <?php
            
            echo '<label><b>Confirmation mot de passe</b></label>';
            
            echo '<input type="password" placeholder="Confirmation mot de passe" "name="password2" id="password2" required>';
            ?>
            <p style="color:red"; id="confirmation"></p>
             <script>
                password2.oninput = function() {
                    if (password1.value !== password2.value){
                        confirmation.innerHTML = "Mots de passe différents, merci de vérifier vos saisies";
                        document.getElementById("submit").disabled = true;
                    }
                    else{
                         confirmation.innerHTML = "";
                        document.getElementById("submit").disabled = false;
                    }
                };
</script> 
            
            <?php
            

            echo '<label><b>Type de compte</b></label>';
            echo '<div>
                <input type="radio" name="profil" value="utilisateur"'. $utilisateur.'>Utilisateur
                <input type="radio" name="profil" value="administrateur"' . $admin. '>Administrateur<br>
            </div>';
            ?>
            <input type="submit" id='submit' value='Création'>;

        </form>
    </div>
</body>

</html>