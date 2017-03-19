<?php

/**
 * Created by PhpStorm.
 * User: Mael
 * Date: 27/02/2017
 * Time: 11:45
 */
include_once ('Connect.inc.php');
include_once ('DispoChantier.php');

class ModeleDispoChantier
{
    public function getDispoChantierFromId($idDispoChantier)
    {
        global $conn;
        try {
            $res = $conn->prepare("Select * from DispoChantier where idDispoChantier = :pIdDispo");
            $res->execute(array('pIdDispo' => $idDispoChantier));
        } catch (PDOException $e) {
            echo "Problème de consultation des données dans la base de données, détail de l'erreur : " . $e->getMessage() . "<br>";
            die();
        }
        $cpt = $res->fetch();
        $dispoChantier = new DispoChantier(
            $cpt['idDispoChantier'],
            $cpt['date'],
            $cpt['matin'],
            $cpt['repasMidi'],
            $cpt['aprem'],
            $cpt['repasSoir'],
            $cpt['idBenevole']);
        return $dispoChantier;
    }

    public function getDisposChantier()
    {
        global $conn;
        try {
            $res = $conn->prepare("Select * from DispoChantier");
            $res->execute();
        } catch (PDOException $e) {
            echo "Problème de consultation des données dans la base de données, détail de l'erreur : " . $e->getMessage() . "<br>";
            die();
        }
        $cpt = $res->fetch();
        $dispoChantier = new DispoChantier(
            $cpt['idDispoChantier'],
            $cpt['date'],
            $cpt['matin'],
            $cpt['repasMidi'],
            $cpt['aprem'],
            $cpt['repasSoir'],
            $cpt['idBenevole']);
        return $dispoChantier;
    }

    public function getDisposChantierFromBenevole($idBenevole)
    {
        global $conn;
        try {
            $res = $conn->prepare("Select * from DispoChantier where idBenevole = :pIdBene");
            $res->execute(array('pIdBene' => $idBenevole));
        } catch (PDOException $e) {
            echo "Problème de consultation des données dans la base de données, détail de l'erreur : " . $e->getMessage() . "<br>";
            die();
        }
        $ListeDispoChantier=null;
        foreach ($res as $cpt) {
            $ListeDispoChantier[] = new DispoChantier(
                $cpt['idDispoChantier'],
                $cpt['date'],
                $cpt['matin'],
                $cpt['repasMidi'],
                $cpt['aprem'],
                $cpt['repasSoir'],
                $cpt['idBenevole']);
        }
        return $ListeDispoChantier;
    }

    public function getDisposChantierFromBenevoleAndDate($idBenevole,$date)
    {
        global $conn;
        try {
            $res = $conn->prepare("Select * from DispoChantier where idBenevole = :pIdBene and date= :pDate");
            $res->execute(array('pIdBene' => $idBenevole, 'pDate'=>$date));
        } catch (PDOException $e) {
            echo "Problème de consultation des données dans la base de données, détail de l'erreur : " . $e->getMessage() . "<br>";
            die();
        }
        $ListeDispoChantier=null;
        foreach ($res as $cpt) {
            $ListeDispoChantier[] = new DispoChantier(
                $cpt['idDispoChantier'],
                $cpt['date'],
                $cpt['matin'],
                $cpt['repasMidi'],
                $cpt['aprem'],
                $cpt['repasSoir'],
                $cpt['idBenevole']);
        }
        return $ListeDispoChantier;
    }

    public function countDisposChantierFromDate($date)
    {
        global $conn;
        try {
            $res = $conn->prepare("Select sum(matin) as matin, sum(repasMidi) as midi , sum(aprem) as aprem, sum(repasSoir) as soir from DispoChantier where date= :pDate");
            $res->execute(array('pDate'=>$date));
        } catch (PDOException $e) {
            echo "Problème de consultation des données dans la base de données, détail de l'erreur : " . $e->getMessage() . "<br>";
            die();
        }
        $cpt = $res->fetch();
        $dispoChantier = new DispoChantier(
                null,
                $date,
                $cpt['matin'],
                $cpt['midi'],
                $cpt['aprem'],
                $cpt['soir'],
                null);
        return $dispoChantier;
    }

    public function getDates()
    {
        global $conn;
        try {
            $res = $conn->prepare("Select distinct `date` from DispoChantier where date>=now() ORDER BY date asc");
            $res->execute();
        } catch (PDOException $e) {
            echo "Problème de consultation des données dans la base de données, détail de l'erreur : " . $e->getMessage() . "<br>";
            die();
        }
        $dates=null;
        foreach ($res as $dat) {
            $dates[] = $dat;
        }
        return $dates;
    }

    public function getDisposChantierFromDate($date)
    {
        global $conn;
        try {
            $res = $conn->prepare("Select * from DispoChantier where date= :pDate");
            $res->execute(array('pDate'=>$date));
        } catch (PDOException $e) {
            echo "Problème de consultation des données dans la base de données, détail de l'erreur : " . $e->getMessage() . "<br>";
            die();
        }
        $ListeDispoChantier=null;
        foreach ($res as $cpt) {
            $ListeDispoChantier[] = new DispoChantier(
                $cpt['idDispoChantier'],
                $cpt['date'],
                $cpt['matin'],
                $cpt['repasMidi'],
                $cpt['aprem'],
                $cpt['repasSoir'],
                $cpt['idBenevole']);
        }
        return $ListeDispoChantier;
    }

    public function newDispoChantier($dispoChantier){
        global $conn;
        try {
            $res = $conn->prepare("INSERT INTO DispoChantier (date, matin, repasMidi, aprem, repasSoir, idBenevole) VALUES (:pDate, :pMatin, :pMidi, :pAprem, :pSoir, :pIdBenevole);");
            $res->execute(array(':pDate' => $dispoChantier->date, ':pMatin' => $dispoChantier->matin, ':pMidi' => $dispoChantier->repasMidi, ':pAprem' => $dispoChantier->aprem, ':pSoir' => $dispoChantier->repasSoir, ':pIdBenevole' => $dispoChantier->idBenevole));
            $return="Dispo du ".$dispoChantier->date." ajoutée avec succès";

        }
        catch (PDOException $e){
            $return = "Problème d'enregistrement de a disponibilité, détail de l'erreur : <br>".$e->getMessage()."<br>";
        }
        return $return;
    }

}