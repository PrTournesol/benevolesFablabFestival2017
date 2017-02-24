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
            <?php
            // Affichage des variables session et des cookies
            echo ("On affiche la session :");
            var_dump($_SESSION['identifie']);
            echo ("On affiche le possible cookie :");
            var_dump($_COOKIE)
            ?>

            <br>
            <a href="index.php?entite=deconnexion"">Déconnexion</a>
		</section>
	</div>
	<?php include("./include/footer.php"); ?>
</body>
</html>