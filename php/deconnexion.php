<?php
session_start();

$_SESSION = array();
if (isset ($_COOKIE['authentification'])) // Si jamais l'utilisateur n'a pas cocher "se souvenir de moi"
{
  setcookie("authentification", '' ,time() - 3600, '/', null, false, true);
}

session_destroy();
header("Location: ../index.php");
?>
