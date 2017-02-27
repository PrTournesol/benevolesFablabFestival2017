<?php

/**
 * Created by PhpStorm.
 * User: Mael
 * Date: 10/01/2017
 * Time: 18:04
 */
include_once ('Modele/ModeleCompte.php');

class ControleurValidation
{

    private $cpt;
    private $pass;
    private $compte;
    private $id='';
    private $message='';
    private $pseudo='';
    private $mail='';

    /**
     * ControlleurCompte constructor.
     */
    public function __construct()
    {
        $this->cpt = new ModeleCompte();
    }


    public function defaut(){
        if (isset($_GET['id'])){
            $this->id=htmlspecialchars($_GET['id']);
            $this->verifCompte();
            if (isset($_POST['pseudo'])){
                $this->verifCaptcha();
                $this->verifPseudo();
                $this->verifMail();
                $this->verifMotDePasse();
                if ($this->message==''){
                    $this->validerCompte();
                }
                header('Location:index.php?entite=validation&id='.$this->id.'&pseudo='.$this->pseudo.'&mail='.$this->mail.'&message='.$this->message);
            }
            else{
                $pseudo=isset($_GET['pseudo'])?$_GET['pseudo']:$this->pseudo;
                $mail=isset($_GET['mail'])?$_GET['mail']:$this->mail;
                include('Vue/VueValidation.php');
            }
        }
        else{
            echo 'Redirection en cours ...';
            header('Location:index.php');
        }
    }

    private function verifCompte(){
        $this->compte=$this->cpt->getCompteFromIdPhp($_GET['id']);
        if ($this->compte==null){
            $this->message.='<br>Lien incorrect';
            header('Location:index.php?entite=validation&message=' . $this->message);
        }
        elseif ($this->compte->dateInsc!=''){
            header('Location:index.php');
        }
    }

    private function verifMail(){
        $this->mail=$_POST['mail'];
        if (strcmp($this->compte->mail,$this->mail)!=0){
            $this->message.='<br>le mail ne correspond pas ';
        }

    }

    private function verifCaptcha(){
        if(isset($_POST['captcha'])){
            if($_POST['captcha']!=$_SESSION['code']){
//                echo 'erreur captcha';
                $this->message.='<br>Captcha incorrect';
            }
        }
        else
            echo 'erreur captcha';
    }

    private function verifPseudo(){
        $error='';
        $this->pseudo=htmlspecialchars($_POST['pseudo']);
        $pseudo=$this->pseudo;
        if( strlen($pseudo) > 15 ) {
//                    $error = "Password too long!";
            $error .= "<br>Pseudo trop long";
        }

        if( strlen($pseudo) < 4 ) {
//                    $error = "Password too short!";
            $error .= "<br>Pseudo trop court";
        }

        if ($error!=''){
            $this->message.=$error;
        }
    }


    private function verifMotDePasse(){
        if (isset($_POST['pass']) && isset($_POST['pass2'])){
            if($_POST['pass']==$_POST['pass2']){
                
                $pass=htmlspecialchars($_POST['pass']);
                $error="";

                if( strlen($pass) > 25 ) {
//                    $error = "Password too long!";
                    $error .= "<br>Mot de passe trop long";
                }

                if( strlen($pass) < 6 ) {
//                    $error = "Password too short!";
                    $error .= "<br>Mot de passe trop court";
                }

                if( !preg_match("#[0-9]+#", $pass) ) {
//                    $error = "Password must include at least one number!";
                    $error .= "<br>Le mot de passe doit contenir au moins un chiffre";
                }

                if( !preg_match("#[a-z]+#", $pass) ) {
//                    $error = "Password must include at least one letter!";
                    $error .= "<br>Le mot de passe doit contenir au moins une lettre";

                }
                 if ($error==""){
                     $this->pass=password_hash($pass,PASSWORD_DEFAULT);
                 }
                 else{
                     $this->message.=$error;
                 }
            }
            else {
                $this->message.='<br>Les mots de passe ne correspondent pas';
            }
        }
        else {
            $this->message.='<br>Les mots de passe sont vides';
        }
    }

    private function validerCompte()
    {
            $pseudo = htmlspecialchars($_POST['pseudo']);
            if ($this->cpt->getCompteFromPseudo($pseudo)!=null && $this->cpt->getCompteFromPseudo($pseudo)->idPhp!=$this->id){
                    $message='Ce pseudo existe déjà, veuillez en choisir un autre';
            }
            else
                $message = $this->cpt->activCompte($pseudo,$this->pass,$this->id);
            // Vérification, à commenter TODO
            //$message = $message . '<br> pseudo : ' . $pseudo . ' ;mail : ' . $mail . ' ; pass : ' . $this->pass.'<br>';
            $this->message.='<br>'.$message;
    }
}
?>