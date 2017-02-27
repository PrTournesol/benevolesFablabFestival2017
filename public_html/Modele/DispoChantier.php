<?php

/**
 * Created by PhpStorm.
 * User: Mael
 * Date: 27/02/2017
 * Time: 11:35
 */
class DispoChantier
{
    public $idDispoChantier;
    public $date;
    public $matin;
    public $repasMidi;
    public $aprem;
    public $repasSoir;
    public $idBenevole;

    /**
     * DispoChantier constructor.
     * @param $idDispoChantier
     * @param $date
     * @param $matin
     * @param $repasMidi
     * @param $aprem
     * @param $repasSoir
     * @param $idBenevole
     */
    public function __construct($idDispoChantier, $date, $matin, $repasMidi, $aprem, $repasSoir, $idBenevole)
    {
        $this->idDispoChantier = $idDispoChantier;
        $this->date = $date;
        $this->matin = $matin;
        $this->repasMidi = $repasMidi;
        $this->aprem = $aprem;
        $this->repasSoir = $repasSoir;
        $this->idBenevole = $idBenevole;
    }


}