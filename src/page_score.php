<html>
    <head>
        <meta charset="utf-8">
        <title>PolyGambling</title>
        <link href="css1.css" rel="stylesheet">

    </head>
    <body>
        <div id="fond">

            <div id="entete">
                <div id="pagePrincipale">
                    <a href="html1.html">
                        <img id="logo" src="media/PolyGambling_logo_1.png" />
                    </a>
                </div>
               
                <div id="navigation">
                    <a href="page_score.php">
                        <img id="logo" src="media/Bouton_classement.png" />
                    </a>
                    <a href="deuxieme_page">
                        <img id="logo" src="media/Bouton_tournois.png" />
                    </a>
                    <a href="formulaire_affect.php">
                        <img id="logo" src="media/Bouton_gestion.png" />
                    </a>
                </div>
                <div>
                    <a id="connexion" href="login.html">
                        <img id="logo" src="media/bouton_connexion.png" />
                    </a>
                </div>
            </div>
            
            <div id="contenu">
                <div id="infos">
                <style>
    <?php include 'page_score.css'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
</style>
<div id='fond'>
<h1><center>Classements &#127942</center></h1>


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
    
    <div id='contenu'>

    <?php

        $sql_joueur = "SELECT * FROM personne ORDER BY score DESC;";
        $resultat_joueur = mysqli_query($conn, $sql_joueur) or die ("Requête invalide : ".mysqli_error($conn)."\n".$sql_joueur);
        echo "<table border='1'>";
        echo "<caption align='top'><h4>Classement des joueurs</h4></caption>";
        echo "<thead>";
        echo "<tr><th id='rang'>Rang</th><th>Pseudo</th><th>Score</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        $rang = 1; 
        while ($row_joueur = mysqli_fetch_assoc($resultat_joueur)) {
            if ($rang == 1) {
                echo "<tr><td>&#129351</td><td>".$row_joueur['pseudo']."</td><td>".$row_joueur['score']."</td></tr>";
                $rang++;
            }
            else {if ($rang == 2) {
                echo "<tr><td>&#129352</td><td>".$row_joueur['pseudo']."</td><td>".$row_joueur['score']."</td></tr>";
                $rang++;
            }
            else {if ($rang == 3) {
                echo "<tr><td>&#129353</td><td>".$row_joueur['pseudo']."</td><td>".$row_joueur['score']."</td></tr>";
                $rang++;
            }
            else {if ($rang > 3) {
                echo "<tr><td>" .$rang."</td><td>".$row_joueur['pseudo']."</td><td>".$row_joueur['score']."</td></tr>";
                $rang++;
            }}}}

        }
        echo "</tbody>";
        echo "</table>";


        $sql_equipe = "SELECT * FROM equipe ORDER BY score DESC;";
        $resultat_equipe = mysqli_query($conn, $sql_equipe) or die ("Requête invalide : ".mysqli_error($conn)."\n".$sql_equipe);
        echo "<table border='1'>";
        echo "<caption align='top'><h4>Classement des équipes</h4></caption>";
        echo "<thead>";
        echo "<tr><th id='rang'>Rang</th><th>Equipe</th><th>Score</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        $rang2 = 1; 
        while ($row_equipe = mysqli_fetch_assoc($resultat_equipe)) {
            if ($rang2 == 1) {
                echo "<tr><td>&#129351</td><td>".$row_equipe['nom']."</td><td>".$row_equipe['score']."</td></tr>";
            $rang2++;
            }
            else {if ($rang2 == 2) {
                echo "<tr><td>&#129352</td><td>".$row_equipe['nom']."</td><td>".$row_equipe['score']."</td></tr>";
            $rang2++;
            }
            else {if ($rang2 == 3) {
                echo "<tr><td>&#129353</td><td>".$row_equipe['nom']."</td><td>".$row_equipe['score']."</td></tr>";
            $rang2++;
            }
            else {if ($rang2 > 3) {
                echo "<tr><td>" .$rang2."</td><td>".$row_equipe['nom']."</td><td>".$row_equipe['score']."</td></tr>";
            $rang2++;
            }}}}
        }
        echo "</tbody>";
        echo "</table>";
    ?>

    <div class="cube">
        <div class="side" id="front"></div>
        <div class="side" id="bottom"></div>
        <div class="side" id="top"></div>
        <div class="side" id="left"></div>
        <div class="side" id="right"></div>
        <div class="side" id="back"></div>
    </div>
        
    <script src="./assets/jquery.min.js" type="text/javascript" ></script>
    <script src="./assets/bootstrap.js" type="text/javascript" ></script>
    <script src="./script.js" type="text/javascript" ></script>

    </div>
    </div>
                </div>
            </div>  
            
            <div id="contact">
                <a href="https://www.instagram.com/theo.simonet/?hl=fr">
                    <img id="logo" src="media/insta.png" />
                </a>
                <a href="https://twitter.com/elonmusk">
                    <img id="logo" src="media/twitter.png" />
                </a>
            </div>

        </div>
    </body>
</html>
