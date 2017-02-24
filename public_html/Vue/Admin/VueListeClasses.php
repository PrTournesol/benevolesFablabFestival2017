
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
            <?php
            if (isset($_GET['$message']))
                echo '<h1>'.htmlspecialchars($_GET['$message']).'</h1>';
            ?>
            <table border="2">
                <tbody>
                <tr><th>id Classe</th><th>ecole</th><th>nombre d'élèves</th><th>prénom professeur</th><th>nom professeur</th><th>id Tournoi</th><th>id Compte</th><th>Modifier</th><th>Supprimer</th></tr>
                </tbody>
                <?php
                /**
                 * Created by PhpStorm.
                 * User: Prepa
                 * Date: 14/02/2017
                 * Time: 00:02
                 */

                 if (count($vListeClasses) >= 1) {
                    foreach ($vListeClasses as $cla) {
                        echo '<tr><td align="center"><a href="index.php?entite=classe&action=R&id='.$cla->idClasse.'">'.$cla->idClasse.'</a></td>';
                        echo '<td>'.$cla->ecole.'</td><td>'.$cla->nbEleves.'</td><td>'.$cla->prenomProf.'</td><td>'.$cla->nomProf.'</td><td align="center"><a href="index.php?entite=tournoi&action=R&id='.$cla->idTournoi.'">'.$cla->idTournoi.'</a></td><td align="center"><a href="index.php?entite=compte&action=R&id='.$cla->idCompte.'">'.$cla->idCompte.'</a></td>
                        <td align="center"><a href="index.php?entite=classe&action=U&id='.$cla->idClasse.'"><img src="./Vue/images/modifier.jpg" alt="image modifier" height="45"></a></td>
                        <td align="center"><a href="index.php?entite=classe&action=D&id='.$cla->idClasse.'"><img src="./Vue/images/supprimer.jpg" alt="image supprimer" height="45"></a></td></tr>';
                    }
                }
                else {
                    echo "Pas de Classes...<BR/>";
                }
                ?>
            </table>
            <a href="index.php?entite=classe&action=C">
                <img src="./Vue/images/ajouter.jpg" alt="Ajouter" height="80">
            </a>
        </center>
    </section>
</div>
<?php include("./include/footer.php"); ?>
</body>
</html>



