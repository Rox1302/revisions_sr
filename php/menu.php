<ul class="menu">
  <li>
      <a href="./accueil">Accueil</a>
  </li>
  <li>
    <a href="#definition">Définition</a>
  </li>
  <li class="li_compte" style="float:right">
    <?php
      if(!isset($_SESSION["pseudo"]))
      {
        ?>
          <a href="./connection">Connection</a>
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
