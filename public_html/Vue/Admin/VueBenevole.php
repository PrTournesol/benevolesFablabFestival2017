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
                    <?php
                    echo '<tr><th>Prénom : </th><td>'.$vBenevole->prenom.'</td></tr>';
                    echo '<tr><th>Nom : </th><td>'.$vBenevole->nom.'</td></tr>';
                    echo '<tr><th>Mission : </th><td>'.$vBenevole->mission.'</td></tr>';
                    echo '<tr><th>Ville : </th><td>'.$vBenevole->ville.'</td></tr>';
                    echo '<tr><th>Compétences : </th><td>'.$vBenevole->competences.'</td></tr>';
                    echo '<tr><th>Informations Complémentaires : </th><td width="350">'.$vBenevole->infoCompl.'</td></tr>';
                    echo '<tr><th>ConventionSignée ? : </th><td>'.$vBenevole->conventionSignee.'</td></tr>';
                    echo '<tr><th>Charte Signée ? : </th><td>'.$vBenevole->charteSignee.'</td></tr>';
                    echo '<tr><th>Langues : </th><td>'.$vBenevole->langues.'</td></tr>';
                    echo '<tr><th>Festival : </th><td>'.$vBenevole->festival.'</td></tr>';
                    echo '<tr><th>Chantier : </th><td>'.$vBenevole->chantier.'</td></tr>';
                    ?>
                </table>
                <br><br><br>
                <a href="index.php?entite=benevole&action=R">Retour à la liste des bénévoles</a>
            </form>
        </center>
    </section>
</div>
<?php include("./include/footer.php"); ?>
</body>
</html>