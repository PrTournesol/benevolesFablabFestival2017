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
            $res = $conn->prepare("Select * from compte where idCompte = :pIdCompte");
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
                                $cpt['valide']);
        return $leCompte;
    }

    public function getCompteFromIdPhp($idPhp){
        global $conn;
        try {
            $res = $conn->prepare("Select * from compte where idPhp = :pIdPhp");
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
            $cpt['valide']);
        return $leCompte;
    }

    public function getCompteFromPseudo($pseudo){
        global $conn;
        try {
            $res = $conn->prepare("Select * from compte where pseudo = :pPseudo");
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
            $cpt['valide']);
        return $leCompte;
    }

    public function getListeComptes(){
        global $conn;
        try {
            $res = $conn->prepare("Select * from compte");
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
                $cpt['valide']);
        }
        return $ListeCpts;
    }

    public function majDateConnexion($pseudo,$idPhp ){
        global $conn;
        try {
            $res = $conn->prepare("update compte set idPhp=:pUid,dateDerCo=NOW() where pseudo=:pPseudo");
            $res->execute(array('pPseudo' => $pseudo, 'pUid'=>$idPhp));
        }
        catch (PDOException $e){
            echo "Problème de consultation des données dans la base de données, détail de l'erreur : ".$e->getMessage()."<br>";
            die();
        }
    }

    public function newCompte($pseudo, $mail, $valide){
        if ($this->getCompteFromPseudo($pseudo)!=null)
            return "Ce pseudo existe déjà, veuillez en choisir un autre";
        global $conn;
        try {
            $res = $conn->prepare("Insert into compte(pseudo,mail,valide) values  (:pPseudo,:pMail,:pValide)");
            $return = $res->execute(array('pPseudo'=>$pseudo,'pMail'=>$mail,'pMail'=>$mail,'pValide'=>$valide));
            $return="Compte avec le pseudo ".$pseudo." crée avec succès";

        }
        catch (PDOException $e){
            $return = "Problème de création du compte, détail de l'erreur : <br>".$e->getMessage()."<br>";
        }
        return $return;
    }

    public function activCompte($pseudo, $mail, $hashMdp,$idPhp){
        global $conn;
        try {
            $res = $conn->prepare("Insert into compte(pseudo,mail,hashMdp,idPhp,dateInsc) values  (:pPseudo,:pMail,:pHash,:pIdPhp, now())");
            $return = $res->execute(array('pPseudo'=>$pseudo,'pMail'=>$mail,'pMail'=>$mail,'pHash'=>$hashMdp,'pIdPhp'=>$idPhp));
            $return="Le compte avec le pseudo ".$pseudo." a été crée avec succès";

        }
        catch (PDOException $e){
            $return = "Problème de création du compte, détail de l'erreur : <br>".$e->getMessage()."<br>";
        }
        return $return;
    }


}