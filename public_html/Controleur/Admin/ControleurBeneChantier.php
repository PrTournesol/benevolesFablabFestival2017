<?php

/**
 * Created by PhpStorm.
 * User: Prepa
 * Date: 14/02/2017
 * Time: 00:05
 */

include_once ('Modele/ModeleDispoChantier.php');

class ControleurBeneChantier
{

    private $disp;

    /**
     * ControlleurBenevole constructor.
     */
    public function __construct()
    {
        $this->disp = new ModeleDispoChantier();
    }

    public function addDispo()
    {
//        var_dump($_POST);
//        var_dump($_SESSION);
        $message='';
        if (isset($_POST['reponse'])) {
            $idBene = $_SESSION['compte']->idBenevole;
            if ($idBene==null || $idBene==''){
                $message= 'Ce compte n\'est pas lié à un bénévole, vous ne pouvez donc pas renseigner vos disponibilités';
            }
            for ($i = 1; $i <= 28; $i++) {
                $mois = 2;
                $jour = 27 + ($i - 1) % 7;
                if ($jour > 28) {
                    $jour -= 28;
                    $mois = 3;
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
                if ($this->disp->getDisposChantierFromBenevoleAndDate($idBene,$disp->date)!=null)
                    $message.= 'Dispo du '.$disp->date.' déjà enregistrée';
                else
                    $message.= $this->disp->newDispoChantier($disp).'<br>';
            }

    //        var_dump($dispos);
    }

        include 'Vue/Membre/VueDispoChantier.php';
    }

}

?>