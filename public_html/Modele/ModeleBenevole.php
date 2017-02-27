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
            $res = $conn->prepare("Select * from Benevole where idBenevole = :pIdBenevole");
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
                                $cpt['chantier']);
        return $leBenevole;
    }

    public function getBenevoleFromNom($nom){
        global $conn;
        try {
            $res = $conn->prepare("Select * from Benevole where nom = :pNom");
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
            $cpt['chantier']);
        return $leBenevole;
    }

    public function getListeBenevoles(){
        global $conn;
        try {
            $res = $conn->prepare("Select * from Benevole");
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
                $cpt['chantier']);
        }
        return $ListeCpts;
    }


    public function newBenevole($benevole){
        global $conn;
        try {
            $res = $conn->prepare("INSERT INTO soulie_benevoles.benevole (nom, prenom, mission, ville, competences, infoCompl, conventionSignee, charteSignee, langues, festival, chantier) VALUES (:pNom,:pPrenom,:pMission,:pVille,:pCompetences,:pInfo,:pConv,:pCharte,:pLangues,:pFestival,:pChantier)");
            $res->execute(array(':pNom'=>$benevole->nom,':pPrenom'=>$benevole->prenom,':pMission'=>$benevole->mission,':pVille'=>$benevole->ville,':pCompetences'=>$benevole->competences,':pInfo'=>$benevole->infoCompl,':pConv'=>$benevole->conventionSignee,':pCharte'=>$benevole->charteSignee,':pLangues'=>$benevole->langues,':pFestival'=>$benevole->festival,':pChantier'=>$benevole->chantier));
            $return="Benevole  ".$benevole->prenom." ".$benevole->nom." crée avec succès";

        }
        catch (PDOException $e){
            $return = "Problème de création du Benevole, détail de l'erreur : <br>".$e->getMessage()."<br>";
        }
        return $return;
    }


    public function updateBenevole($compte){
        global $conn;
        try {
            if ($compte->idBenevole!='')
            {
                $res = $conn->prepare("UPDATE `Benevole` SET `nom`= :pNom, `prenom`=:pMail, `competences` = :pType, `charteSignee` = :pValide, `idBenevole`= :pIdBenevole WHERE `idBenevole` = :pIdBenevole");
                $res->execute(array('pNom'=>$compte->nom,'pMail'=>$compte->prenom, 'pType'=>$compte->competences,'pValide'=>$compte->charteSignee, 'pIdBenevole'=>$compte->idBenevole,'pIdBenevole'=>$compte->idBenevole));

            }
            else {
                $res = $conn->prepare("UPDATE `Benevole` SET `nom`= :pNom, `prenom`=:pMail, `competences` = :pType, `charteSignee` = :pValide WHERE `idBenevole` = :pIdBenevole");
                $res->execute(array('pNom'=>$compte->nom,'pMail'=>$compte->prenom, 'pType'=>$compte->competences,'pValide'=>$compte->charteSignee, 'pIdBenevole'=>$compte->idBenevole));
            }
            $return="Le Benevole avec le nom ".$compte->nom." a été modifié avec succès";

        }
        catch (PDOException $e){
            $return = "Problème de modification du Benevole, détail de l'erreur : <br>".$e->getMessage()."<br>";
        }
        return $return;


    }


}