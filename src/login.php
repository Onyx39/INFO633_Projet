<?php 

/*Connection à la BD*/ 
$conn = @mysqli_connect("tp-epua:3308", "richaval", "kwia6s9y");

if (mysqli_connect_errno()) {
$msg = "erreur ". mysqli_connect_error();
} else {  
$msg = "connecté au serveur ".mysqli_get_host_info($conn);
mysqli_select_db($conn, "richaval");

/*Encodage UTF8 pour les échanges avec la BD*/
mysqli_query($conn, "SET NAMES UTF8");
}
?>


<html>
    <head>
       <meta charset="utf-8">
        <link rel="stylesheet" href="login.css" media="screen" type="text/css" />
    </head>
    <body>
        <div id="container">
            
            <form action="<?php __FILE__ ?>" method="post">
                <h1>Connexion</h1>

                <?php 
                if (isset($_POST['username']) && isset($_POST['password'])) {
                    $mdp = $_POST['password'];
                    $pseudo = $_POST['username'];
                    $sql = "SELECT count(idPersonne) FROM personne WHERE pseudo = '".$pseudo."' AND mdp = '".$mdp."';";
                    $result =  mysqli_query($conn, $sql) or die("Requête invalide : ". mysqli_error($conn)."</br>".$sql);
                    $val = mysqli_fetch_array($result);
                    if ($val[0] == 1) {
                        $value = $pseudo;
                        setcookie("user", $value, time() + (86400 * 30), '/');
                        echo "Bienvenue ".$value." !";
                    }  
                    else {
                        echo "Les informations fournies ne sont pas correctes.<br>Recommencez ou inscrivez vous.";
                    }
                }
                ?>
                <br><br>
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <a href="inscription.php">Inscription</a>

                <input type="submit" id='submit' value='LOGIN' >
              
            </form>
        </div>
    </body>
</html>