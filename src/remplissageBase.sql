INSERT INTO personne (pseudo, mdp, nom, prenom, score) VALUE ('Onyx', 'gfrgf', 'Richard', 'Valentin', 25);
INSERT INTO personne (pseudo, mdp, nom, prenom, score) VALUE ('Anonymous', 'tructruc$', 'Dupond', 'Jean', 56);
INSERT INTO personne (pseudo, mdp, nom, prenom, score) VALUE ('Salma', 'Salma', 'IDU', 'Nelma', 89);

INSERT INTO equipe (nom, score) VALUES ('Kavé Team', 100);
INSERT INTO equipe (nom, score) VALUES ('IDU', 80);
INSERT INTO equipe (nom, score) VALUES ('Equipe de France', 99);

INSERT INTO lieu (adresse, cp, ville) VALUES ('5 chemin de Bellevue', 74000, 'Annecy');
INSERT INTO lieu (adresse, cp, ville) VALUES ('Tour Eiffel', 95000, 'Paris');
INSERT INTO lieu (adresse, cp, ville) VALUES ('Cathédrale', 68000, 'Strasbourg');

INSERT INTO tournoi (nom, mdp, type, format, prix, date, lieu) VALUES ('Tournoi de France', 'fg^9$ù$f8', 'indiv', 'chacun pour soi', 2.5, now(), 3);
INSERT INTO tournoi (nom, mdp, type, format, prix, date, lieu) VALUES ('Tournoi de France', 'fg^9$ù$f8', 'equipe', 'chacun pour son equipe', 5, now(), 2);
INSERT INTO tournoi (nom, mdp, type, format, prix, date, lieu) VALUES ('Tournoi Popo', 'fg^9$ù$f8', 'indiv', 'chacun pour soi', 1, now(), 1);

INSERT INTO affectTournoiIndiv VALUES (1, 3);
INSERT INTO affectTournoiIndiv VALUES (2, 3);
INSERT INTO affectTournoiIndiv VALUES (3, 3);
INSERT INTO affectTournoiIndiv VALUES (2, 1);

INSERT INTO affectTournoiEquipe VALUES (1, 2);
INSERT INTO affectTournoiEquipe VALUES (2, 2);
INSERT INTO affectTournoiEquipe VALUES (3, 2);
