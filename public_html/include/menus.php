<nav class="sidebar">
<!-- Menus.php -->
  <ul>
      <li><a href="index.php">Accueil</a></li>
        <?php
        if ($_SESSION['typeCompte']=='Admin'){
            echo '
                <li><a href="index.php?entite=compte&action=R">Consulter les comptes</a></li>
                <li><a href="index.php?entite=benevole&action=R">Consulter les bénévoles</a></li>                
                <li><a href="index.php?entite=chantier&action=C">Dispos bénévoles chantier</a></li>
                <li><a href="index.php?entite=compte&action=R">Dispo festival</a></li>

    
                ';
        }
        elseif ($_SESSION['typeCompte']=='Membre'){
            echo '
                <li><a href="index.php?entite=chantier&action=C">Renseigner mes disponibilités</a></li>
            ';
        }

        ?>


      <?php
      if (isset($_COOKIE['rememberMe']))
          echo ("<li><a href=\"index.php?entite=detruireCookie\">Ne plus se souvenir de moi</a></li>");
      ?>
    <br><br><br><li><a href="index.php?entite=deconnexion">Déconnexion</a></li>

  </ul>
</nav>
