<?php
require_once 'Controleur/ControleurConnexion.php';
require_once 'Controleur/Admin/ControleurCompte.php';
require_once 'Controleur/Membre/ControleurDispoChantier.php';

class RouteurProf {
    // Route une requête entrante : exécution la bonne méthode de contrôleur en fonction de l'URL


    // Implémentation du patron singleton, il y a donc un unique Routeur dans toute l'application.
    // Le but étant de créer un unique Controleur de connexion afin que la session ne démarre qu'une fois.
    // Ceci est un parallèle au cours de CPOA initié par Monsieur Bruel

    private static $uniqueInstance = null;
    private static $ctrlCo = null ;


    private function __construct($pCtrlCo)
    {
        self::$ctrlCo = $pCtrlCo;
    }

    public static function getRouteur($pCtrlCo){
        if (is_null(self::$uniqueInstance)){
            self::$uniqueInstance= new RouteurProf($pCtrlCo);
        }
        return self::$uniqueInstance;
    }

    public function routerRequete() {


		// s'il y a un parametre 'entite'
        if (isset($_GET['entite'])) {
            self::$ctrlCo->verifConnexion();
            switch($_GET['entite']) {
                case 'chantier' :
                    // on détermine quelle action (CRUD) on veut effectuer sur l'entité choisie
                    switch($_GET['action']) {
                        case 'C' :  // 'C' = Create = ajout d'un média...
                            $ctrlCpt = new ControleurDispoChantier();
                            $ctrlCpt->addDispo();
                            break;
                        case 'R' : 	// 'R' = Read = lecture des médias ou d'un seul s'il y a un parametre id
                            if (isset($_GET['id'])) {
                                $ctrlCpt = new ControlleurCompte();
                                $ctrlCpt->getMedia($_GET['id']);
                            }
                            else {
                                $ctrlCpt = new ControlleurCompte();
                                $ctrlCpt->getListeComptes();
                            }
                            break;
                        case 'U' : 	// 'U' = Update = modification d'un média à partir de son id
                            $ctrlCpt = new ControleurMedia();
                            $ctrlCpt->setMedia($_GET['id']);
                            break;
                        case 'D' : 	// 'D' = Delete = suppression d'un média à partir de son id
                            $ctrlCpt = new ControleurMedia();
                            $ctrlCpt->deleteMedia($_GET['id']);
                            break;
                        default: 	// pour toutes les autres valeurs du parametre 'action', on affiche la liste des médias
                            $ctrlCpt = new ControleurMedia();
                            $ctrlCpt->getListeMedias();
                            break;
                    }
                    break;

                case 'classe' :
                    switch($_GET['action']) {
                        case 'C' :  // 'C' = Create = ajout d'un groupe...
                            $ctrlTrn= new ControleurType();
                            $ctrlTrn->createType();
                            break;
                        case 'R' : 	// 'R' = Read = lecture des groupes ou d'un seul s'il y a un parametre id
                            if (isset($_GET['id'])) {
                                $ctrlTrn = new ControleurType();
                                $ctrlTrn->getListeMediasByType($_GET['id']);
                            }
                            else {
                                $ctrlTrn = new ControleurType();
                                $ctrlTrn->getListeTypes();
                            }
                            break;

                        case 'U' : 	// 'U' = Update = modification d'un groupe à partir de son id
                            $ctrlTrn= new ControleurType();
                            $ctrlTrn->setType($_GET['id']);
                            break;
                        case 'D' : 	// 'D' = Delete = suppression d'un groupe à partir de son id
                            $ctrlTrn= new ControleurType();
                            $ctrlTrn->deleteType($_GET['id']);
                            break;
                        default: 	// pour toutes les autres valeurs, on affiche la liste des groupes
                            $ctrlTrn = new ControleurType();
                            $ctrlTrn->getListeTypes();
                            break;
                    }
                    break;
                case('deconnexion'):
                    self::$ctrlCo->deconexion();
                    break;
                case('detruireCookie'):
                    self::$ctrlCo->detruireCookie();
                    break;
                case('infos'):
                    include 'Vue/VueInfosConnexion.php';
                    break;
                default: 	// pour toutes les autres valeurs du parametre 'entite', on affiche la liste des groupes
//                        echo "cas par défaut";
                    include 'Vue/VueAccueil.php';

//                        $ctrlTrn = new ControleurType();
//                        $ctrlTrn->getListeTypes();
                    break;
            }
		}
		// aucune paramètre 'entite' : on affiche la liste des groupes
        else {
            self::$ctrlCo->verifConnexion();
            include 'Vue/VueAccueil.php';
        }
    }
}
