<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="./include/styles.css" />
    <title>Disponibilités des bénévoles par date</title>
</head>
<body>
<?php
// Index.php
include("./include/header.php");
?>
<div class="wrapper">
    <?php include("./include/menus.php"); ?>
    <section id="content">
        <?php
        $number=0;
        if (isset($message))
            echo '<h1>'.$message.'</h1>';

        echo '<center><br>';
        if (isset($vDispos)) {
            echo '<h1>Voici le nombre de bénévoles pour la date ' . $vDispos->date . '</h1>';
            echo '<table border="2">';
            echo '<tbody>
                   <tr><th>Matin</th><th>Repas du midi</th><th>Aprem</th><th>Repas du soir</th></tr>
                </tbody>';
            echo '<tr><td>' . $vDispos->matin . '</td><td>' . $vDispos->repasMidi . '</td><td>' . $vDispos->aprem . '</td><td>' . $vDispos->repasSoir . '</td></tr>';
            echo '</table></center>';
        }
        if (isset($vDates) && count($vDates) >= 1) {
            echo '<br><br><h1>Veuillez choisir la date à afficher</h1>';
            foreach ($vDates as $dat)
            {
                echo '<li><a href="index.php?entite=chantier&action=R&date='.$dat[0].'">'.$dat[0].'</a></li>';
            }
        }
        else {
            echo "Aucune disponibilité n'a été renseignée pour une date future<BR/>";
        }
        ?>
        </center>
    </section>
</div>
<?php include("./include/footer.php"); ?>
</body>
</html>