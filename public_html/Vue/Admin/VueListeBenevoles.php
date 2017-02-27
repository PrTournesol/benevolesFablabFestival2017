
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
        <h1>Liste des bénévoles</h1>
        <br>
        <center>
            <table border="2">
                <tbody>
                <tr><th>id Benevole</th><th>Prénom</th><th>Nom</th><th>Ville</th><th>Mission</th><th>Compétences</th><th>convention</th><th>charte</th><th>langues</th><th>festival</th><th>chantier</th><th>idCompte</th><th>Modifier</th><th>Supprimer</th></tr>
                </tbody>
                <?php
                /**
                 * Created by PhpStorm.
                 * User: Prepa
                 * Date: 14/02/2017
                 * Time: 00:02
                 */

                 if (count($vListeBenevoles) >= 1) {
                    foreach ($vListeBenevoles as $bene) {
                        echo '<tr><td align="center"><a href="index.php?entite=benevole&action=R&id='.$bene->idBenevole.'">'.$bene->idBenevole.'</a></td>';
                        echo '<td>'.$bene->prenom.'</td><td>'.$bene->nom.'</td><td>'.$bene->ville.'</td><td>'.$bene->mission.'</td><td>'.$bene->competences.'</td><td>'.$bene->conventionSignee.'</td><td>'.$bene->charteSignee.'</td><td>'.$bene->langues.'</td><td>'.$bene->festival.'</td><td>'.$bene->chantier.'</td><td align="center"><a href="index.php?entite=compte&action=R&id='.$bene->idCompte.'">'.$bene->idCompte.'</a>
                        <td align="center"><a href="index.php?entite=benevole&action=U&id='.$bene->idBenevole.'"><img src="./Vue/images/modifier.jpg" alt="image modifier" height="30"></a></td>
                        <td align="center"><a href="index.php?entite=benevole&action=D&id='.$bene->idBenevole.'"><img src="./Vue/images/supprimer.jpg" alt="image supprimer" height="30"></a></td></tr>';
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



