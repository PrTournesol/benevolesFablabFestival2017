<?php

/**
 * Created by PhpStorm.
 * User: Prepa
 * Date: 14/02/2017
 * Time: 00:39
 */

include_once ('Classe.php');
include_once ('Connect.inc.php');


class ModeleClasse
{
    public function getClasseFromId($idClasse){
        global $conn;
        try {
            $res = $conn->prepare("Select * from classe where idClasse = :pIdClasse ");
            $res->execute(array('pIdClasse' => $idClasse));
        }
        catch (PDOException $e){
            echo "Problème de consultation des données dans la base de données, détail de l'erreur : ".$e->getMessage()."<br>";
            die();
        }
        $cla = $res->fetch();
        $laClasse = new Classe(
                                $cla['idClasse'],
                                $cla['ecole'],
                                $cla['nbEleves'],
                                $cla['prenomProf'],
                                $cla['nomProf'],
                                $cla['idTournoi'],
                                $cla['idCompte']);
        return $laClasse;
    }

    public function getListeClasses()
    {
        global $conn;
        try {
            $res = $conn->prepare("Select * from classe");
            $res->execute();
        } catch (PDOException $e) {
            echo "Problème de colsultation des données dans la base de données, détail de l'erreur : " . $e->getMessage() . "<br>";
            die();
        }
        foreach ($res as $cla) {
            $ListeCla[] = new Classe(
                                        $cla['idClasse'],
                                        $cla['ecole'],
                                        $cla['nbEleves'],
                                        $cla['prenomProf'],
                                        $cla['nomProf'],
                                        $cla['idTournoi'],
                                        $cla['idCompte']);
        }
        return $ListeCla;
    }

    public function getClassesFromTournoi($idTournoi)
    {
        global $conn;
        try {
            $res = $conn->prepare("Select * from classe where idTournoi=:pIdTournoi");
            $res->execute(array('pIdTournoi'=>$idTournoi));
        } catch (PDOException $e) {
            echo "Problème de colsultation des données dans la base de données, détail de l'erreur : " . $e->getMessage() . "<br>";
            die();
        }
        foreach ($res as $cla) {
            $ListeCla[] = new Classe(
                $cla['idClasse'],
                $cla['ecole'],
                $cla['nbEleves'],
                $cla['prenomProf'],
                $cla['nomProf'],
                $cla['idTournoi'],
                $cla['idCompte']);
        }
        return $ListeCla;
    }

    public function getClasseFromCompte($idCompte)
    {
        global $conn;
        try {
            $res = $conn->prepare("Select * from classe where idCompte=:pIdCompte ");
            $res->execute(array('pIdCompte' => $idCompte));
        }
        catch (PDOException $e){
            echo "Problème de consultation des données dans la base de données, détail de l'erreur : ".$e->getMessage()."<br>";
            die();
        }
        $cla = $res->fetch();
        $laClasse = new Classe(
            $cla['idClasse'],
            $cla['ecole'],
            $cla['nbEleves'],
            $cla['prenomProf'],
            $cla['nomProf'],
            $cla['idTournoi'],
            $cla['idCompte']);
        return $laClasse;
    }

    public function setClasse($ecole, $prenomProf, $nomProf, $idTournoi, $idCompte){
        global $conn;
        try {
            $res = $conn->prepare("Insert into classe(ecole, prenomProf, nomProf, idTournoi, idCompte) values  (:pEcole,:pPrenomProf,:pNomProf,:pIdTournoi,:pIdCompte) ");
            $return = $res->execute(array('pEcole'=>$ecole,'pPrenomProf'=>$prenomProf,'pNomProf'=>$nomProf,'pIdTournoi'=>$idTournoi,'pIdCompte' => $idCompte));
            $return="Classe de l'école ".$ecole." ajoutée avec succès";

        }
        catch (PDOException $e){
            $return = "Problème de création de la classe, détail de l'erreur : <br>".$e->getMessage()."<br>";
        }
        return $return;
    }


}