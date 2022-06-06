<?php
session_start();
if(!isset($_SESSION['logged']))
{
 header('location:index.php');

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
  <h1>Zmiana hasła</h1>
  <form method="post">
  <input type="password" name="password1" placeholder="Hasło">
  <input type="password" name="password2" placeholder="Powtórz hasło">
  <input type="submit" name="Submit" value="Zmień hasło">
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

if(isset($_POST['password1']) || (isset($_POST['password2'])))
  {
  $isReady=true;
  $password1 = $_POST['password1'];
  $password2 = $_POST['password2'];
  if((strlen($password1)<4) || (strlen($password1)> 14))
  {
    $isReady=false;
  }
if($password1 != $password2)
{
  $isReady=false;
}

if($isReady==true)
{

    require_once "connectt.php";
    $connect = @new mysqli($host, $db_user, $db_password, $db_name);
    $haslohash = password_hash($password1, PASSWORD_DEFAULT);
    if($connect->query("UPDATE uzytkownicy SET pass = '$haslohash' where user='".$_SESSION['user']."'"))
    {
    header('location:konto.php');
  }
}
else
  {
    header("Location:zmianahasla.php");
  }
}
  ?>
</html>
