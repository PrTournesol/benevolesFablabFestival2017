<?php
require_once 'Controleur/ControleurConnexion.php';
require_once 'Controleur/ControleurValidation.php';
require_once 'Controleur/Admin/RouteurAdmin.php';
require_once 'Controleur/Membre/RouteurMembre.php';


class Routeur {
    // Route une requête entrante : exécution la bonne méthode de contrôleur en fonction de l'URL


    // Implémentation du patron singleton, il y a donc un unique Routeur dans toute l'application.
    // Le but étant de créer un unique Controleur de connexion afin que la session ne démarre qu'une fois.
    // Ceci est un parallèle au cours de CPOA initié par Monsieur Bruel

    private static $uniqueInstance = null;
    private static $ctrlCo = null ;


    private function __construct()
    {
        self::$ctrlCo = new ControleurConnexion();
    }

    public static function getRouteur(){
        if (is_null(self::$uniqueInstance)){
            self::$uniqueInstance= new Routeur();
        }
        return self::$uniqueInstance;
    }

    public function routerRequete() {
        $ctrlVali = new ControleurValidation();

        // s'il y a un parametre 'entite'
        if (isset($_GET['entite'])) {
			// on détermine avec quelle entité on veut travailler

            // le cas connexion est appart car la variable session n'est pas
            // testée dans cette partie pour permettre la connexion
            if ($_GET['entite']=='validation'){
                $ctrlVali->default();
            }
            elseif ($_GET['entite']=='erreur'){
                include 'Vue/VueErreur.php';
            }
            else {
                if ($_GET['entite']=='connexion'){
                    if (isset($_GET['err'])){
                        include 'Vue/VueConnexion.php';
                    }
                    else{
    //                    echo "on traite la connexion";
    //                    var_dump($_POST);
    //                    var_dump($_GET);
                        self::$ctrlCo->TraitConnexion();
                    }
                }
                else {
                    self::$ctrlCo->verifConnexion();
                    if ($_SESSION['typeCompte']=='Admin'){
                        RouteurAdmin::getRouteur(Routeur::$ctrlCo)->routerRequete();
                    }
                    elseif ($_SESSION['typeCompte']=='Membre'){
                        RouteurProf::getRouteur(Routeur::$ctrlCo)->routerRequete();
                    }
                    else{
                        header('Location:index.php');
                    }
                }

            }

		}
		// aucune paramètre 'entite' : on affiche la liste des groupes
        else {
            self::$ctrlCo->verifConnexion();
            include 'Vue/VueAccueil.php';
        }
    }
}
