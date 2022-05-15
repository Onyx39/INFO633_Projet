<html>

    <head>
        <title>Fomulaire pour complétion BD</title>
        <meta content="info">
        <meta charset="UTF-8">
    </head>

    <?php
    /*Connection à la BD*/ 
    $conn = @mysqli_connect("tp-epua:3308", "richaval", "kwia6s9y");

    if (mysqli_connect_errno()) {
        $msg = "erreur ". mysqli_connect_error();
    } else {  
        $msg = "connecté au serveur " . mysqli_get_host_info($conn);
        mysqli_select_db($conn, "richaval");
    
        /*Encodage UTF8 pour les échanges avec la BD*/
        mysqli_query($conn, "SET NAMES UTF8");
    }

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
    
if (isset($_POST["personne"]) and isset($_POST["tournoi"])){

    $sql = "INSERT INTO affectTournoiIndiv VALUES($_POST["personne"], $_POST["tournoi"]);
    echo $sql;
    $result = mysqli_query($conn, $sql) or die("Erreur dans la requête : ".mysqli_error($conn)."\n".$sql);
    echo "\nLa personne a bien été ajouté au tournoi individuel";
}

if (isset($_POST["equipe"]) and isset($_POST["tournoi"])){

    $sql = "INSERT INTO affectTournoiEquipe VALUES($_POST["equipe"], $_POST["tournoi"]);
    echo $sql;
    $result = mysqli_query($conn, $sql) or die("Erreur dans la requête : ".mysqli_error($conn)."\n".$sql);
    echo "\nL'équipe a bien été ajouté au tournoi par équipe";
}
?>


<body>

<div id="fond">

    <div id="titre">
    <h1>Page de test pour les formulaires qui ont vocation à gérer les affectations</h1>
    </div>

    <?php
    echo "<p>Etat de la connexion : ".$msg."<p>";
    ?>

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

                <label for="tournoi">Choisir un tournoi</label>
                <select name="tournoi" id="tournoi">
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
                <label for="equipe">Choisir une équipe</label>
                <select name="equipe" id="equipe">
                    <?php
                    $sql = "SELECT idEquipe, nom FROM equipe";
                    $result = mysqli_query($conn, $sql) or die("Erreur dans la requête : ".mysqli_error($conn)."\n".$sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<option value='".$row["idEquipe"]."'>".$row["nom"]."</option>\n";
                    }?>
                </select>

                <label for="tournoi">Choisir un tournoi</label>
                <select name="tournoi" id="tournoi">
                    <?php
                    $sql = "SELECT idTournoi, nom, format FROM tournoi WHERE type = 'equipe'";
                    $result = mysqli_query($conn, $sql) or die("Erreur dans la requête : ".mysqli_error($conn)."\n".$sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<option value='".$row["idTournoi"]."'>".$row["nom"].", ".$row["format"]."</option>\n";
                    }?>
                </select>
                <button type='submit'>Ajouter</button>
            </form>
