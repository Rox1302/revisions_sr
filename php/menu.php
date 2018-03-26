<ul class="menu">
  <li>
    <form class="" action="" method="post">
      <a href="./accueil">Accueil</a>
    </form>
  </li>
  <li>
    <a href="#definition">Définition</a>
  </li>
  <li class="li_compte" style="float:right">
    <?php
      if(!isset($_SESSION["pseudo"]))
      {
        ?>
        <form class="" action="" method="post">
          <a href="./connection">Connection</a>
        </form>
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
