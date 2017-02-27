<?php

/**
 * Created by PhpStorm.
 * User: Prepa
 * Date: 14/02/2017
 * Time: 00:05
 */

include_once ('Modele/ModeleBenevole.php');

class ControleurBenevole
{

    private $cpt;

    /**
     * ControlleurBenevole constructor.
     */
    public function __construct()
    {
        $this->cpt = new ModeleBenevole();
    }


    public function getListeBenevoles(){
        $vListeBenevoles= $this->cpt->getListeBenevoles();
        include 'Vue/Admin/VueListeBenevoles.php';
    }

    public function getBenevoleFromId($idBenevole){
        $vBenevole= $this->cpt->getBenevoleFromId($idBenevole);
        include 'Vue/Admin/VueBenevole.php';
    }

    public function createBenevole()
    {
        if (isset($_POST['nom'])){
            $nom=htmlspecialchars($_POST['nom']);
            $prenom=htmlspecialchars($_POST['prenom']);
            $mission=htmlspecialchars($_POST['mission']);
            $ville=htmlspecialchars($_POST['ville']);
            $competences=htmlspecialchars($_POST['competences']);
            $infoCompl=htmlspecialchars($_POST['infoCompl']);

            if (isset($_POST['conv']))
                $conventionSignee=1;
            else
                $conventionSignee=0;
            if (isset($_POST['charte']))
                $charteSignee=1;
            else
                $charteSignee=0;
            $langues=htmlspecialchars($_POST['langues']);
            if (isset($_POST['festival']))
                $festival=1;
            else
                $festival=0;
            if (isset($_POST['chantier']))
                $chantier=1;
            else
                $chantier=0;
            $mail=htmlspecialchars($_POST['mail']);
            if ($mail!='')
                $infoCompl.='<mail>'.$mail.'</mail>';
            $benevole=new Benevole('',$nom,$prenom,$mission,$ville,$competences,$infoCompl,$conventionSignee,$charteSignee,$langues,$festival,$chantier);
            $message = $this->cpt->newBenevole($benevole);
            // Vérification, à commenter TODO
            $message = $message;
        }
        include 'Vue/Admin/VueCreerBenevole.php';
    }

    public function updateBenevole($idBenevole){
        if (isset($_POST['pseudo'])){
            $pseudo=htmlspecialchars($_POST['pseudo']);
            $mail=htmlspecialchars($_POST['mail']);
            $valide=htmlspecialchars($_POST['valide']);
            $idBenevole=htmlspecialchars($_POST['idBene']);
            $type=htmlspecialchars($_POST['type']);
            $compte=new Benevole($idBenevole,$pseudo,$mail,'','',$type,'','',$valide,$idBenevole);
            $message = $this->cpt->updateBenevole($compte);
        }
        $vBenevole= $this->cpt->getBenevoleFromId($idBenevole);
        include 'Vue/Admin/VueModifierBenevole.php';


    }


}

?>