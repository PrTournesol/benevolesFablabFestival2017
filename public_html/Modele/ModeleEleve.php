<?php

/**
 * Created by PhpStorm.
 * User: Prepa
 * Date: 14/02/2017
 * Time: 00:40
 */

include_once ('Eleve.php');
include_once ('Connect.inc.php');


class ModeleEleve
{

    public function getListeEleves(){
        global $conn;
        try {
            $res = $conn->prepare("Select * from eleve");
            $res->execute();
        }
        catch (PDOException $e){
            echo "Problème de consultation des données dans la base de données, détail de l'erreur : ".$e->getMessage()."<br>";
            die();
        }
        foreach ($res as $ele){
            $listeEle[] = new Eleve(
                                    $ele['idEleve'],
                                    $ele['prenom'],
                                    $ele['nom'],
                                    $ele['groupe'],
                                    $ele['idClasse']);
        }
        return $listeEle;
    }

    public function getEleve($idEleve){
        global $conn;
        try {
            $res = $conn->prepare("Select * from eleve where idEleve=:pIdEleve");
            $res->execute(array('pIdEleve' => $idEleve));
        }
        catch (PDOException $e){
            echo "Problème de consultation des données dans la base de données, détail de l'erreur : ".$e->getMessage()."<br>";
            die();
        }
        $cla = $res->fetch();
        $unEle = new Eleve(
            $cla['idEleve'],
            $cla['prenom'],
            $cla['nom'],
            $cla['groupe'],
            $cla['idClasse']);
        return $unEle;
    }

    public function getElevesFromClasse($idClasse)
    {
        global $conn;
        try {
            $res = $conn->prepare("Select * from eleve where idClasse=:pIdClasse");
            $res->execute(array('pIdClasse'=>$idClasse));
        }
        catch (PDOException $e){
            echo "Problème de consultation des données dans la base de données, détail de l'erreur : ".$e->getMessage()."<br>";
            die();
        }
        $listeEle=NULL;
        foreach ($res as $ele){
            $listeEle[] = new Eleve(
                $ele['idEleve'],
                $ele['prenom'],
                $ele['nom'],
                $ele['groupe'],
                $ele['idClasse']);
        }
        return $listeEle;
    }


}