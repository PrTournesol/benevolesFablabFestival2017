<?php

/**
 * Created by PhpStorm.
 * User: Mael
 * Date: 10/01/2017
 * Time: 18:04
 */
include_once ('Modele/ModeleCompte.php');

class ControleurConnexion
{

    private $connecte;

    /**
     * ControleurConnexion constructor.
     * @param $connecte
     */
    public function __construct()
    {
        session_start();
    }


    public function verifConnexion()
    {
        // permet de vérifier si l'utilisateur est authentifié sur l'espace sécurisé,
        // cette fonction est appelée par le routeur avant chaque accès à une page de l'espace sécurisé.
        if (!isset($_SESSION['identifie'])) {
            include 'Vue/VueConnexion.php';
            exit();
        }

        if (isset($_SESSION['identifie']) && $_SESSION['identifie'] != 'OK') {
            include 'Vue/VueConnexion.php';
            exit();
        }
    }

    public function TraitConnexion(){
        //on rentre dans ce fichier si le formulaire d'identification a été soumis*
        $login="";
        $mdp="";
        $cpt = new ModeleCompte();

        // Si il y a un cookie
        if (isset($_COOKIE["rememberMe"])){
            $login=explode("&",$_COOKIE["rememberMe"])[0];
            $uidCookie=explode("&",$_COOKIE["rememberMe"])[1];
            $compte=$cpt->getCompteFromPseudo($login);
            if ($compte->idPhp==$uidCookie){
                // cas où le cokkie n'as pas été altéré
                $_SESSION['compte']=$compte;
                $_SESSION['typeCompte']=$compte->typeCompte;
                $_SESSION['identifie']='OK';
                $uid= uniqid();
                $cpt->majDateConnexion($login,$uid);
                setcookie("rememberMe", "", time() - 1);
                setcookie("rememberMe",$login.'&'.$uid,time()+3600*24*7);
                header('Location:index.php');
            }
            else{
                header ('Location:index.php?entite=connexion&err=Cookie erroné, veuillez vous authentifier à nouveau');
                setcookie("rememberMe", "", time() - 1);
            }
        }
        else {
            // cas où le formulaire a été rempli
            if (isset($_POST['login']) && isset($_POST['mdp'])){
                $login=htmlspecialchars($_POST['login']);
                $mdp=htmlspecialchars($_POST['mdp']);
            }
            $compte=$cpt->getCompteFromPseudo($login);
            if(password_verify($mdp,$compte->hashMdp)){
                $_SESSION['identifie']='OK';
                $_SESSION['compte']=$compte;
                $_SESSION['typeCompte']=$compte->typeCompte;
                $uid= uniqid();
                $cpt->majDateConnexion($login,$uid);
                if (isset($_POST['rememberMe'])){
                    //cela signifie que la case "Se souvenir de moi" a été cochée, on crée un cookie qui est actif pendant 1 semaine
                    setcookie("rememberMe",$login.'&'.$uid,time()+3600*24*7);
                }
                header('Location:index.php');
            }
            else { // cas d'erreur de saisie ou de tentative d'accès à cette page
                header ('Location:index.php?entite=connexion&err=Mauvais login ou mot de passe'); // ou mot de passe invalide';
            }
        }
    }


    public function deconexion()
    {
        // détruit la session en cours
        unset($_SESSION['identifie']);
        unset($_GET);
        session_destroy();
        header ('Location:index.php');
    }

    public function detruireCookie(){
        // permet de détruire le cookie de mémorisation du login et du mot de passe
        if (isset($_COOKIE["rememberMe"]))
        {
        setcookie("rememberMe", "", time() - 1);
        }
        header('Location:index.php');
    }

}

?>