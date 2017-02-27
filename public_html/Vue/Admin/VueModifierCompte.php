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

            echo '<form method="post" action="index.php?entite=compte&action=U&id='.$_GET['id'].'">';
            ?>
                <table border="2">
                    <?php
                    echo '<tr><th>id Compte : </th><td>' . $vCompte->idCompte. '</td></tr>';
                    echo '<tr><th>pseudo : </th><td><input type="text" name="pseudo" value="' . $vCompte->pseudo. '" required></td></tr>';
                    echo '<tr><th>adresse mail : </th><td><input type="email" name="mail" value="' . $vCompte->mail. '" required></td></tr>';
                    echo '<tr><th>date d\'inscription : </th><td>' . $vCompte->dateInsc. '</td></tr>';
                    echo '<tr><th>date de dernière connexion : </th><td>' . $vCompte->dateDerCo. '</td></tr>';
                    echo '<tr>
                                <th>type de compte : </th>
                                <td>
                                    <select name="type">
                                        <option value="Admin" ';
                                        if ($vCompte->typeCompte=='Admin')
                                            echo 'selected';
                                        echo '>Admin</option>
                                        <option value="Membre"';
                                        if ($vCompte->typeCompte=='Membre')
                                            echo 'selected';
                                        echo '>Membre</option>
                                </td>
                            </tr>';
                    echo '<tr><th>IdentifiantPhp : </th><td>'.$vCompte->idPhp.'</td></tr>';
                    echo '<tr>
                            <th>Validé par un admin ? : </th>
                            <td>
                                <select name="valide">
                                    <option value="1" ';
                                    if ($vCompte->valide==1)
                                        echo 'selected';
                                    echo '>oui</option>
                                    <option value="0"';
                                    if ($vCompte->valide==0)
                                        echo 'selected';
                                    echo '>non</option>
                            </td>
                        </tr>';
                    echo '<tr><th>idBenevole associé : </th><td><input type="number" min="1" name="idBene" value="'.$vCompte->idBenevole.'"></td></tr>';
                    ?>

                </table>
                <input type="submit" value="Modifier le compte">
                <br><br><br>
                <a href="index.php?entite=compte&action=R">Retour à la liste des comptes</a>
            </form>
        </center>
    </section>
</div>
<?php include("./include/footer.php"); ?>
</body>
</html>