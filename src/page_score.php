<style>
    <?php include 'page_score.css'; ?>
</style>

<h1>Classements</h1>

<h4>Classement des joueurs</h4>

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

        $sql_joueur = "SELECT * FROM personne ORDER BY score DESC;";
        $resultat_joueur = mysqli_query($conn, $sql_joueur) or die ("Requête invalide : ".mysqli_error($conn)."\n".$sql_joueur);
        echo "<div class='classementJoueur'>";
        echo "<table>";
        echo "<tr><th>Rang</th><th>Pseudo</th><th>Score</th></tr>";
        $rang = 1; 
        while ($row_joueur = mysqli_fetch_assoc($resultat_joueur)) {
            echo "<tr><td>".$rang."</td><td>".$row_joueur['pseudo']."</td><td>".$row_joueur['score']."</td></tr>";
            $rang++;
        }
        echo "</table>";
        echo "</div>";