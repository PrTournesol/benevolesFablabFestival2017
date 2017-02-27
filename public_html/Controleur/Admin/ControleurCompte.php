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
            $message = $this->cpt->newCompte($pseudo,$mail,$valide,uniqid());
            // Vérification, à commenter TODO
            $message = $message.' pseudo : '.$pseudo.' ;mail : '.$mail.' ; validé ? : '.$valide;

        }
        include 'Vue/Admin/VueCreerCompte.php';
    }

    public function updateCompte($idCompte){
        if (isset($_POST['pseudo'])){
            $pseudo=htmlspecialchars($_POST['pseudo']);
            $mail=htmlspecialchars($_POST['mail']);
            $valide=htmlspecialchars($_POST['valide']);
            $idBenevole=htmlspecialchars($_POST['idBene']);
            $type=htmlspecialchars($_POST['type']);
            $compte=new Compte($idCompte,$pseudo,$mail,'','',$type,'','',$valide,$idBenevole);
            $message = $this->cpt->updateCompte($compte);
        }
        $vCompte= $this->cpt->getCompteFromId($idCompte);
        include 'Vue/Admin/VueModifierCompte.php';
    }

    public function deleteCompte($idCompte){
       $this->cpt->deleteCompte($idCompte);
       header ('Location:index.php?entite=compte&action=R');
    }


}

?>