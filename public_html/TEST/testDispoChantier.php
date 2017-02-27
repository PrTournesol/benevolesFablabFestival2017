<?php
/**
 * Created by PhpStorm.
 * User: Mael
 * Date: 27/02/2017
 * Time: 11:51
 */

include ('../Modele/ModeleDispoChantier.php');

$mod = new ModeleDispoChantier();

$res=$mod->getDisposChantierFromBenevole(2);

var_dump($res);
echo '<br>Avec l id de dispo';
$res=$mod->getDispoChantierFromId(2);

var_dump($res);