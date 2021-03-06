<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="./include/styles.css" />
        <title>Vue du compte n°<?php echo $vCompte->idCompte;?></title>
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
                        echo '<tr><th>id Compte : </th><td>' . $vCompte->idCompte. '</td></tr>';
                        echo '<tr><th>pseudo : </th><td>' . $vCompte->pseudo. '</td></tr>';
                        echo '<tr><th>adresse mail : </th><td>' . $vCompte->mail. '</td></tr>';
                        echo '<tr><th>date d\'inscription : </th><td>' . $vCompte->dateInsc. '</td></tr>';
                        echo '<tr><th>date de dernière connexion : </th><td>' . $vCompte->dateDerCo. '</td></tr>';
                        echo '<tr><th>type de compte : </th><td>'.$vCompte->typeCompte.'</td></tr>';
                        echo '<tr><th>IdentifiantPhp (<a href="index.php?entite=validation&id='.$vCompte->idPhp.'">lien de validation</a>) : </th><td>'.$vCompte->idPhp.'</td></tr>';
                        echo '<tr><th>Validé par un admin ? : </th><td>'.$vCompte->valide.'</td></tr>';
                        echo '<tr><th>idBenevole associé : </th><td><a href="index.php?entite=benevole&action=R&id='.$vCompte->idBenevole.'">'.$vCompte->idBenevole.'</a></td></tr>';
                        ?>
                    </table>
                </center>
            </section>
        </div>
        <?php include("./include/footer.php"); ?>
    </body>
</html>