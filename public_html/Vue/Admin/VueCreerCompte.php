<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="./include/styles.css" />
    <title>Espace bénévole</title>
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
            if (isset($message))
                echo '<h1>'.$message.'</h1>';
            ?>
            <form method="post" action="index.php?entite=compte&action=C">
                <table border="2">
                    <tr><th>pseudo : </th><td><input type="text" name="pseudo" required></td></tr>
                    <tr><th>adresse mail : </th><td><input type="email" name="mail" required></td></tr>
                    <tr>
                        <th>Validé ? : </th>
                        <td>
                            <select name="valide">
                                <option value="1" selected>oui</option>
                                <option value="0">non</option>
                        </td>
                    </tr>

                </table>
                <input type="submit" value="Créer le compte">
                <br><br><br>
                <a href="index.php?entite=compte&action=R">Retour à la liste des comptes</a>
            </form>
        </center>
    </section>
</div>
<?php include("./include/footer.php"); ?>
</body>
</html>