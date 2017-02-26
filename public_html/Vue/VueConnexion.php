<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="include/styles.css" />
    <title>Espace bénévole</title>
</head>
<body>
<?php
// Index.php
include("include/header.php");
?>
<div class="wrapper">
    <section id="content">
        <?php
        if (isset($_COOKIE["rememberMe"]) && !explode("&",$_COOKIE["rememberMe"])[0]=='' && !isset($_GET["err"])){
            echo("<a href=\"index.php?entite=connexion\"><button type=\"button\">rester identifié avec le login : ".explode("&",$_COOKIE["rememberMe"])[0]."</button></a>");
            echo ("<div id=formCo\" style=\"display:none\">");
        }
        else {
            if (isset($_GET["err"])) {
                echo ("<h1>".htmlspecialchars($_GET["err"])."</h1>");
            }
            else{
                echo ("Veuillez enter les identifiants pour accéder aux données :");
            }
            echo ("<div id=formCo\">");
        }

        ?>
        <form method="POST" action="./index.php?entite=connexion"></br>
            <label>Pseudo :<input type="text" name="login" ></label></br>
            <label>Mot de passe :<input type="password" name="mdp" ></label></br>
            <label>Se souvenir de moi <input type="checkbox" name="rememberMe"></label></br></br>
            <input type="submit" value="Valider" />
        </form>
</div>

</section>
</div>
<?php include("include/footer.php"); ?>
</body>
</html>
