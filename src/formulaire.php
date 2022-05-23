<!DOCTYPE HTML>

<html>

    <head>
        <title>Fomulaire pour complétion BD</title>
        <meta content="info">
        <meta charset="UTF-8">
    </head>
    
    <?php
    require_once("connexion_bdd.php");
    $conn = connexionBdd();
    ?>

    <body>

    <div id="fond">

        <div id="titre">
        <h1>Page de test pour les formulaires qui ont vocation à insérer des données dans la BD</h1>
        </div>

        <?php
        echo "<p>Etat de la connexion : ".$msg."<p>";
        ?>

        <div id="contenu">
            <h3>Formulaire 1 : Rentrer un nouveau joueur dans la BD</h3>
            <form action="<?php __FILE__ ?>" method="post">
            Nom : <input type='text' name='nom'></br>
            Prenom : <input type='text' name='prenom'></br>
            Pseudo : <input type='text' name='pseudo'></br></br>
            <button type='submit'>Ajouter à la base de données</button>
            </form>

            <?php
            if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['pseudo'])){
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $pseudo = $_POST['pseudo'];
                $sqlJoueur = "INSERT INTO personne (pseudo, nom, prenom, score) VALUES ('".$pseudo."', '".$nom."', '".$prenom."', 0);";
                //Il faudra débattre du score par défaut d'un nouveau joueur
                //echo $sqlJoueur;
                $resultJoueur =  mysqli_query($conn, $sqlJoueur) or die("Requête invalide : ".mysqli_error($conn)."</br>".$sqlJoueur);
                echo  "<u>Le joueur a bien été ajouté à la base de données.</u>";
            }
            ?>

            </br></br></br>

            <h3>Formulaire 2 : Rentrer une nouvelle équipe dans la BD</h3>
            <form action="<?php __FILE__ ?>" method="post">
            Nom d'équipe : <input type='text' name='nomdequipe'></br></br>
            <button type='submit'>Ajouter à la base de données</button>
            </form>

            <?php
            if(isset($_POST['nomdequipe'])){
                $nomdequipe = $_POST['nomdequipe'];
                $sqlEquipe = "INSERT INTO equipe (nom, score) VALUES ('".$nomdequipe."', 0);";
                //Il faudra débattre du score par défaut d'une nouvelle equipe
                //echo $sqlEquipe;
                $resultEquipe =  mysqli_query($conn, $sqlEquipe) or die("Requête invalide : ".mysqli_error($conn)."</br>".$sqlEquipe);
                echo  "<u>L'équipe a bien été ajouté à la base de données.</u>";
            }
            ?>

            </br></br></br>

            <h3>Formulaire 3 : Rentrer un nouveau lieu dans la BD</h3>
            <form action="<?php __FILE__ ?>" method="post">
            Adresse : <input type='text' name='adresse'></br>
            Code postal : <input type='number' name='cp'></br>
            Ville : <input type='text' name='ville'></br></br>
            <button type='submit'>Ajouter à la base de données</button>
            </form>

            <?php
            if(isset($_POST['adresse']) && isset($_POST['cp']) && isset($_POST['ville'])){
                $adresse = $_POST['adresse'];
                $cp = $_POST['cp'];
                $ville = $_POST['ville'];
                $sqlLieu = "INSERT INTO lieu (adresse, cp, ville) VALUES ('".$adresse."', ".$cp.", '".$ville."');";
                //echo $sqlLieu;
                $resultJoueur =  mysqli_query($conn, $sqlLieu) or die("Requête invalide : ".mysqli_error($conn)."</br>".$sqlLieu);
                echo  "<u>Le lieu a bien été ajouté à la base de données.</u>";
            }
            ?>

            </br></br></br>

            <h3>Formulaire 4 : Rentrer un nouveau tournoi dans la BD</h3>
            <form action="<?php __FILE__ ?>" method="post">
            Nom du tournoi : <input type='text' name='nomtournoi'></br>
            Mot de passe : <input type='text' name='mdp'></br>
            Type : <select name='type'>
                        <option value='indiv'>Individuel</option>
                        <option value='equipe'>Par équipe</option>
                    </select><br>
            Format : <input type='text' name='format'></br>
            Prix : <input type='float' name='prix'></br>
            Date : <input type='text' name='date' pattern="[0-9]{2}-[0-9]{2}-[0-9]{4} [0-9]{2}:[0-9]{2}:[0-9]{2}" placeholder="JJ-MM-AAAA HH:MM:SS"></br></br>
            <button type='submit'>Ajouter à la base de données</button>
            </form>

            <?php
            if(isset($_POST['nomtournoi']) && isset($_POST['mdp']) && isset($_POST['format']) && isset($_POST['prix']) && isset($_POST['date'])){
                $nomtournoi = $_POST['nomtournoi'];
                $mdp = $_POST['mdp'];
                $format = $_POST['format'];
                $prix = $_POST['prix'];
                $date = $_POST['date'];
                $sqlTournoi = "INSERT INTO tournoi (nom, mdp, format, prix, date) VALUES ('".$nomtournoi."', '".$mdp."', '".$format."', ".$prix.", STR_TO_DATE('".$date."', \"%d-%m-%Y %H:%i:%s\"));";
                //echo $sqlTournoi;
                $resultTournoi =  mysqli_query($conn, $sqlTournoi) or die("Requête invalide : ".mysqli_error($conn)."</br>".$sqlTournoi);
                echo  "<u>Le tournoi a bien été ajouté à la base de données.</u>";
            }
            ?>



        

        
        </div>

    </div>

    </body>

</html>
