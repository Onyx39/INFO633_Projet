<?php

if (isset($_POST["lieu"]) and isset($_POST["tournoi"])){

    $sql = "UPDATE tournoi SET lieu = ".$_POST["lieu"]." WHERE ".$_POST["tournoi"]." IN (SELECT idTournoi FROM tournoi WHERE idTournoi = ".$_POST["tournoi"];
    echo $sql;
    $result = mysqli_query($conn, $sql) or die("Erreur dans la requête : ".mysqli_error($conn)."\n".$sql);
    echo "\nLe lieu a bien été associé au tournoi";
}

?>

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
                $sql = "SELECT idTournoi, nom, format FROM tournoi";
                $result = mysqli_query($conn, $sql) or die("Erreur dans la requête : ".mysqli_error($conn)."\n".$sql);
                while($row = mysqli_fetch_assoc($result)){
                    echo "<option value='".$row["idTournoi"]."'>".$row["nom"].", ".$row["format"]."</option>\n";
                }?>
            </select>
        <button type='submit'>Ajouter</button>
        </form>