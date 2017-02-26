<?php
require_once 'Controleur/ControleurConnexion.php';
require_once 'Controleur/Admin/ControleurCompte.php';


class RouteurAdmin {
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
            self::$uniqueInstance= new RouteurAdmin($pCtrlCo);
        }
        return self::$uniqueInstance;
    }

    public function routerRequete() {


		// s'il y a un parametre 'entite'
        if (isset($_GET['entite'])) {
            self::$ctrlCo->verifConnexion();
            switch($_GET['entite']) {
                case 'compte' :
                    $ctrlCpt = new ControleurCompte();
                    // on détermine quelle action (CRUD) on veut effectuer sur l'entité choisie
                    switch($_GET['action']) {
                        case 'C' :  // 'C' = Create = ajout d'un média...
                            $ctrlCpt->createCompte();
                            break;
                        case 'R' : 	// 'R' = Read = lecture des médias ou d'un seul s'il y a un parametre id
                            if (isset($_GET['id'])) {
                                $ctrlCpt->getCompteFromId($_GET['id']);
                            }
                            else {
                                $ctrlCpt->getListeComptes();
                            }
                            break;
                        case 'U' : 	// 'U' = Update = modification d'un média à partir de son id
                            $ctrlCpt->setCompte($_GET['id']);
                            break;
                        case 'D' : 	// 'D' = Delete = suppression d'un média à partir de son id
                            $ctrlCpt->deleteCompte($_GET['id']);
                            break;
                        default: 	// pour toutes les autres valeurs du parametre 'action', on affiche la liste des médias
                            $ctrlCpt->getListeComptes();
                            break;
                    }
                    break;

                case 'tournoi' :
                    $ctrlTrn= new ControleurTournoi();
                    switch($_GET['action']) {
                        case 'C' :  // 'C' = Create = ajout d'un groupe...
                            $ctrlTrn->createTournoi();
                            break;
                        case 'R' : 	// 'R' = Read = lecture des groupes ou d'un seul s'il y a un parametre id
                            if (isset($_GET['id'])) {
                                $ctrlTrn->getTournoiFromId($_GET['id']); // TODO
                            }
                            else {
                                $ctrlTrn->getListeTournois();
                            }
                            break;

                        case 'U' : 	// 'U' = Update = modification d'un groupe à partir de son id
                            $ctrlTrn->setTournoi($_GET['id']);
                            break;
                        case 'D' : 	// 'D' = Delete = suppression d'un groupe à partir de son id
                            $ctrlTrn->deleteTournoi($_GET['id']);
                            break;
                        default: 	// pour toutes les autres valeurs, on affiche la liste des groupes
                            $ctrlTrn->getListeTournois();
                            break;
                    }
                    break;
                case 'classe' :
                    $ctrlCla= new ControleurClasse();
                    switch($_GET['action']) {
                        case 'C' :  // 'C' = Create = ajout d'un groupe...
                            $ctrlCla->createClasse();
                            break;
                        case 'R' : 	// 'R' = Read = lecture des groupes ou d'un seul s'il y a un parametre id
                            if (isset($_GET['id'])) {
                                $ctrlCla->getClasse($_GET['id']); // TODO
                            }
                            elseif (isset($_GET['tournoi'])){
                                $ctrlCla->getClassesFromTournoi($_GET['tournoi']);
                            }
                            elseif (isset($_GET['compte'])){
                                $ctrlCla->getClasseFromCompte($_GET['compte']);
                            }
                            else {
                                $ctrlCla->getListeClasses();
                            }
                            break;

                        case 'U' : 	// 'U' = Update = modification d'un groupe à partir de son id
                            $ctrlCla->setClasse($_GET['id']);
                            break;
                        case 'D' : 	// 'D' = Delete = suppression d'un groupe à partir de son id
                            $ctrlCla->deleteClasse($_GET['id']);
                            break;
                        default: 	// pour toutes les autres valeurs, on affiche la liste des groupes
                            $ctrlCla->getListeClasses();
                            break;
                    }
                    break;
                case 'eleve' :
                    $ctrlEle= new ControleurEleve();
                    switch($_GET['action']) {
                        case 'C' :  // 'C' = Create = ajout d'un groupe...
                            $ctrlEle->createEleve();
                            break;
                        case 'R' : 	// 'R' = Read = lecture des groupes ou d'un seul s'il y a un parametre id
                            if (isset($_GET['id'])) {
                                $ctrlEle->getEleve($_GET['id']);
                            }
                            elseif (isset($_GET['classe'])){
                                $ctrlEle->getElevesFromClasse($_GET['classe']);
                            }
                            else {
                                $ctrlEle->getListeEleves();
                            }
                            break;

                        case 'U' : 	// 'U' = Update = modification d'un groupe à partir de son id
                            $ctrlEle->setEleve($_GET['id']);
                            break;
                        case 'D' : 	// 'D' = Delete = suppression d'un groupe à partir de son id
                            $ctrlEle->deleteEleve($_GET['id']);
                            break;
                        default: 	// pour toutes les autres valeurs, on affiche la liste des groupes
                            $ctrlEle->getListeEleves();
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
