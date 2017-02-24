<?php

/**
 * Created by PhpStorm.
 * User: Prepa
 * Date: 14/02/2017
 * Time: 00:34
 */
class Classe
{
    public $idClasse;
    public $ecole;
    public $nbEleves;
    public $prenomProf;
    public $nomProf;
    public $idTournoi;
    public $idCompte;

    /**
     * Classe constructor.
     * @param $idClasse
     * @param $ecole
     * @param $nbEleves
     * @param $prenomProf
     * @param $nomProf
     * @param $idTournoi
     * @param $idCompte
     */
    public function __construct($idClasse, $ecole, $nbEleves, $prenomProf, $nomProf, $idTournoi, $idCompte)
    {
        $this->idClasse = $idClasse;
        $this->ecole = $ecole;
        $this->nbEleves = $nbEleves;
        $this->prenomProf = $prenomProf;
        $this->nomProf = $nomProf;
        $this->idTournoi = $idTournoi;
        $this->idCompte = $idCompte;
    }


}