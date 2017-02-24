<?php

/**
 * Created by PhpStorm.
 * User: Prepa
 * Date: 14/02/2017
 * Time: 00:38
 */
class Eleve
{
    public $idEleve;
    public $prenom;
    public $nom;
    public $groupe;
    public $idClasse;

    /**
     * Eleve constructor.
     * @param $idEleve
     * @param $prenom
     * @param $nom
     * @param $groupe
     * @param $idClasse
     */
    public function __construct($idEleve, $prenom, $nom, $groupe, $idClasse)
    {
        $this->idEleve = $idEleve;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->groupe = $groupe;
        $this->idClasse = $idClasse;
    }


}