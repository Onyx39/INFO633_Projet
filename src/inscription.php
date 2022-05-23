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
            
            <form action="<?php __FILE__ ?>" method="post">
                <h1>Inscription</h1>

                <?php 
             if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['date']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password2'])) {
                $date = date_create();
                $date_max = date_sub($date,date_interval_create_from_date_string("18 years"));
                $date_max_string= $date_max->format('Y-m-d');
                $birth_date = $_POST['date'];
                $sql_verif_pseudo = "SELECT count(idPersonne) FROM personne WHERE pseudo = '".$_POST['username']."';";
                $result =  mysqli_query($conn, $sql_verif_pseudo) or die("Requête invalide : ". mysqli_error($conn)."</br>".$sql_verif_pseudo);
                $val = mysqli_fetch_array($result);
                if ($val[0] == 1) {
                    echo "<b>Ce pseudo est déjà utilisé, veuillez en choisir un autre.</b><br><br>";
                }
                else { if ($birth_date > $date_max_string) {
                    echo "<b>Vous êtes mineur.e, vous ne pouvez pas vous inscrire sur notre site</b><br><br>";
                }
                else {if ($_POST['password'] != $_POST['password2']) {
                    echo "<b>Les deux mots de passe ne coïncident pas, veuillez recommencer</b><br><br>";
                }
                else {
                    $pseudo = $_POST['username'];
                    $nom = $_POST['nom'];
                    $prenom = $_POST['prenom'];
                    $mdp = $_POST['password'];
                    $sql = "INSERT INTO personne (pseudo, mdp, nom, prenom, score) VALUE ('".$pseudo."', '".$mdp."', '".$nom."', '".$prenom."', 0);";
                    $result =  mysqli_query($conn, $sql) or die("Requête invalide : ". mysqli_error($conn)."</br>".$sql);
                    echo "<b color='red>'>Vous avez été enregistré, bienvenue !</b><br><br>";}}}}


        ?>

                <label><b>Nom</b></label>
                <input type="text" placeholder="Entrer le mot de passe" name="nom" required>

                <label><b>Prenom</b></label>
                <input type="text" placeholder="Entrer le mot de passe" name="prenom" required>

                <label><b>Date de naissance</b></label><br>
                <input type="date" placeholder="Entrer le mot de passe" name="date" required><br><br>
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <label><b>Confirmation du mot de passe</b></label>
                <input type="password" placeholder="Entrer de nouveau le mot de passe" name="password2" required>

                <input type="submit" id='submit' value='LOGIN' >
              
            </form>
        </div>

    </body>
</html>