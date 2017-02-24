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
                <center>
                    <?php
                    if (isset($message))
                        echo '<h1>'.$message.'</h1>';
                    ?>
                    <form method="post" action="index.php?entite=classe&action=C">
                        <table border="2">
                           <tr><th>ecole : </th><td><input type="text" name="ecole" maxlength="25"></td></tr>
                           <tr><th>prenom du professeur : </th><td><input type="text" name="prenomProf" maxlength="20"></td></tr>
                           <tr><th>nom du professeur : </th><td><input type="text" name="nomProf" maxlength="20"></td></tr>
                           <tr><th>id Tournoi : </th><td>
                               <select name="idTournoi">
<!--                                   <option value="0">Veuillez sélectionner un tournoi</option>-->
                                   <?php
                                   if (isset($vListeTournois) && count($vListeTournois) >= 1) {
                                       foreach ($vListeTournois as $trn) {
                                           $val=$trn->idTournoi.' '.$trn->date.' '.$trn->lieu;
                                           echo '<option value="'.$trn->idTournoi.'">'.$val.'</option>';
                                       }
                                   }
                                   ?>
                               </select></td></tr>
                           <tr><th>id Compte : </th><td>
                               <select name="idCompte">
<!--                                   <option value="0">Veuillez sélectionner un compte</option>-->
                                   <?php
                                   if (isset($vListeComptes) && count($vListeComptes) >= 1) {
                                       foreach ($vListeComptes as $cpt) {
                                           $val=$cpt->idCompte.' '.$cpt->pseudo.' '.$cpt->mail;
                                           echo '<option value="'.$cpt->idCompte.'">'.$val.'</option>';
                                       }
                                   }
                                   ?>
                               </select>
                           </td></tr>
                        </table>
                        <input name="Valider" value="Valider" type="submit">
                    </form>

                </center>
            </section>
        </div>
        <?php include("./include/footer.php"); ?>
    </body>
</html>