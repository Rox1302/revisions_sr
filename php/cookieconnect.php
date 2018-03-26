<?php
  include 'PDO.php';
  //echo "le cookie authentification a été créé aves succès. <br /><br />   ";
  if(isset($_COOKIE['authentification']))
  {
    $authentification = $_COOKIE['authentification'];
    $authentification = explode('--------', $authentification); // Séparation du pseudo et du random

    $get_pseudo = $authentification[0]; // pseudo du cookie
    $key_exist = $authentification[1]; // Deuxième partie du cookie

    //echo $get_pseudo;

  	$query = $bdd->prepare('SELECT * FROM user WHERE pseudo = ?');
  	$query->execute(array($get_pseudo));
  	$userinfo = $query->fetch();
    //var_dump($userinfo);

    $key = sha1($userinfo['random'].$_SERVER['REMOTE_ADDR']); // Deuxième partie théorique du cookie du cookie

    /*echo "cookie connect : <br/>";
    var_dump($_COOKIE["authentification"]);
    echo "<br />";*/

    if ($key == $key_exist)
    {
      $temps=365*24*3600;
      setcookie("authentification",$get_pseudo.'--------'.sha1($userinfo['random'].$_SERVER['REMOTE_ADDR']),time()+ $temps, '/', null, false, true);
      //var_dump($userinfo);
      //var_dump($authentification);

      // Création de la Session avec le pseudo correspondant au cookie présent dans le navigateur
      $_SESSION['pseudo'] = $get_pseudo;
    }
  }
?>
