<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="./include/styles.css" />
    <title>Validation compte</title>
</head>
<body>
<?php
include("include/header.php");
?>
<div class="wrapper">
    <section id="content">
        <h1>Validation de votre compte</h1>
        <br>
        <center>
            <?php
            if (isset($_GET['message']))
                echo '<h1>'.$_GET['message'].'</h1>';
            echo '<form method="post" action="index.php?entite=validation&id='.$_GET['id'].'" >';
            ?>
                <table border="2">
                    <tr><th>Pseudo : </th><td><input type="text" name="pseudo" required <?php if (isset($pseudo)) echo 'value="'.$pseudo.'"';?>></td></tr>
                    <tr><th>Adresse mail : </th><td><input type="email" name="mail" required <?php if (isset($mail)) echo 'value="'.$mail.'"';?>></td></tr>
                    <tr><th>Mot de passe : </th><td><input type="password" name="pass" required pattern=".{3,}" required title="6 charactères minimim" ></td></tr>
                    <tr><th>Confirmation : </th><td><input type="password" name="pass2" required ></td></tr>

                    <tr>
                        <th>
                            <img src="Vue/images/captcha.php" onclick="this.src='Vue/images/image.php?' + Math.random();" style="cursor:pointer;">
                        </th>
                        <td>
                            <input type="text" name="captcha" required>
                        </td>
                    </tr>

                </table>
                <input type="submit" value="Créer le compte">
                <br><br><br>
            </form>
        </center>
    </section>
</div>
</body>
</html>