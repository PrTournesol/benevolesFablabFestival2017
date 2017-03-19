<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="./include/styles.css" />
        <title>Vos disponibilités</title>
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
                    $number=0;
                    if (isset($message))
                        echo '<h1>'.$message.'</h1>';
                    else
                        echo '<h1>Merci d\'indiquer vos disponibilités et si vous prenez le repas</h1>';
                ?>
                <center>
                    <br>
                    <form method="post" action="index.php?entite=chantier&action=C">
                    <input type="hidden" name="reponse">
                        <table border="2">
                        <tbody>
                            <tr><th>Date</th><th>Lundi 27 mars</th><th>Mardi 28 mars</th><th>Mercredi 29 mars</th><th>Jeudi 30 mars</th><th>Vendredi 31 mars</th><th>Samedi 1e avril</th><th>Dimanche 5 mars</th></tr>
                        </tbody>
                        <tr>
                            <th rowspan="4">Disponibilités</th>
                            <td align="center" height="70px">matin :<br><div class="switch demo"><input type="checkbox" name="<?php echo $number+=1;?>"><label><i></i></label></div></td>
                            <td align="center" height="70px">matin :<br><div class="switch demo"><input type="checkbox" name="<?php echo $number+=1;?>"><label><i></i></label></div></td>
                            <td align="center" height="70px">matin :<br><div class="switch demo"><input type="checkbox" name="<?php echo $number+=1;?>"><label><i></i></label></div></td>
                            <td align="center" height="70px">matin :<br><div class="switch demo"><input type="checkbox" name="<?php echo $number+=1;?>"><label><i></i></label></div></td>
                            <td align="center" height="70px">matin :<br><div class="switch demo"><input type="checkbox" name="<?php echo $number+=1;?>"><label><i></i></label></div></td>
                            <td align="center" height="70px">matin :<br><div class="switch demo"><input type="checkbox" name="<?php echo $number+=1;?>"><label><i></i></label></div></td>
                            <td align="center" height="70px">matin :<br><div class="switch demo"><input type="checkbox" name="<?php echo $number+=1;?>"><label><i></i></label></div></td>
                        </tr>
                        <tr>
                            <td align="center" height="70px">Repas du Midi :<br><div class="switch demo"><input type="checkbox" name="<?php echo $number+=1;?>"><label><i></i></label></div></td>
                            <td align="center" height="70px">Repas du Midi :<br><div class="switch demo"><input type="checkbox" name="<?php echo $number+=1;?>"><label><i></i></label></div></td>
                            <td align="center" height="70px">Repas du Midi :<br><div class="switch demo"><input type="checkbox" name="<?php echo $number+=1;?>"><label><i></i></label></div></td>
                            <td align="center" height="70px">Repas du Midi :<br><div class="switch demo"><input type="checkbox" name="<?php echo $number+=1;?>"><label><i></i></label></div></td>
                            <td align="center" height="70px">Repas du Midi :<br><div class="switch demo"><input type="checkbox" name="<?php echo $number+=1;?>"><label><i></i></label></div></td>
                            <td align="center" height="70px">Repas du Midi :<br><div class="switch demo"><input type="checkbox" name="<?php echo $number+=1;?>"><label><i></i></label></div></td>
                            <td align="center" height="70px">Repas du Midi :<br><div class="switch demo"><input type="checkbox" name="<?php echo $number+=1;?>"><label><i></i></label></div></td>
                        </tr>
                        <tr>
                            <td align="center" height="70px">après-midi :<br><div class="switch demo"><input type="checkbox" name="<?php echo $number+=1;?>"><label><i></i></label></div></td>
                            <td align="center" height="70px">après-midi :<br><div class="switch demo"><input type="checkbox" name="<?php echo $number+=1;?>"><label><i></i></label></div></td>
                            <td align="center" height="70px">après-midi :<br><div class="switch demo"><input type="checkbox" name="<?php echo $number+=1;?>"><label><i></i></label></div></td>
                            <td align="center" height="70px">après-midi :<br><div class="switch demo"><input type="checkbox" name="<?php echo $number+=1;?>"><label><i></i></label></div></td>
                            <td align="center" height="70px">après-midi :<br><div class="switch demo"><input type="checkbox" name="<?php echo $number+=1;?>"><label><i></i></label></div></td>
                            <td align="center" height="70px">après-midi :<br><div class="switch demo"><input type="checkbox" name="<?php echo $number+=1;?>"><label><i></i></label></div></td>
                            <td align="center" height="70px">après-midi :<br><div class="switch demo"><input type="checkbox" name="<?php echo $number+=1;?>"><label><i></i></label></div></td>
                        </tr>
                        <tr>
                            <td align="center" height="70px">Repas du soir :<br><div class="switch demo"><input type="checkbox" name="<?php echo $number+=1;?>"><label><i></i></label></div></td>
                            <td align="center" height="70px">Repas du soir :<br><div class="switch demo"><input type="checkbox" name="<?php echo $number+=1;?>"><label><i></i></label></div></td>
                            <td align="center" height="70px">Repas du soir :<br><div class="switch demo"><input type="checkbox" name="<?php echo $number+=1;?>"><label><i></i></label></div></td>
                            <td align="center" height="70px">Repas du soir :<br><div class="switch demo"><input type="checkbox" name="<?php echo $number+=1;?>"><label><i></i></label></div></td>
                            <td align="center" height="70px">Repas du soir :<br><div class="switch demo"><input type="checkbox" name="<?php echo $number+=1;?>"><label><i></i></label></div></td>
                            <td align="center" height="70px">Repas du soir :<br><div class="switch demo"><input type="checkbox" name="<?php echo $number+=1;?>"><label><i></i></label></div></td>
                            <td align="center" height="70px">Repas du soir :<br><div class="switch demo"><input type="checkbox" name="<?php echo $number+=1;?>"><label><i></i></label></div></td>
                        </tr>
                    </table>
                <input type="submit" value="Valider mes disponibilités">
                </center>
            </section>
        </div>
        <?php include("./include/footer.php"); ?>
    </body>
</html>