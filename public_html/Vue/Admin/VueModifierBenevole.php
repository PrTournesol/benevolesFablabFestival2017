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

            echo '<form method="post" action="index.php?entite=benevole&action=U&id='.$_GET['id'].'">';
            ?>
                <table border="2">
                    <?php
                    echo '<tr><th>Prénom : </th><td><input type="text" name="prenom" required value="'.$vBenevole->prenom.'"></td></tr>';
                    echo '<tr><th>Nom : </th><td><input type="text" name="nom" required value="'.$vBenevole->nom.'"></td></tr>';
                    echo '<tr><th>Mission : </th><td><input type="text" name="mission" value="'.$vBenevole->mission.'"></td></tr>';
                    echo '<tr><th>Ville : </th><td><input type="text" name="ville" value="'.$vBenevole->ville.'"></td></tr>';
                    echo '<tr><th>Compétences : </th><td><input type="text" name="competences" value="'.$vBenevole->competences.'"></td></tr>';
                    echo '<tr><th>Informations Complémentaires : </th><td><input type="text" name="infoCompl" value="'.$vBenevole->infoCompl.'"></td></tr>';
                    echo '<tr><th>ConventionSignée ? : </th><td><input type="checkbox" name="conv" '; if ($vBenevole->conventionSignee==1) echo 'checked'; echo'></td></tr>';
                    echo '<tr><th>Charte Signée ? : </th><td><input type="checkbox" name="charte" '; if ($vBenevole->charteSignee==1) echo 'checked'; echo'></td></tr>';
                    echo '<tr><th>Langues : </th><td><input type="text" name="langues" value="'.$vBenevole->langues.'"></td></tr>';
                    echo '<tr><th>Festival : </th><td><input type="checkbox" name="festival" '; if ($vBenevole->festival==1) echo 'checked'; echo'></td></tr>';
                    echo '<tr><th>Chantier : </th><td><input type="checkbox" name="chantier" '; if ($vBenevole->chantier==1) echo 'checked'; echo'></td></tr>';
                    ?>
                </table>
                <input type="submit" value="Modifier le benevole">
                <br><br><br>
                <a href="index.php?entite=benevole&action=R">Retour à la liste des benevoles</a>
            </form>
        </center>
    </section>
</div>
<?php include("./include/footer.php"); ?>
</body>
</html>