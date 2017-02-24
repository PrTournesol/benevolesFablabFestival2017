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
                        <?php
                                echo '<tr><th>id Tournoi : </th><td>' . $vTournoi->idTournoi. '</td></tr>';
                                echo '<tr><th>date : </th><td>' . $vTournoi->date. '</td></tr>';
                                echo '<tr><th>lieu : </th><td>' . $vTournoi->lieu. '</td></tr>';
                                echo '<tr><th>nombre de classes : </th><td>' . $vTournoi->nbClasses. '</td></tr>';
                                echo '<tr><th>nombre de tables : </th><td>'.$vTournoi->nbTables.'</td></tr>';
                                echo '<tr><th>nombre de rondes : </th><td>'.$vTournoi->nbRondes.'</td></tr>';
                                echo '<tr><th>informatins complémentaires : </th><td>'.$vTournoi->infoCompl.'</td></tr>';
                        ?>
                    </table>
                    <?php
                    echo '<a href="index.php?entite=classe&action=R&tournoi='.$vTournoi->idTournoi.'">Voir les classes du tournoi</a>';
                    ?>
                </center>
            </section>
        </div>
        <?php include("./include/footer.php"); ?>
    </body>
</html>