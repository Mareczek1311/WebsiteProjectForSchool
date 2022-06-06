<?php
session_start();
if(!isset($_SESSION['logged']))
{
  header('Location:index.php');
  exit();
}
$id = $_GET['id'];
$nazwaogl = $_GET['nazwaogl'];
$opis = $_GET['opis'];
$kontakt = $_GET['kontakt'];
$cena = $_GET['cena'];
?>
<?php
	require_once "connectt.php";
  $c = @new mysqli($host, $db_user, $db_password, $db_name);
  if(isset($_POST['submit']))
  {
    $nazwaogll = $_POST['nazwaogll'];
    $opiss = $_POST['opiss'];
    $cenaa = $_POST['cenaa'];
    $kontaktt = $_POST['kontaktt'];
    $oferty = @$c->query(sprintf("UPDATE ogloszenia SET nazwaogl ='$nazwaogll', opis = '$opiss', cena = '$cenaa', telefon = '$kontaktt' WHERE id ='$id'"));
    header("Location:konto.php");

  }
  if(isset($_POST['delete']))
  {

    $result = @$c->query(sprintf("DELETE FROM ogloszenia WHERE nazwaogl='$nazwaogl'"));
    header("location:konto.php");

  }
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <title> Edycja ogłoszenia </title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styleR.css">
    <link rel="stylesheet" href="select.css">
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
    			<li><a href="kontakt.php">Kontakt</a></li?>
			<li><a href="wylogowanie.php">Wyloguj się</a></li?>
      </ol>



    </div>
    <div class="container">
        <div class="form">
            <div class="heading" style='margin-top:8%;'>

                <h1> Ogłoszenie - edycja</h1>
                </div>
                <form method="post">
                  <div class="wrap2">
                  <label>Nazwa ogloszenia</label>
            <?php echo "<input type='text' name='nazwaogll' value='$nazwaogl'>"; ?>
                  <span class="focus-input"></span>
              </div>
              <div class="wrap2">
              <label>Opis</label>
                   <?php  echo "<input type='text' name='opiss' value='$opis'>"; ?>
              <span class="focus-input"></span>
          </div>
              <div class="wrap2">
              <label>Cena</label>
            <?php  echo "<input type='text' name='cenaa' value='$cena'>"; ?>
              <span class="focus-input2"></span>
          </div>

                <div class="wrap2">
                    <label>Numer telefonu</label>
                <?php  echo "<input type='text' name='kontaktt' value='$kontakt'>"; ?>
                    <span class="focus-input2"></span>
                </div>
                <input class='btn' style='color:red' type="submit" name="delete" value='Delete'></input>
                <input class='btn' type="submit" name="submit" value='Zmień'></input>

                </div>
              </form>


                <div class="image">
                    <img src="blue.jpg" class="img" alt=""/>
                </div>
            </div>
      </body>
</html>
