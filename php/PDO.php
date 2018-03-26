<?php

  setlocale(LC_TIME, 'fr_FR', 'french', 'fre', 'fra');

  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=revision_sr;charset=utf8','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  }
  catch(Exception $e)
  {
    die('Erreur : ' .$e->getMessage());
  }
?>
