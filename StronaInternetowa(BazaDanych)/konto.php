<?php
session_start();
if(!isset($_SESSION['logged']))
{
  header('Location:index.php');
  exit();
}
?>
<html lang="pl">
<head>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />

	<title> Ogłoszenia - sprzedam, kupię, zamienię </title>

	<meta name="description" content=" Strona z najróżiejszymi ofertami od wielu sprzedawców internetowych w Polsce"/>
	<meta name="keywords" content=" rtv, agd, elektronika, częśći, kosmetyki, motoryzacja, ogrodnictwo, nieruchomości, usługi, zwierzęta" />
	<link rel="stylesheet" href="style.css" type ="text/css" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
</head>


<body>

<div class="wrapper">
	<div class="header">

		<div class ="logo">
			<span style="color:#87CEFA">Olu</span>X.com
			<div style="clear:both;"></div>
		</div>
	</div>
	<div class="nav">
		<ol>
			<?php
			echo "<li><a href='konto.php'>Witaj ".$_SESSION['user']."</a></li>";?>
    <li><a href="index.php">Strona główna</a></li?>
			<li><a href="oferty.php">Ogłoszenia</a>

			<li><a href="tworzenieogloszenia.php">Zamieść Ogłoszenie</a></li?>
			<li><a href="kontakt.php">Kontakt</a></li?>
			<li><a href="wylogowanie.php">Wyloguj się</a></li?>

		</ol>



	</div>
<div>
	<?php
	echo "<h1 style='text-align:center'>Konto: ".$_SESSION['user']."</h1>";
  echo "<div style='margin-left:5%'>";
  echo "<a style = 'font-size:28'>Dane konta</a></br>";
	echo "<a>Nazwa użytkownika: ".$_SESSION['user']."</a></br>";
	echo "<a>Imię: ".$_SESSION['imie']."</a></br>";
	echo "<a>Nazwisko: ".$_SESSION['nazwisko']."</a></br>";
	echo "<a>Numer telefonu: ".$_SESSION['numer']."</a></br>";
	echo "<a>Adres: ".$_SESSION['adres']."</a></br></br>";

	?>
  <a style = 'font-size:28'>Ustawienia konta</a></br>
  <a style='text-decoration:none; color:white' href='zmianahasla.php'>Zmiana hasła</a></br>
  <a href='zmianaadresu.php' style='text-decoration:none; color:white'>Zmiana adresu</a>
</div>
<?php
echo "<form method='post'>";
require_once "connectt.php";
$user = $_SESSION['user'];
$connect = @new mysqli($host, $db_user, $db_password, $db_name);
$result = @$connect->query(sprintf("SELECT * FROM ogloszenia WHERE sprzedawca = '$user'"));
echo "<table style='color:black; margin-left:5%; position:fixed'></br></br>";
echo "<a style='font-size:32; margin-left:5%'>Twoje ogłoszenia: </a>";
while($row = mysqli_fetch_array($result)){
echo "<tr style='position:relative;background-color:white;'><td><img style='position:relative; height:147px; width:188px; margin-right=0%;' class='box_image' src = uploads/".$row['image']." ></td><td style='width:500px;'><p style='margin-top:-40; margin-left:10' name='ogloszenie'><b>" . $row['nazwaogl'] . "</b><br/>od <b style='font-size=20;'>".$row['sprzedawca']."</b><br/><br/> Cena: <b style='font-size:20'>".$row['cena']." zł</b><br/><a      href='edycja.php?id=".$row['id']."& nazwaogl=".$row['nazwaogl']."& opis=".$row['opis']."& kontakt=".$row['telefon']."& cena=".$row['cena']."' style='text-decoration:none; color:black; font-size:24;'>Edytuj</a></p></td></tr>";
}
echo "</table>";
echo "<div style='margin-left:50%';margin-bottom:5%>";
echo "<a style='font-size:32; margin-left:-1%;'>Twoje zamówienia: </a>";
echo "<table style='color:black;'></br></br>";
$zakupione = @$connect->query(sprintf("SELECT * FROM zamowienia WHERE nazwauzytkownika = '$user'"));

while($row = mysqli_fetch_array($zakupione)){
echo "<tr style='background-color:white;position:fixed ; '><td><b>Nr. zamówienia: </b>".$row['id']." |  <b>Nazwa ogłoszenia</b>:  " . $row['nazwaogl'] . "<br/></td></tr>";

}
echo "</table>";
echo "</div>";

?>


</div>

</div class="socials">
<footer>
	<div style='background-color:black; text-align:center;position:bottom; position:static;'>
    <style>
    footer {
    position: fixed;
    width:100%;
    bottom: 0;
    }
    </style>
    <footer style='text-align:center; background-color:black;'>Wykonawca:
              Marek Kretkowski
              25.03.2021</footer>
		<div style="clear:both"></div>
		</div>
  </footer>
	</div>
</div>
<script type="text/javascript" src="jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    var NavY = $('.nav').offset().top;

    var stickyNav = function(){
    var ScrollY = $(window).scrollTop();

    if (ScrollY > NavY) {
        $('.nav').addClass('sticky');
    } else {
        $('.nav').removeClass('sticky');
    }
    };

    stickyNav();

    $(window).scroll(function() {
        stickyNav();
    });
    });
</script>

</body>
</html>
