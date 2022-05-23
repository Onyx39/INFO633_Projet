

<?php
    require_once("connexion_bdd.php");
    $conn = connexionBdd();
?>



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
                    <a id="connexion" href="login.php">
                        <img id="logo" src="media/bouton_connexion.png" />
                    </a>
                </div>
            </div>
            
            <div id="contenu">
                <ul>
                <?php 
                $sql = "SELECT nom, type, format, prix, date, lieu FROM tournoi";
                $result = mysqli_query($conn, $sql) or die("Erreur dans la requête : ".mysqli_error($conn)."\n".$sql);


                while($row = mysqli_fetch_assoc($result)){
                    echo "<li>".$row["nom"]." ".$row["type"]." ".$row["format"]." ".$row["prix"]." ".$row["date"]." ".$row["lieu"]."</li>";
                }

                ?>
                </ul>    
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
