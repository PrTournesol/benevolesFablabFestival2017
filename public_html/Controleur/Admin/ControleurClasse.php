<?php

/**
 * Created by PhpStorm.
 * User: Prepa
 * Date: 14/02/2017
 * Time: 00:56
 */

include_once ('Modele/ModeleClasse.php');
include_once ('Modele/ModeleCompte.php');
include_once ('Modele/ModeleTournoi.php');

class ControleurClasse
{
    private $cla;
    private $cpt;
    private $trn;


    /**
     * ControleurTournoi constructor.
     * @param $trn
     */
    public function __construct()
    {
        $this->cla = new ModeleClasse();
        $this->cpt = new ModeleCompte();
        $this->trn = new ModeleTournoi();
    }

    /**
     * @return Tournoi
     */
    public function getListeClasses()
    {
        $vListeClasses = $this->cla->getListeClasses();
        include ('Vue/Admin/VueListeClasses.php');
    }

    public function getClasse($idClasse)
    {
        $vClasse = $this->cla->getClasseFromId($idClasse);
        include ('Vue/VueClasse.php');
    }

    public function getClassesFromTournoi($idTournoi)
    {
        $vListeClasses = $this->cla->getClassesFromTournoi($idTournoi);
        include ('Vue/Admin/VueListeClasses.php');
    }

    public function getClasseFromCompte($idCompte)
    {
        $vClasse = $this->cla->getClasseFromCompte($idCompte);
        include ('Vue/VueClasse.php');
    }

    public function createClasse()
    {
        if (isset($_POST['ecole'])){
            $ecole=htmlspecialchars($_POST['ecole']);
            $prenomProf=htmlspecialchars($_POST['prenomProf']);
            $nomProf=htmlspecialchars($_POST['nomProf']);
            $idTournoi=htmlspecialchars($_POST['idTournoi']);
            $idCompte=htmlspecialchars($_POST['idCompte']);
            $message = $this->cla->setClasse($ecole,$prenomProf,$nomProf,$idTournoi,$idCompte);
        }
        $vListeTournois = $this->trn->getListeTournois();
        $vListeComptes= $this->cpt->getListeComptes();
        include ('Vue/Admin/VueCreerClasse.php');
    }

}




?>