
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
                <tr><th>id Tournoi</th><th>date</th><th>lieu</th><th>nombre de classes</th><th>nombre de Tables</th><th>nombre de Rondes</th><th>informations complémentaires</th><th>Modifier</th><th>Supprimer</th></tr>
                </tbody>
                <?php
                /**
                 * Created by PhpStorm.
                 * User: Prepa
                 * Date: 14/02/2017
                 * Time: 00:02
                 */

                 if (count($vListeTournois) >= 1) {
                    foreach ($vListeTournois as $trn) {
                        echo '<tr><td align="center"><a href="index.php?entite=tournoi&action=R&id='.$trn->idTournoi.'">'.$trn->idTournoi.'</a></td>';
                        echo '<td>'.$trn->date.'</td><td>'.$trn->lieu.'</td><td>'.$trn->nbClasses.'</td><td>'.$trn->nbTables.'</td><td>'.$trn->nbRondes.'</td><td>'.$trn->infoCompl.'</td>
                        <td align="center"><a href="index.php?entite=tournoi&action=U&id='.$trn->idTournoi.'"><img src="./Vue/images/modifier.jpg" alt="image modifier" height="45"></a></td>
                        <td align="center"><a href="index.php?entite=tournoi&action=D&id='.$trn->idTournoi.'"><img src="./Vue/images/supprimer.jpg" alt="image supprimer" height="45"></a></td></tr>';
                    }
                }
                else {
                    echo "Pas de Tournois...<BR/>";
                }
                ?>
            </table>
            <a href="index.php?entite=tournoi&action=C">
                <img src="./Vue/images/ajouter.jpg" alt="Ajouter" height="80">
            </a>
        </center>
    </section>
</div>
<?php include("./include/footer.php"); ?>
</body>
</html>



