<?php
  session_start();
  include './php/PDO.php';
  include './php/cookieconnect.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/master.css">
    <title>Système et réseaux</title>
  </head>

  <header>
    <?php include './php/menu.php' ?>
  </header>

  <body>
    <?php
    if(isset($_GET["page"]))
    {
      switch ($_GET["page"])
      {
        case 'connection':
          include("./php/connection.php");
          break;

        case 'accueil':
          include("./php/accueil.php");
          break;

        default:
          # code...
          break;
      }
    }
    ?>

  </body>
</html>
