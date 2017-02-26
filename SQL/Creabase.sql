DELIMITER //

DROP DATABASE IF EXISTS soulie_benevoles//
CREATE DATABASE soulie_benevoles//

USE soulie_benevoles//

SET FOREIGN_KEY_CHECKS=0//

DROP TABLE IF EXISTS Benevole//
DROP TABLE IF EXISTS DispoChantier//
DROP TABLE IF EXISTS DispoFestival//
DROP TABLE IF EXISTS Compte//
DROP PROCEDURE IF EXISTS extractStingBeginEnd//
DROP TRIGGER IF EXISTS t_insert_benevole_compte//

SET FOREIGN_KEY_CHECKS=1//

CREATE TABLE Benevole(
	idBenevole INT(4) auto_increment,
	nom VARCHAR(20),
	prenom VARCHAR(20),
	mission VARCHAR(20),
	ville VARCHAR(20),
	competences VARCHAR(100),
	infoCompl VARCHAR(500),
	conventionSignee TINYINT(1),
	charteSignee TINYINT(1),
	langues VARCHAR(50),
	festival BOOLEAN,
	chantier BOOLEAN,
	CONSTRAINT pk_Benevole PRIMARY KEY (idBenevole)
) Engine=InnoDB//

CREATE TABLE Compte(
	idCompte INT(4) auto_increment,
	pseudo VARCHAR(15),
	mail VARCHAR(35),
	hashMdp VARCHAR(60),
	dateDerCo DATETIME(0),
	typeCompte VARCHAR(15) DEFAULT 'Membre',
  dateInsc DATETIME(0) DEFAULT NULL,
  idPhp VARCHAR(13),
  valide BOOLEAN DEFAULT FALSE,
  idBenevole INT(4),
	CONSTRAINT pk_Compte PRIMARY KEY (idCompte),
  CONSTRAINT fk_Compte_Benevole FOREIGN KEY (idBenevole) REFERENCES Benevole(idBenevole),
	CONSTRAINT uk_Compte_pseudo UNIQUE (pseudo),
	CONSTRAINT uk_Compte_idPhp UNIQUE (idPhp)
) Engine=InnoDB//

CREATE TABLE DispoChantier(
	idDispoChantier INT(6) auto_increment,
	date DATE,
	matin VARCHAR(10),
	repasMidi BOOLEAN,
	aprem VARCHAR(10),
	repasSoir BOOLEAN,
	idBenevole INT(4),
	CONSTRAINT pk_DispoChantier PRIMARY KEY (idDispoChantier),
	CONSTRAINT fk_Benevole_DispoChantier FOREIGN KEY (idBenevole) REFERENCES Benevole(idBenevole)
) Engine=InnoDB//

CREATE TABLE DispoFestival(
	idDispoFestival INT(6) auto_increment,
	date DATE,
	septneuf VARCHAR(10),
	neufonze VARCHAR(10),
	onzetreize VARCHAR(10),
	repasMidi BOOLEAN,
	treizequinze VARCHAR(10),
	quinzedixsept VARCHAR(10),
	dixseptdixneuf VARCHAR(10),
	repasSoir BOOLEAN,
	idBenevole INT(4),
	CONSTRAINT pk_DispoFestival PRIMARY KEY (idDispoFestival),
	CONSTRAINT fk_Benevole_DispoFestival FOREIGN KEY (idBenevole) REFERENCES Benevole(idBenevole)
) Engine=InnoDB//

create PROCEDURE extractStingBeginEnd(IN chaine VARCHAR(500), IN chDebut VARCHAR(10),IN chFin VARCHAR(10), OUT result VARCHAR(35))
  BEGIN
    DECLARE debut INT;
    DECLARE fin INT;
    set @debut= locate(chDebut, chaine) + 6;
    SET @fin= locate(chFin, chaine) - @debut;
    SET result=substring(chaine, @debut,@fin);
END//


CREATE TRIGGER t_insert_benevole_compte
  BEFORE INSERT ON Benevole FOR EACH ROW
  BEGIN
    DECLARE para VARCHAR(35);
    call extractStingBeginEnd(NEW.infoCompl,'<mail>','</mail>',@para);
    set NEW.infoCompl='';
    INSERT INTO Compte(mail,valide,idBenevole) VALUES (@para,1,NEW.idBenevole);
  END//
