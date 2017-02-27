<?php

/**
 * Created by PhpStorm.
 * User: Mael
 * Date: 09/02/2017
 * Time: 10:38
 */

include_once ('Benevole.php');
include_once ('Connect.inc.php');

class ModeleBenevole
{

    public function getBenevoleFromId($idBenevole){
        global $conn;
        try {
            $res = $conn->prepare("Select * from Compte,Benevole where Benevole.idBenevole = :pIdBenevole and Compte.idBenevole=Benevole.idBenevole");
            $res->execute(array('pIdBenevole' => $idBenevole));
        }
        catch (PDOException $e){
            echo "Problème de consultation des données dans la base de données, détail de l'erreur : ".$e->getMessage()."<br>";
            die();
        }
        $cpt = $res->fetch();
        $leBenevole = new Benevole(
                                $cpt['idBenevole'],
                                $cpt['nom'],
                                $cpt['prenom'],
                                $cpt['mission'],
                                $cpt['ville'],
                                $cpt['competences'],
                                $cpt['infoCompl'],
                                $cpt['conventionSignee'],
                                $cpt['charteSignee'],
                                $cpt['langues'],
                                $cpt['festival'],
                                $cpt['chantier'],
                                $cpt['idCompte']);
        return $leBenevole;
    }

    public function getBenevoleFromNom($nom){
        global $conn;
        try {
            $res = $conn->prepare("Select * from Compte, Benevole where nom = :pNom and Compte.idBenevole=Benevole.idBenevole");
            $res->execute(array('pNom' => $nom));
        }
        catch (PDOException $e){
            echo "Problème de colsultation des données dans la base de données, détail de l'erreur : ".$e->getMessage()."<br>";
            die();
        }
        $cpt = $res->fetch();
        if ($cpt['idBenevole']==null)
            return null;
        $leBenevole = new Benevole(
            $cpt['idBenevole'],
            $cpt['nom'],
            $cpt['prenom'],
            $cpt['mission'],
            $cpt['ville'],
            $cpt['competences'],
            $cpt['infoCompl'],
            $cpt['conventionSignee'],
            $cpt['charteSignee'],
            $cpt['langues'],
            $cpt['festival'],
            $cpt['chantier'],
            $cpt['idCompte']);
        return $leBenevole;
    }

    public function getListeBenevoles(){
        global $conn;
        try {
            $res = $conn->prepare("Select * from Compte, Benevole where Compte.idBenevole=Benevole.idBenevole");
            $res->execute();
        }
        catch (PDOException $e){
        echo "Problème de colsultation des données dans la base de données, détail de l'erreur : ".$e->getMessage()."<br>";
        die();
        }
        foreach($res as $cpt) {
            $ListeCpts[] = new Benevole(
                $cpt['idBenevole'],
                $cpt['nom'],
                $cpt['prenom'],
                $cpt['mission'],
                $cpt['ville'],
                $cpt['competences'],
                $cpt['infoCompl'],
                $cpt['conventionSignee'],
                $cpt['charteSignee'],
                $cpt['langues'],
                $cpt['festival'],
                $cpt['chantier'],
                $cpt['idCompte']);
        }
        return $ListeCpts;
    }


    public function newBenevole($benevole){
        global $conn;
        try {
            $res = $conn->prepare("INSERT INTO Benevole (nom, prenom, mission, ville, competences, infoCompl, conventionSignee, charteSignee, langues, festival, chantier) VALUES (:pNom,:pPrenom,:pMission,:pVille,:pCompetences,:pInfo,:pConv,:pCharte,:pLangues,:pFestival,:pChantier)");
            $res->execute(array(':pNom'=>$benevole->nom,':pPrenom'=>$benevole->prenom,':pMission'=>$benevole->mission,':pVille'=>$benevole->ville,':pCompetences'=>$benevole->competences,':pInfo'=>$benevole->infoCompl,':pConv'=>$benevole->conventionSignee,':pCharte'=>$benevole->charteSignee,':pLangues'=>$benevole->langues,':pFestival'=>$benevole->festival,':pChantier'=>$benevole->chantier));
            $return="Benevole  ".$benevole->prenom." ".$benevole->nom." crée avec succès";

        }
        catch (PDOException $e){
            $return = "Problème de création du Benevole, détail de l'erreur : <br>".$e->getMessage()."<br>";
        }
        return $return;
    }


    public function updateBenevole($benevole){
        global $conn;
        try {
            $res = $conn->prepare("UPDATE `Benevole` SET `nom`= :pNom, `prenom`=:pPrenom, `mission` = :pMission, `ville` = :pVille, `competences`= :pCompetences, `infoCompl`=:pInfo, `conventionSignee`=:pConv, `charteSignee`=:pCharte, `langues`=:pLangues,`festival`=:pFestival, `chantier`=:pChantier WHERE `idBenevole` = :pIdBenevole");
            $res->execute(array('pIdBenevole'=>$benevole->idBenevole, 'pNom'=>$benevole->nom,'pPrenom'=>$benevole->prenom, 'pMission'=>$benevole->mission,'pVille'=>$benevole->ville,'pCompetences'=>$benevole->competences,'pInfo'=>$benevole->infoCompl,'pConv'=>$benevole->conventionSignee,'pCharte'=>$benevole->charteSignee,'pLangues'=>$benevole->langues,'pFestival'=>$benevole->festival,'pChantier'=>$benevole->chantier));
            $return="Le Benevole avec le nom ".$benevole->nom." a été modifié avec succès";
        }
        catch (PDOException $e){
            $return = "Problème de modification du Benevole, détail de l'erreur : <br>".$e->getMessage()."<br>";
        }
        return $return;
    }

    public function deleteBenevole($idBenevole){
        global $conn;
        try {
            $res = $conn->prepare("Delete from Benevole where idBenevole = :pIdBenevole");
            $res->execute(array('pIdBenevole' => $idBenevole));
        }
        catch (PDOException $e){
            echo "Problème de suppresion du compte dans la base de données, détail de l'erreur : ".$e->getMessage()."<br>";
            die();
        }
    }


}