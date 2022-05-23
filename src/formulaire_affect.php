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
                    <a href="tournois.php">
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
                    
<?php
require_once("connexion_bdd.php");
$conn = connexionBdd();


if (isset($_POST["lieu"]) and isset($_POST["tournoi"])){

    $sql = "UPDATE tournoi SET lieu = ".$_POST["lieu"]." WHERE idTournoi = ".$_POST["tournoi"];
    echo $sql;
    $result = mysqli_query($conn, $sql) or die("Erreur dans la requête : ".mysqli_error($conn)."\n".$sql);
    echo "\nLe lieu a bien été associé au tournoi";
}

if (isset($_POST["personne"]) and isset($_POST["equipe"])){

    $sql = "UPDATE personne SET equipe = ".$_POST["equipe"]." WHERE idPersonne = ".$_POST["personne"];
    echo $sql;
    $result = mysqli_query($conn, $sql) or die("Erreur dans la requête : ".mysqli_error($conn)."\n".$sql);
    echo "\nLa personne a bien été ajouté à une équipe";
}
    
if (isset($_POST["personne"]) and isset($_POST["tournoi_indiv"])){

    $sql = "INSERT INTO affectTournoiIndiv VALUES(".$_POST["personne"].", ".$_POST["tournoi_indiv"].")";
    echo $sql;
    $result = mysqli_query($conn, $sql) or die("Erreur dans la requête : ".mysqli_error($conn)."\n".$sql);
    echo "\nLa personne a bien été ajouté au tournoi individuel";
}

if (isset($_POST["equipe_t"]) and isset($_POST["tournoi_e"])){

    $sql = "INSERT INTO affectTournoiEquipe VALUES(".$_POST["equipe_t"].", ".$_POST["tournoi_e"].")";
    echo $sql;
    $result = mysqli_query($conn, $sql) or die("Erreur dans la requête : ".mysqli_error($conn)."\n".$sql);
    echo "\nL'équipe a bien été ajouté au tournoi par équipe";
}
?>

<div id="fond">

    <div id="titre">
    <h1>Page de test pour les formulaires qui ont vocation à gérer les affectations</h1>
    </div>

    <div id="contenu">
        <h3>Formulaire 1 : Affecter un lieu à un tournoi</h3>
        <form method="post">
            <label for="lieu">Choisir un lieu</label>
            <select name="lieu" id="lieu">
                <?php
                $sql = "SELECT * FROM lieu";
                $result = mysqli_query($conn, $sql) or die("Erreur dans la requête : ".mysqli_error($conn)."\n".$sql);
                while($row = mysqli_fetch_assoc($result)){
                    echo "<option value='".$row["idLieu"]."'>".$row["adresse"].", ".$row["cp"]." ".$row["ville"]."</option>\n";
                }?>
            </select>

            <label for="tournoi">Choisir un tournoi</label>
            <select name="tournoi" id="tournoi">
                <?php
                $sql = "SELECT idTournoi, nom, format FROM tournoi WHERE lieu = NULL";
                $result = mysqli_query($conn, $sql) or die("Erreur dans la requête : ".mysqli_error($conn)."\n".$sql);
                while($row = mysqli_fetch_assoc($result)){
                    echo "<option value='".$row["idTournoi"]."'>".$row["nom"].", ".$row["format"]."</option>\n";
                }?>
            </select>
            <button type='submit'>Ajouter</button>
        </form>

        <h3>Formulaire 2 : Affecter une personne à une équipe</h3>
        <form method="post">
            <label for="personne">Choisir un personne</label>
            <select name="personne" id="personne">
                <?php
                $sql = "SELECT pseudo FROM personne";
                $result = mysqli_query($conn, $sql) or die("Erreur dans la requête : ".mysqli_error($conn)."\n".$sql);
                while($row = mysqli_fetch_assoc($result)){
                    echo "<option value='".$row["idPersonne"]."'>".$row["pseudo"]."</option>\n";
                }?>
            </select>

            <label for="equipe">Choisir une équipe</label>
            <select name="equipe" id="equipe">
                <?php
                $sql = "SELECT idEquipe, nom FROM equipe";
                $result = mysqli_query($conn, $sql) or die("Erreur dans la requête : ".mysqli_error($conn)."\n".$sql);
                while($row = mysqli_fetch_assoc($result)){
                    echo "<option value='".$row["idEquipe"]."'>".$row["nom"]."</option>\n";
                }?>
            </select>
            <button type='submit'>Ajouter</button>
        </form>
        
        <h3>Formulaire 3 : Affecter une personne à un tournoi individuel</h3>
            <form method="post">
                <label for="personne">Choisir une personne</label>
                <select name="personne" id="personne">
                    <?php
                    $sql = "SELECT idPersonne, pseudo FROM personne";
                    $result = mysqli_query($conn, $sql) or die("Erreur dans la requête : ".mysqli_error($conn)."\n".$sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<option value='".$row["idPersonne"]."'>".$row["pseudo"]."</option>\n";
                    }?>
                </select>

                <label for="tournoi_indiv">Choisir un tournoi</label>
                <select name="tournoi_indiv" id="tournoi_indiv">
                    <?php
                    $sql = "SELECT idTournoi, nom, format FROM tournoi WHERE type = 'indiv'";
                    $result = mysqli_query($conn, $sql) or die("Erreur dans la requête : ".mysqli_error($conn)."\n".$sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<option value='".$row["idTournoi"]."'>".$row["nom"].", ".$row["format"]."</option>\n";
                    }?>
                </select>
                <button type='submit'>Ajouter</button>
            </form>
        
        <h3>Formulaire 4 : Affecter une équipe à un tournoi par équipe</h3>
        <form method="post">
                <label for="equipe_t">Choisir une équipe</label>
                <select name="equipe_t" id="equipe_t">
                    <?php
                    $sql = "SELECT idEquipe, nom FROM equipe";
                    $result = mysqli_query($conn, $sql) or die("Erreur dans la requête : ".mysqli_error($conn)."\n".$sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<option value='".$row["idEquipe"]."'>".$row["nom"]."</option>\n";
                    }?>
                </select>

                <label for="tournoi_e">Choisir un tournoi</label>
                <select name="tournoi_e" id="tournoi_e">
                    <?php
                    $sql = "SELECT idTournoi, nom, format FROM tournoi WHERE type = 'equipe'";
                    $result = mysqli_query($conn, $sql) or die("Erreur dans la requête : ".mysqli_error($conn)."\n".$sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<option value='".$row["idTournoi"]."'>".$row["nom"].", ".$row["format"]."</option>\n";
                    }?>
                </select>
                <button type='submit'>Ajouter</button>
            </form>

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
