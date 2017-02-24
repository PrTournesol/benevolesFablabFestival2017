<?php

/**
 * Created by PhpStorm.
 * User: Prepa
 * Date: 14/02/2017
 * Time: 00:56
 */

include_once ('Modele/ModeleEleve.php');


class ControleurEleve
{
    private $ele;

    /**
     * ControleurTournoi constructor.
     * @param $trn
     */
    public function __construct()
    {
        $this->ele = new ModeleEleve();
    }

    /**
     * @return Tournoi
     */
    public function getListeEleves()
    {
        $vListeEleves = $this->ele->getListeEleves();
        include ('Vue/Admin/VueListeEleves.php');
    }

    public function getElevesFromClasse($idClasse)
    {
        $vListeEleves = $this->ele->getElevesFromClasse($idClasse);
        include ('Vue/Admin/VueListeEleves.php');
    }

    public function getEleve($idEleve){
        $vEleve = $this->ele->getEleve($idEleve);
        include ('Vue/VueEleve.php');
    }



}




?>