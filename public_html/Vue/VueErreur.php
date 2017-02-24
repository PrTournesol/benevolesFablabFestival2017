<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="./include/styles.css" />
    <title>Espace bénévole</title>
</head>
<body>
<?php
include("include/header.php");
?>
<div class="wrapper">
    <section id="content">
        <center>
            <?php
            if (isset($_GET['message']))
                echo '<h1>'.$_GET['message'].'</h1>';
            ?>
        </center>
    </section>
</div>
</body>
</html>