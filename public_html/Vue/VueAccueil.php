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
			<h2>Bienvenue dans l'espace sécurisé du site des bénévoles, vous avez un compte <?php echo $_SESSION['typeCompte'];?></h2>

            <br>
            <a href="index.php?entite=deconnexion"">Déconnexion</a>
		</section>
	</div>
	<?php include("./include/footer.php"); ?>
</body>
</html>