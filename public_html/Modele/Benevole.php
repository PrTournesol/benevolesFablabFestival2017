<?php

/**
 * Created by PhpStorm.
 * User: Mael
 * Date: 09/02/2017
 * Time: 10:38
 */
class Benevole
{
    public $idBenevole;
    public $nom;
    public $prenom;
    public $mission;
    public $ville;
    public $competences;
    public $infoCompl;
    public $conventionSignee;
    public $charteSignee;
    public $langues;
    public $festival;
    public $chantier;
    public $idCompte;

    /**
     * Benevole constructor.
     * @param $idBenevole
     * @param $nom
     * @param $prenom
     * @param $mission
     * @param $ville
     * @param $competences
     * @param $infoCompl
     * @param $conventionSignee
     * @param $charteSignee
     * @param $langues
     * @param $festival
     * @param $chantier
     * @param $idCompte
     */
    public function __construct($idBenevole, $nom, $prenom, $mission, $ville, $competences, $infoCompl, $conventionSignee, $charteSignee, $langues, $festival, $chantier, $idCompte)
    {
        $this->idBenevole = $idBenevole;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mission = $mission;
        $this->ville = $ville;
        $this->competences = $competences;
        $this->infoCompl = $infoCompl;
        $this->conventionSignee = $conventionSignee;
        $this->charteSignee = $charteSignee;
        $this->langues = $langues;
        $this->festival = $festival;
        $this->chantier = $chantier;
        $this->idCompte = $idCompte;
    }


}