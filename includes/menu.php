<ul class="menu">
  <li>
    <a href="#home">Accueil</a>
  </li>
  <li>
    <a href="#definition">Définition</a>
  </li>
  <li class="li_compte" style="float:right">
    <?php
      if(!isset($_SESSION["pseudo"]))
      {
        ?>
        <a href="./php/connexion.php">Connexion</a>
        <?php
      }
      else
      {
        ?>
        <a href="#compte">Compte</a>
        <ul class="menu_compte">
          <li class="li_menu_li">
            <a href="./php/deconnexion.php">Déconnexion</a>
          </li>
        </ul>
        <?php
      }
     ?>
  </li>
</ul>
