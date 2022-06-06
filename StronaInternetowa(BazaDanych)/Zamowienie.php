<?php
session_start();
$id = $_GET['id'];
if(!isset($_SESSION['logged']))
{
  header('index.php');

}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <title> Zamówienie </title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styleR.css">
    <link rel="stylesheet" href="styleHeader.css" type ="text/css" />
</head>
<body>
  <div class="wrapper">
  	<div class="header">


  	</div>
    <div class="nav">
      <ol>

        <li><a href="index.php">Strona główna</a></li?>
			<li><a href="oferty.php">Ogłoszenia</a>

      </ol>



    </div>
    <div class="container">
        <div class="form">
            <div class="heading">
                <img src="OluX.png" class="logo">
                <h1> Zamówienie</h1>
                </div>
                <form method="post">
                  <?php

                  require_once "connectt.php";
                  $connect = @new mysqli($host, $db_user, $db_password, $db_name);
                  $result = @$connect->query(sprintf("SELECT * FROM ogloszenia WHERE id = '$id'"));
                  $wiersz = $result->fetch_assoc();
                  echo "<a style>Nazwa zamówienia: </a><a style='font-size:24'> " .$wiersz['nazwaogl']."</a>";



                  ?>
                  <label style='font-size:24'>Dane do wysyłki</label>

                <div class="wrap">

                  <div class="f1">
                    <label>Imię</label>
                    <?php echo "<input type='text' value = '".$_SESSION['imie']."' name ='imie'/>"; ?>
                    <span class="focus-input"></span>
                </div>
                <div class="f2">
                    <label>Nazwisko</label>
                    <?php echo "<input type='text' value = '".$_SESSION['nazwisko']."' name ='nazwisko'/>"; ?>
                    <span class="focus-input"></span>
                </div>
              </div>

                <div class="wrap2">
                    <label>Numer telefonu</label>
                      <?php echo "<input type='text' value = '".$_SESSION['numer']."' name ='telefon'/>"; ?>
                    <span class="focus-input2"></span>
                </div>
                <div class="wrap2">
                    <label>Adres zamieszkania</label>
                      <?php echo "<input type='text' value = '".$_SESSION['adres']."' name ='adres'/>"; ?>
                    <span class="focus-input2"></span>
                </div>
                <b>Płatności dokonywane są TYLKO za pobraniem</b><br/>
                <button class="btn">Zamów</button>

                </div>
              </form>
                <div class="image">
                    <img src="blue.jpg" class="img" alt=""/>
                </div>
            </div>
            <?php

            if(isset($_POST['adres']))
            {
              $adres = $_POST['adres'];
              $telefon = $_POST['telefon'];
              $imie = $_POST['imie'];
              $nazwisko = $_POST['nazwisko'];
              $result = @$connect->query(sprintf("INSERT INTO zamowienia (`imie`, `nazwisko`,`nazwauzytkownika`, `nazwaogl`, `adres`, `telefon`) VALUES ('$imie', '$nazwisko','".$_SESSION['user']."','".$wiersz['nazwaogl']."', '$adres', '$telefon')"));
              $result = @$connect->query(sprintf("DELETE FROM ogloszenia WHERE id='$id'"));
              header('Location:dziekujemy.php');

            }

            ?>
      </body>
</html>
