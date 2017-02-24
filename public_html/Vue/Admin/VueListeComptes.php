
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="./include/styles.css" />
    <title>Mon site !</title>
</head>
<body>
<?php
// Index.php
include("./include/header.php");
?>
<div class="wrapper">
    <?php include("./include/menus.php"); ?>
    <section id="content">
        <center>
            <table border="2">
                <tbody>
                <tr><th>id Compte</th><th>pseudo</th><th>mail</th><th>date d'inscription</th><th>date de dernière connexion</th><th>type de compte</th><th>Validé ?</th><th>Modifier</th><th>Supprimer</th></tr>
                </tbody>
                <?php
                /**
                 * Created by PhpStorm.
                 * User: Prepa
                 * Date: 14/02/2017
                 * Time: 00:02
                 */

                 if (count($vListeComptes) >= 1) {
                    foreach ($vListeComptes as $cpt) {
                        echo '<tr><td align="center"><a href="index.php?entite=compte&action=R&id='.$cpt->idCompte.'">'.$cpt->idCompte.'</a></td>';
                        echo '<td>'.$cpt->pseudo.'</td><td>'.$cpt->mail.'</td><td>'.$cpt->dateInsc.'</td><td>'.$cpt->dateDerCo.'</td><td>'.$cpt->typeCompte.'</td><td>'.$cpt->valide.'</td>
                        <td align="center"><a href="index.php?entite=compte&action=U&id='.$cpt->idCompte.'"><img src="./Vue/images/modifier.jpg" alt="image modifier" height="30"></a></td>
                        <td align="center"><a href="index.php?entite=compte&action=D&id='.$cpt->idCompte.'"><img src="./Vue/images/supprimer.jpg" alt="image supprimer" height="30"></a></td></tr>';
                    }
                }
                else {
                    echo "Pas de Comptes...<BR/>";
                }
                ?>
            </table>
            <a href="index.php?entite=compte&action=C">
                <img src="./Vue/images/ajouter.jpg" alt="Ajouter" height="80">
            </a>
        </center>
    </section>
</div>
<?php include("./include/footer.php"); ?>
</body>
</html>



