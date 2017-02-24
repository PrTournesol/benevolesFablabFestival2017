<?php

/**
 * Created by PhpStorm.
 * User: Prepa
 * Date: 14/02/2017
 * Time: 00:39
 */

include_once ('Tournoi.php');
include_once ('Connect.inc.php');

class ModeleTournoi
{
    public function getTournoiFromId($idTournoi){
        global $conn;
        try {
            $res = $conn->prepare("Select * from tournoi where idTournoi = :pIdTournoi ");
            $res->execute(array('pIdTournoi' => $idTournoi));
        }
        catch (PDOException $e){
            echo "Problème de consultation des données dans la base de données, détail de l'erreur : ".$e->getMessage()."<br>";
            die();
        }
        $trn = $res->fetch();
        $leTournoi = new Tournoi(
                                $trn['idTournoi'],
                                $trn['date'],
                                $trn['lieu'],
                                $trn['nbClasses'],
                                $trn['infoCompl'],
                                $trn['nbTables'],
                                $trn['nbRondes']);
        return $leTournoi;
    }

    public function getDernierTournoi(){
        global $conn;
        try {
            $res = $conn->prepare("select * from tournoi WHERE date = (select max(date) FROM tournoi);");
            $res->execute();
        }
        catch (PDOException $e){
            echo "Problème de consultation des données dans la base de données, détail de l'erreur : ".$e->getMessage()."<br>";
            die();
        }
        $trn = $res->fetch();
        $leTournoi = new Tournoi(
            $trn['idTournoi'],
            $trn['date'],
            $trn['lieu'],
            $trn['nbClasses'],
            $trn['infoCompl'],
            $trn['nbTables'],
            $trn['nbRondes']);
        return $leTournoi;
    }

    public function getListeTournois()
    {
        global $conn;
        try {
            $res = $conn->prepare("Select * from tournoi order by date desc");
            $res->execute();
        } catch (PDOException $e) {
            echo "Problème de colsultation des données dans la base de données, détail de l'erreur : " . $e->getMessage() . "<br>";
            die();
        }
        foreach ($res as $trn) {
            $ListeTrns[] = new Tournoi(
                $trn['idTournoi'],
                $trn['date'],
                $trn['lieu'],
                $trn['nbClasses'],
                $trn['infoCompl'],
                $trn['nbTables'],
                $trn['nbRondes']);
        }
        return $ListeTrns;
    }




}