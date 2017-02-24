<?php
/**
 * Created by PhpStorm.
 * User: Mael
 * Date: 09/02/2017
 * Time: 14:10
 */

include_once ('../Modele/ModeleCompte.php');

$cpt = new ModeleCompte();
//$vraiCompte = new Compte();
$vraiCompte=$cpt->getCompteFromId(1);

echo ' <br>affichage du compte avec id=1 <br>';

var_dump($vraiCompte);


$rep=$vraiCompte->typeCompte;
echo '<br>type de compte : ';
echo $rep;

$vraiCompte=$cpt->getCompteFromPseudo('jmbruel');

echo ' <br>affichage du compte avec pseudo=jmbruel <br>';

var_dump($vraiCompte);


$rep=$vraiCompte->typeCompte;
echo '<br>type de compte : ';
echo $rep;

echo '<br><br>';
var_dump($cpt->getListeComptes());

echo '<br><br>';
echo '<br><br>';
print_r($cpt->getListeComptes());



?>