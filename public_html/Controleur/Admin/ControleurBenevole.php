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

    private $bene;

    /**
     * ControlleurBenevole constructor.
     */
    public function __construct()
    {
        $this->bene = new ModeleBenevole();
    }


    public function getListeBenevoles(){
        $vListeBenevoles= $this->bene->getListeBenevoles();
        include 'Vue/Admin/VueListeBenevoles.php';
    }

    public function getBenevoleFromId($idBenevole){
        $vBenevole= $this->bene->getBenevoleFromId($idBenevole);
        include 'Vue/Admin/VueBenevole.php';
    }

    public function createBenevole()
    {
        if (isset($_POST['nom'])){
            $nom=htmlspecialchars($_POST['nom']);
            $prenom=htmlspecialchars($_POST['prenom']);
            $tel=$this->tel(htmlspecialchars($_POST['tel']));
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
            $infoCompl.='<idphp>'.uniqid().'</idphp>';
            $benevole=new Benevole('',$nom,$prenom,$tel,$mission,$ville,$competences,$infoCompl,$conventionSignee,$charteSignee,$langues,$festival,$chantier,'');
            $message = $this->bene->newBenevole($benevole);
            // Vérification, à commenter TODO
            $message = $message;
        }
        include 'Vue/Admin/VueCreerBenevole.php';
    }

    public function updateBenevole($idBenevole){
        if (isset($_POST['nom'])){
            $nom=htmlspecialchars($_POST['nom']);
            $prenom=htmlspecialchars($_POST['prenom']);
            $tel=$this->tel(htmlspecialchars($_POST['tel']));
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
            $benevole=new Benevole($idBenevole,$nom,$prenom,$tel, $mission,$ville,$competences,$infoCompl,$conventionSignee,$charteSignee,$langues,$festival,$chantier,'');
            $message = $this->bene->updateBenevole($benevole);
        }
        $vBenevole= $this->bene->getBenevoleFromId($idBenevole);
        include 'Vue/Admin/VueModifierBenevole.php';
    }

    public function deleteBenevole($idBenevole){
        $this->bene->deleteBenevole($idBenevole);
        if (isset($_GET['return']))
            header('Location:index.php?entite='.$_GET['return']);

        else
            header ('Location:index.php?entite=benevole&action=R');

    }

    private function tel($str) {
        if(strlen($str) == 10) {
            $res = substr($str, 0, 2) .' ';
            $res .= substr($str, 2, 2) .' ';
            $res .= substr($str, 4, 2) .' ';
            $res .= substr($str, 6, 2) .' ';
            $res .= substr($str, 8, 2) .' ';
            return $res;
        }
        else
            return $str;
    }

}

?>