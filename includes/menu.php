<ul class="menu">
  <li>
    <a href="#home">Accueil</a>
  </li>
  <li>
    <a href="#definition">Définition</a>
  </li>
  <li style="float:right">
    <?php
      if(!isset($_SESSION["pseudo"]))
      {
        ?>
        <a href="./php/connection.php">Connection</a>
        <?php
      }
      else
      {
        ?>
        <a href="#compte">Compte</a>
        <?php
      }
     ?>
  </li>
</ul>
