
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
                /**
                 * Created by PhpStorm.
                 * User: Prepa
                 * Date: 14/02/2017
                 * Time: 00:02
                 */

                 if (count($vListeEleves) >= 1) {
                     echo '<table border="2"><tr><th>id Eleve</th><th>prenom</th><th>nom</th><th>groupe</th><th>id Classe</th><th>Modifier</th><th>Supprimer</th></tr>';
                    foreach ($vListeEleves as $ele) {
                        echo '<tr><td align="center"><a href="index.php?entite=eleve&action=R&id='.$ele->idEleve.'">'.$ele->idEleve.'</a></td>';
                        echo '<td>'.$ele->prenom.'</td><td>'.$ele->nom.'</td><td>'.$ele->groupe.'</td><td align="center"><a href="index.php?entite=classe&action=R&id='.$ele->idClasse.'">'.$ele->idClasse.'</a></td>
                        <td align="center"><a href="index.php?entite=eleve&action=U&id='.$ele->idEleve.'"><img src="./Vue/images/modifier.jpg" alt="image modifier" height="30"></a></td>
                        <td align="center"><a href="index.php?entite=eleve&action=D&id='.$ele->idEleve.'"><img src="./Vue/images/supprimer.jpg" alt="image supprimer" height="30"></a></td></tr>';
                    }
                    echo '</table>';
                }
                else {
                    echo "Pas d' élèves à afficher<BR/>";
                }
                ?>
            <a href="index.php?entite=eleve&action=C">
                <img src="./Vue/images/ajouter.jpg" alt="Ajouter" height="80">
            </a>
        </center>
    </section>
</div>
<?php include("./include/footer.php"); ?>
</body>
</html>



