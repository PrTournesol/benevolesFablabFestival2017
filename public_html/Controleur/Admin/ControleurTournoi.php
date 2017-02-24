<?php

/**
 * Created by PhpStorm.
 * User: Prepa
 * Date: 14/02/2017
 * Time: 00:56
 */

include_once ('Modele/ModeleTournoi.php');


class ControleurTournoi
{
    private $trn;

    /**
     * ControleurTournoi constructor.
     * @param $trn
     */
    public function __construct()
    {
        $this->trn = new ModeleTournoi();
    }

    public function getTournoiFromId($idTournoi)
    {
        $vTournoi = $this->trn->getTournoiFromId($idTournoi);
        include ('Vue/Admin/VueTournoi.php');
    }

    /**
     * @return Tournoi
     */
    public function getListeTournois()
    {
        $vListeTournois = $this->trn->getListeTournois();
        include ('Vue/Admin/VueListeTournois.php');
    }



}




?>