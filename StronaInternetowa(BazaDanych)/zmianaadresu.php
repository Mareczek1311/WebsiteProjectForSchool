<?php
session_start();
if(!isset($_SESSION['logged']))
{
  header('Location:index.php');

}

?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Zmiana hasła </title>
    <link rel="stylesheet" href="stylesL.css">
    	<link rel="stylesheet" href="style.css" type ="text/css" />
  </head>
  <body>


<div class="box">
  <h1>Zmiana adresu</h1>
  <form method="post">
  <input type="text" name="adres" placeholder="Nowy adres">
  <input type="submit" name="Submit" value="Zmień adres">
</form>
</div>
<div class="nav">
  <ol>

    <li><a href="index.php">Strona główna</a></li?>
			<li><a href="oferty.php">Ogłoszenia</a>

      <li><a href="Logowanie.php">Zamieść Ogłoszenie</a></li?>
			<li><a href="kontakt.php">Kontakt</a></li?>

  </ol>



</div>
  </body>
  <?php
  if((isset($_POST['adres'])))
  {


  $isReady=true;
  $adres = $_POST['adres'];
  if((strlen($adres)<4) || (strlen($adres)> 20))
  {
    $isReady=false;
  }


if($isReady==true)
{

    require_once "connectt.php";
    $connect = @new mysqli($host, $db_user, $db_password, $db_name);
    $connect->query("UPDATE uzytkownicy SET adres = '$adres' where user='".$_SESSION['user']."'");
    header("Location:konto.php");

}
else
  {
    header("Location:zmianaadresu.php");
  }
}
  ?>
</html>
