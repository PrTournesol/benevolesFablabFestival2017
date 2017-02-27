
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="./include/styles.css" />
    <title>Liste des bénévoles</title>
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
                <tr><th>id Benevole</th><th>pseudo</th><th>mail</th><th>date d'inscription</th><th>date de dernière connexion</th><th>type de benevole</th><th>Validé ?</th><th>idBénévole</th><th>Modifier</th><th>Supprimer</th></tr>
                </tbody>
                <?php
                /**
                 * Created by PhpStorm.
                 * User: Prepa
                 * Date: 14/02/2017
                 * Time: 00:02
                 */

                 if (count($vListeBenevoles) >= 1) {
                    foreach ($vListeBenevoles as $cpt) {
                        echo '<tr><td align="center"><a href="index.php?entite=benevole&action=R&id='.$cpt->idBenevole.'">'.$cpt->idBenevole.'</a></td>';
                        echo '<td>'.$cpt->pseudo.'</td><td>'.$cpt->mail.'</td><td>'.$cpt->dateInsc.'</td><td>'.$cpt->dateDerCo.'</td><td>'.$cpt->typeBenevole.'</td><td>'.$cpt->valide.'</td><td align="center"><a href="index.php?entite=benevole&action=R&id='.$cpt->idBenevole.'">'.$cpt->idBenevole.'</a>
                        <td align="center"><a href="index.php?entite=benevole&action=U&id='.$cpt->idBenevole.'"><img src="./Vue/images/modifier.jpg" alt="image modifier" height="30"></a></td>
                        <td align="center"><a href="index.php?entite=benevole&action=D&id='.$cpt->idBenevole.'"><img src="./Vue/images/supprimer.jpg" alt="image supprimer" height="30"></a></td></tr>';
                    }
                }
                else {
                    echo "Pas de Benevoles...<BR/>";
                }
                ?>
            </table>
            <a href="index.php?entite=benevole&action=C">
                <img src="./Vue/images/ajouter.jpg" alt="Ajouter" height="80">
            </a>
        </center>
    </section>
</div>
<?php include("./include/footer.php"); ?>
</body>
</html>



