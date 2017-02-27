<?php

/**
 * Created by PhpStorm.
 * User: Mael
 * Date: 09/02/2017
 * Time: 10:38
 */
class Compte
{
    public $idCompte;
    public $pseudo;
    public $mail;
    public $hashMdp;
    public $dateDerCo;
    public $typeCompte;
    public $dateInsc;
    public $idPhp;
    public $valide;
    public $idBenevole;

    /**
     * Compte constructor.
     * @param $idCompte
     * @param $pseudo
     * @param $mail
     * @param $hashMdp
     * @param $dateDerCo
     * @param $typeCompte
     * @param $dateInsc
     * @param $idPhp
     * @param $valide
     * @param $idBenevole
     */
    public function __construct($idCompte, $pseudo, $mail, $hashMdp, $dateDerCo, $typeCompte, $dateInsc, $idPhp, $valide, $idBenevole)
    {
        $this->idCompte = $idCompte;
        $this->pseudo = $pseudo;
        $this->mail = $mail;
        $this->hashMdp = $hashMdp;
        $this->dateDerCo = $dateDerCo;
        $this->typeCompte = $typeCompte;
        $this->dateInsc = $dateInsc;
        $this->idPhp = $idPhp;
        $this->valide = $valide;
        $this->idBenevole = $idBenevole;
    }

}