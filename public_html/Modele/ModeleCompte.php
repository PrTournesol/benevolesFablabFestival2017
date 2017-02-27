<?php

/**
 * Created by PhpStorm.
 * User: Mael
 * Date: 09/02/2017
 * Time: 10:38
 */

include_once ('Compte.php');
include_once ('Connect.inc.php');

class ModeleCompte
{

    public function getCompteFromId($idCompte){
        global $conn;
        try {
            $res = $conn->prepare("Select * from Compte where idCompte = :pIdCompte");
            $res->execute(array('pIdCompte' => $idCompte));
        }
        catch (PDOException $e){
            echo "Problème de consultation des données dans la base de données, détail de l'erreur : ".$e->getMessage()."<br>";
            die();
        }
        $cpt = $res->fetch();
        $leCompte = new Compte(
                                $cpt['idCompte'],
                                $cpt['pseudo'],
                                $cpt['mail'],
                                $cpt['hashMdp'],
                                $cpt['dateDerCo'],
                                $cpt['typeCompte'],
                                $cpt['dateInsc'],
                                $cpt['idPhp'],
                                $cpt['valide'],
                                $cpt['idBenevole']);
        return $leCompte;
    }

    public function getCompteFromIdPhp($idPhp){
        global $conn;
        try {
            $res = $conn->prepare("Select * from Compte where idPhp = :pIdPhp");
            $res->execute(array('pIdPhp' => $idPhp));
        }
        catch (PDOException $e){
            echo "Erreur dans la base de données, détail : ".$e->getMessage()."<br>";
            die();
        }
        $cpt = $res->fetch();
        if ($cpt['idCompte']==null)
            return null;
        $leCompte = new Compte(
            $cpt['idCompte'],
            $cpt['pseudo'],
            $cpt['mail'],
            $cpt['hashMdp'],
            $cpt['dateDerCo'],
            $cpt['typeCompte'],
            $cpt['dateInsc'],
            $cpt['idPhp'],
            $cpt['valide'],
            $cpt['idBenevole']);
        return $leCompte;
    }

    public function getCompteFromPseudo($pseudo){
        global $conn;
        try {
            $res = $conn->prepare("Select * from Compte where pseudo = :pPseudo");
            $res->execute(array('pPseudo' => $pseudo));
        }
        catch (PDOException $e){
            echo "Problème de colsultation des données dans la base de données, détail de l'erreur : ".$e->getMessage()."<br>";
            die();
        }
        $cpt = $res->fetch();
        if ($cpt['idCompte']==null)
            return null;
        $leCompte = new Compte(
            $cpt['idCompte'],
            $cpt['pseudo'],
            $cpt['mail'],
            $cpt['hashMdp'],
            $cpt['dateDerCo'],
            $cpt['typeCompte'],
            $cpt['dateInsc'],
            $cpt['idPhp'],
            $cpt['valide'],
            $cpt['idBenevole']);
        return $leCompte;
    }

    public function getListeComptes(){
        global $conn;
        try {
            $res = $conn->prepare("Select * from Compte");
            $res->execute();
        }
        catch (PDOException $e){
        echo "Problème de colsultation des données dans la base de données, détail de l'erreur : ".$e->getMessage()."<br>";
        die();
        }
        foreach($res as $cpt) {
            $ListeCpts[] = new Compte(
                $cpt['idCompte'],
                $cpt['pseudo'],
                $cpt['mail'],
                $cpt['hashMdp'],
                $cpt['dateDerCo'],
                $cpt['typeCompte'],
                $cpt['dateInsc'],
                $cpt['idPhp'],
                $cpt['valide'],
                $cpt['idBenevole']);
        }
        return $ListeCpts;
    }

    public function majDateConnexion($pseudo,$idPhp ){
        global $conn;
        try {
            $res = $conn->prepare("update Compte set idPhp=:pUid,dateDerCo=NOW() where pseudo=:pPseudo");
            $res->execute(array('pPseudo' => $pseudo, 'pUid'=>$idPhp));
        }
        catch (PDOException $e){
            echo "Problème de consultation des données dans la base de données, détail de l'erreur : ".$e->getMessage()."<br>";
            die();
        }
    }

    public function newCompte($pseudo, $mail, $valide,$idPhp){
        if ($this->getCompteFromPseudo($pseudo)!=null)
            return "Ce pseudo existe déjà, veuillez en choisir un autre";
        global $conn;
        try {
            $res = $conn->prepare("Insert into Compte(pseudo,mail,valide,idPhp) values  (:pPseudo,:pMail,:pValide,:pIdPhp)");
            $res->execute(array('pPseudo'=>$pseudo,'pMail'=>$mail,'pMail'=>$mail,'pValide'=>$valide,'pIdPhp'=>$idPhp));
            $return="Compte avec le pseudo ".$pseudo." crée avec succès";

        }
        catch (PDOException $e){
            $return = "Problème de création du Compte, détail de l'erreur : <br>".$e->getMessage()."<br>";
        }
        return $return;
    }

    public function activCompte($pseudo, $mail, $hashMdp,$idPhp){
        global $conn;
        try {
            $res = $conn->prepare("Insert into Compte(pseudo,mail,hashMdp,idPhp,dateInsc) values  (:pPseudo,:pMail,:pHash,:pIdPhp, now())");
            $res->execute(array('pPseudo'=>$pseudo,'pMail'=>$mail,'pMail'=>$mail,'pHash'=>$hashMdp,'pIdPhp'=>$idPhp));
            $return="Le Compte avec le pseudo ".$pseudo." a été crée avec succès";

        }
        catch (PDOException $e){
            $return = "Problème de création du Compte, détail de l'erreur : <br>".$e->getMessage()."<br>";
        }
        return $return;
    }

    public function updateCompte($compte){
        global $conn;
        try {
            if ($compte->idBenevole!='')
            {
                $res = $conn->prepare("UPDATE `Compte` SET `pseudo`= :pPseudo, `mail`=:pMail, `typeCompte` = :pType, `valide` = :pValide, `idBenevole`= :pIdBenevole WHERE `idCompte` = :pIdCompte");
                $res->execute(array('pPseudo'=>$compte->pseudo,'pMail'=>$compte->mail, 'pType'=>$compte->typeCompte,'pValide'=>$compte->valide, 'pIdBenevole'=>$compte->idBenevole,'pIdCompte'=>$compte->idCompte));

            }
            else {
                $res = $conn->prepare("UPDATE `Compte` SET `pseudo`= :pPseudo, `mail`=:pMail, `typeCompte` = :pType, `valide` = :pValide WHERE `idCompte` = :pIdCompte");
                $res->execute(array('pPseudo'=>$compte->pseudo,'pMail'=>$compte->mail, 'pType'=>$compte->typeCompte,'pValide'=>$compte->valide, 'pIdCompte'=>$compte->idCompte));
            }
            $return="Le Compte avec le pseudo ".$compte->pseudo." a été modifié avec succès";

        }
        catch (PDOException $e){
            $return = "Problème de modification du Compte, détail de l'erreur : <br>".$e->getMessage()."<br>";
        }
        return $return;


    }


}