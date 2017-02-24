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
                        echo '<tr><th>id Compte : </th><td>' . $vCompte->idCompte. '</td></tr>';
                        echo '<tr><th>pseudo : </th><td>' . $vCompte->pseudo. '</td></tr>';
                        echo '<tr><th>adresse mail : </th><td>' . $vCompte->mail. '</td></tr>';
                        echo '<tr><th>date d\'inscription : </th><td>' . $vCompte->dateInsc. '</td></tr>';
                        echo '<tr><th>date de dernière connexion : </th><td>' . $vCompte->dateDerCo. '</td></tr>';
                        echo '<tr><th>type de compte : </th><td>'.$vCompte->typeCompte.'</td></tr>';
                        echo '<tr><th>IdentifiantPhp : </th><td>'.$vCompte->idPhp.'</td></tr>';
                        echo '<tr><th>Validé par un admin ? : </th><td>'.$vCompte->valide.'</td></tr>';
                        ?>
                    </table>
                </center>
            </section>
        </div>
        <?php include("./include/footer.php"); ?>
    </body>
</html>