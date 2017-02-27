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
            <form method="post" action="index.php?entite=benevole&action=C">
                <table border="2">
                    <tr><th>Prénom : </th><td><input type="text" name="prenom" required></td></tr>
                    <tr><th>Nom : </th><td><input type="text" name="nom" required></td></tr>
                    <tr><th>Mission : </th><td><input type="text" name="mission" ></td></tr>
                    <tr><th>Ville : </th><td><input type="text" name="ville" ></td></tr>
                    <tr><th>Compétences : </th><td><input type="text" name="competences" ></td></tr>
                    <tr><th>Informations Complémentaires : </th><td><input type="text" name="infoCompl" ></td></tr>
                    <tr><th>Mail : </th><td><input type="mail" name="mail" required></td></tr>
                    <tr><th>ConventionSignée ? : </th><td><input type="checkbox" name="conv" ></td></tr>
                    <tr><th>Charte Signée ? : </th><td><input type="checkbox" name="charte" ></td></tr>
                    <tr><th>Langues : </th><td><input type="text" name="langues"></td></tr>
                    <tr><th>Festival : </th><td><input type="checkbox" name="festival" ></td></tr>
                    <tr><th>Chantier : </th><td><input type="checkbox" name="chantier" ></td></tr>
                </table>
                <input type="submit" value="Créer le benevole">
                <br><br><br>
                <a href="index.php?entite=benevole&action=R">Retour à la liste des benevoles</a>
            </form>
        </center>
    </section>
</div>
<?php include("./include/footer.php"); ?>
</body>
</html>