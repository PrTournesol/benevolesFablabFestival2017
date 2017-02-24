<?php

/**
 * Created by PhpStorm.
 * User: Prepa
 * Date: 14/02/2017
 * Time: 00:05
 */

include_once ('Modele/ModeleCompte.php');

class ControleurCompte
{

    private $cpt;

    /**
     * ControlleurCompte constructor.
     */
    public function __construct()
    {
        $this->cpt = new ModeleCompte();
    }


    public function getListeComptes(){
        $vListeComptes= $this->cpt->getListeComptes();
        include 'Vue/Admin/VueListeComptes.php';
    }

    public function getCompteFromId($idCompte){
        $vCompte= $this->cpt->getCompteFromId($idCompte);
        include 'Vue/Admin/VueCompte.php';
    }

    public function createCompte()
    {
        if (isset($_POST['pseudo'])){
            $pseudo=htmlspecialchars($_POST['pseudo']);
            $mail=htmlspecialchars($_POST['mail']);
            $valide=htmlspecialchars($_POST['valide']);
            $message = $this->cpt->newCompte($pseudo,$mail,$valide);
            // Vérification, à commenter TODO
            $message = $message.' pseudo : '.$pseudo.' ;mail : '.$mail.' ; valdie : '.$valide;

        }
        include 'Vue/Admin/VueCreerCompte.php';
    }


}

?>