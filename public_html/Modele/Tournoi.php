<?php

/**
 * Created by PhpStorm.
 * User: Prepa
 * Date: 14/02/2017
 * Time: 00:37
 */
class Tournoi
{
    public $idTournoi;
    public $date;
    public $lieu;
    public $nbClasses;
    public $infoCompl;
    public $nbTables;
    public $nbRondes;

    /**
     * Tournoi constructor.
     * @param $idTournoi
     * @param $date
     * @param $lieu
     * @param $nbClasses
     * @param $infoCompl
     * @param $nbTables
     * @param $nbRondes
     */
    public function __construct($idTournoi, $date, $lieu, $nbClasses, $infoCompl, $nbTables, $nbRondes)
    {
        $this->idTournoi = $idTournoi;
        $this->date = $date;
        $this->lieu = $lieu;
        $this->nbClasses = $nbClasses;
        $this->infoCompl = $infoCompl;
        $this->nbTables = $nbTables;
        $this->nbRondes = $nbRondes;
    }


}