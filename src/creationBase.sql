DROP TABLE IF EXISTS affectTournoiEquipe;
DROP TABLE IF EXISTS affectTournoiIndiv;
DROP TABLE IF EXISTS personne;
DROP TABLE IF EXISTS equipe;
DROP TABLE IF EXISTS lieu;
DROP TABLE IF EXISTS tournoi;


CREATE TABLE personne (
    idPersonne INT(4) AUTO_INCREMENT,
    pseudo VARCHAR(30) NOT NULL,
    nom VARCHAR(30) NOT NULL,
    prenom VARCHAR(30) NOT NULL,
    score FLOAT,
    CONSTRAINT pk_personne PRIMARY KEY (idPersonne) 
);

CREATE TABLE equipe (
    idEquipe INT(4) AUTO_INCREMENT,
    nom VARCHAR(30) NOT NULL,
    score FLOAT,
    CONSTRAINT pk_equipe PRIMARY KEY (idEquipe) 
);

CREATE TABLE lieu (
    idLieu INT(4) AUTO_INCREMENT,
    adresse VARCHAR(50) NOT NULL,
    cp INT(5),
    ville VARCHAR(30),
    CONSTRAINT pk_lieu PRIMARY KEY (idLieu)
);

CREATE TABLE tournoi (
    idTournoi INT(4) AUTO_INCREMENT,
    nom VARCHAR(30) NOT NULL,
    mdp VARCHAR(30) NOT NULL,
    format VARCHAR(30) NOT NULL,
    prix FLOAT NOT NULL,
    date DATETIME NOT NULL,
    lieu INT(4),
    CONSTRAINT pk_tournoi PRIMARY KEY (idTournoi)
    CONSTRAINT fk_lieu FOREIGN KEY (idLieu) 
);

CREATE TABLE affectTournoiIndiv (
    idPersonne INT(4) NOT NULL,
    idTournoi INT(4) NOT NULL,
    CONSTRAINT pk_affectTournoiIndiv PRIMARY KEY (idPersonne, idTournoi),
    CONSTRAINT fk_affectTournoiIndiv_idTournoi FOREIGN KEY(idTournoi) REFERENCES tournoi(idTournoi),
    CONSTRAINT fk_affectTournoiIndiv_idPersonne FOREIGN KEY(idPersonne) REFERENCES personne(idPersonne)
    
);

CREATE TABLE affectTournoiEquipe (
    idEquipe INT(4) NOT NULL,
    idTournoi INT(4) NOT NULL,
    CONSTRAINT pk_affectTournoiEquipe PRIMARY KEY (idEquipe, idTournoi),
    CONSTRAINT fk_affectTournoiEquipe_idEquipe FOREIGN KEY(idEquipe) REFERENCES equipe(idEquipe),
    CONSTRAINT fk_effectTournoiEquipe_idTournoi FOREIGN KEY(idTournoi) REFERENCES tournoi(idTournoi)
);