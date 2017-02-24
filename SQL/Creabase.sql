DROP DATABASE IF EXISTS db_benevoles;

CREATE DATABASE db_benevoles;

USE db_benevoles;

DROP TABLE IF EXISTS Benevole;
DROP TABLE IF EXISTS DispoChantier;
DROP TABLE IF EXISTS DispoFestival;
DROP TABLE IF EXISTS Compte;

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
	CONSTRAINT pk_Compte PRIMARY KEY (idCompte),
	CONSTRAINT uk_Compte_pseudo UNIQUE (pseudo),
	CONSTRAINT uk_Compte_idPhp UNIQUE (idPhp)
) Engine=InnoDB;

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
	festival TINYINT(1),
	chantier TINYINT(1),
	idCompte INT(4),
	CONSTRAINT pk_Benevole PRIMARY KEY (idBenevole),
	CONSTRAINT fk_Benevole_Compte FOREIGN KEY (idCompte) REFERENCES Compte(idCompte)
) Engine=InnoDB;

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
) Engine=InnoDB;

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
) Engine=InnoDB;


