<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial; 
}

.navbar {
    padding-left: 0px;
    padding-right: 0px;
    padding-top: 0px;
  overflow: hidden;
  background-color: #333;
    
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
padding-right: 5px;
}
    
.dropdown2 {
  float: left;
  overflow: hidden;
padding-right: 1px;
}

.dropdown2 .dropbtn2 {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 30px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}
    
.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 40px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}
.dropdown2:hover .dropbtn2 {
  background-color: red;
}
.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown2:hover .dropdown-content{
  display: block;
}
.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>
<body>

<div class="navbar">
<?php
    if($_SESSION['profil']==1){
        echo '<a href="../controller/router.php?direction=dashboard">Home</a>';
    }
    if($_SESSION['profil']==12 || $_SESSION['profil']==42){
        echo '<a href="../controller/router.php?direction=admin">Home</a>';
    }
    ?>
    <div class="dropdown2" >
    <button class="dropbtn2"><?php echo 'Messages Privés'; ?> 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../controller/router.php?direction=boite">Boite de réception</a>
      <a href="../controller/router.php?direction=new-mp">Envoyer un message</a>
         </div>
  </div> 
    <?php
        
        if ($_SESSION['profil'] == 42 || $_SESSION['profil'] == 12){
            echo '<a href="../controller/router.php?direction=message">Poster un message</a>';
        }
        if ($_SESSION['profil'] == 42){
            echo '<a href="../controller/router.php?direction=old">Messages supprimés</a>';
        }
        
        if ($_SESSION['profil'] == 42 || $_SESSION['profil'] == 12){
            echo '<a href="../controller/router.php?direction=creation">Création d\'utilisateur</a>';
        }
        
        if ($_SESSION['profil'] == 42  || $_SESSION['profil'] == 12){
            echo '<a href="../controller/router.php?direction=comptes">Liste des utilisateurs</a>';
        }
        
        if ($_SESSION['profil'] == 42){
            echo '<a href="../controller/router.php?direction=historique">Historique</a>';
        }
    
      
        ?>
    <div class="dropdown" style="float:right">
    <button class="dropbtn"><?php echo $_SESSION['username']; ?> 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <?php echo '<a href="../controller/router.php?direction=modification&id=' .$_SESSION['username'].'">Profil</a>'; ?>
      <a href="../controller/router.php?deconnexion=true">Déconnexion</a>
    </div>
  </div> 
  
</div>

</body>
</html>
