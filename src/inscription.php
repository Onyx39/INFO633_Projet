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
        <link rel="stylesheet" href="inscription.css" media="screen" type="text/css" />
    </head>
    <body>
        <div id="container">
            
            <form action="verification.php" method="POST">
                <h1>Connexion</h1>

                <label><b>Nom</b></label>
                <input type="text" placeholder="Entrer le mot de passe" name="nom" required>

                <label><b>Prenom</b></label>
                <input type="text" placeholder="Entrer le mot de passe" name="prenom" required>

                <label><b>Date de naissance</b></label>
                <input type="date" placeholder="Entrer le mot de passe" name="date" required>
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <label><b>Confirmation du mot de passe</b></label>
                <input type="password" placeholder="Entrer de nouveau le mot de passe" name="password2" required>

                <input type="submit" id='submit' value='LOGIN' >
              
            </form>
        </div>

        <?php 
             if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['date']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password2'])) {
                if (date("Y/m/d") - $_POST[date] > 18) {echo "Tu es trop jeune";}
                else {if ($_POST['password'] != $_POST['password2']) {
                    echo "Les deux mots de passe ne coïncident pas, veuilez recommencez";
                    break;
                }
                else {echo "Tout va bien !";}}}


             }
    </body>
</html>