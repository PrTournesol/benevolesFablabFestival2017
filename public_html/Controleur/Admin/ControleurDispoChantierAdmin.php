<?php

/**
 * Created by PhpStorm.
 * User: Prepa
 * Date: 14/02/2017
 * Time: 00:05
 */

include_once ('Modele/ModeleDispoChantier.php');
include_once ('Modele/ModeleBenevole.php');

class ControleurDispoChantierAdmin
{

    private $disp;
    private $bene;

    /**
     * ControlleurBenevole constructor.
     */
    public function __construct()
    {
        $this->disp = new ModeleDispoChantier();
        $this->bene = new ModeleBenevole();
    }

    public function addDispo()
    {
//        var_dump($_POST);
//        var_dump($_SESSION);
        $message='';
        $vListeBenevoles= $this->bene->getListeBenevoles();
        if (isset($_POST['reponse']) && isset($_POST['benevole'])) {
            $idBene = $_POST['benevole'];
            for ($i = 1; $i <= 28; $i++) {
                $mois = 3;
                $jour = 27 + ($i - 1) % 7;
                if ($jour > 31) {
                    $jour -= 31;
                    $mois = 4;
                }
                $matin = 0;
                $midi = 0;
                $aprem = 0;
                $soir = 0;
                if (isset($_POST['' . $i . ''])) {
                    $periode = variant_int(($i - 1) / 7);
                    switch ($periode) {
                        case 0:
                            $matin = 1;
                            break;
                        case 1:
                            $midi = 1;
                            break;
                        case 2:
                            $aprem = 1;
                            break;
                        case 3:
                            $soir = 1;
                            break;
                    }
                    $date = '2017-0' . $mois . '-' . $jour;
                    if (isset($dispos[$jour]))
                        $dispos[$jour] = new DispoChantier('', $date, $matin + $dispos[$jour]->matin, $midi + $dispos[$jour]->repasMidi, $aprem + $dispos[$jour]->aprem, $soir + $dispos[$jour]->repasSoir, $idBene);
                    else
                        $dispos[$jour] = new DispoChantier('', $date, $matin, $midi, $aprem, $soir, $idBene);
    //                echo 'dispo='.$periode;
    //                var_dump($dispos[$jour]);
                }
    //            echo '<br>i='.$i.' jour='.$jour.' mois='.$mois;
            }
            foreach ($dispos as $disp) {
                if ($this->disp->getDisposChantierFromBenevoleAndDate($idBene,$disp->date)!=null){
                    $benevole = $this->bene->getBenevoleFromId($idBene);
                    $val=$benevole->idBenevole.' '.$benevole->prenom.' '.$benevole->nom.' ';
                    if ($benevole->ville==null || $benevole->ville=='' || $benevole->ville=='NULL' || $benevole->ville=='null')
                        $val.='~ville non renseignée~';
                    else
                        $val.=' '.$benevole->ville;
                    $message.= 'Dispo du '.$disp->date.' déjà enregistrée pour le bénévole '.$val;
                }
                else{
                    $message.= $this->disp->newDispoChantier($disp).'<br>';
                }
            }
    //        var_dump($dispos);
    }
        include 'Vue/Admin/VueDispoChantierAdmin.php';
    }

    public function getDisposChantierFromDate($date=null){
        if (isset($date)){
            $vDispos=$this->disp->countDisposChantierFromDate($date);
            $vBene=$this->disp->getDisposChantierFromDate($date);
        }
        $vDates=$this->disp->getDates();
        include 'Vue/Admin/VueBeneChantierAdmin.php';

    }



}
?>