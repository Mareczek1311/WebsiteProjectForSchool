<?php
session_start();
?>
<html lang="pl">
<head>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />

	<title> Ogłoszenia - sprzedam, kupię, zamienię </title>

	<meta name="description" content=" Strona z najróżiejszymi ofertami od wielu sprzedawców internetowych w Polsce"/>
	<meta name="keywords" content=" rtv, agd, elektronika, częśći, kosmetyki, motoryzacja, ogrodnictwo, nieruchomości, usługi, zwierzęta" />
	<link rel="stylesheet" href="style.css" type ="text/css" />
	<link rel="stylesheet" href="styleInputs.css" type ="text/css" />
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
    <li><a href="index.php">Strona główna</a></li?>
			<li><a href="oferty.php">Ogłoszenia</a>
				<ul>
					<li><a href="a">Dla niej</li>
					<li><a href="a">Dla niego</li>
					<li><a href="a">Dla dziecka</li>
					<li><a href="a">Motoryzacja</li>
					<li><a href="a">Dom</li>
					<li><a href="a">RTV AGD</li>
					<li><a href="a">Elektronika</li>
					<li><a href="a">Zwierzęta</li>
					<li><a href="a">Rolnictwo</li>
					<li><a href="a">Ogród</li>
					<li><a href="a">Nieruchomości</li>
					<li><a href="a">Budownictwo</li>




				</ul>
				<li><a href="#">Zamieść Ogłoszenie</a></li?>
				<li><a href="kontakt.php">Kontakt</a></li?>

		</ol>



	</div>

	<div class="content"></div>

</div>
<div class="box">

  <h1>Zgłoszenie</h1>
	<form action='send.php' method="POST">
  <input type="text" name="email" placeholder="Email">
	<input type="text" name="temat" placeholder="Temat">
  <input type="text" name="opis" placeholder="Opis">
  <input type="submit" name="submit" value="Wyślij">
</div>
<div style='position:absolute; margin-top:2%; font-size:32'>
<a style=' margin-left:25%'>Kontakt</a><br/><br/>
<a>Telefon: 123 123 123</a><br/>
<a>E-mail: olux@gmail.com</a><br/>
<a>Adres: Wyspiańskiego 4, 87-700 <br/> Aleksandrów Kujawski</a>

</div>

<script type="text/javascript" src="jquery-3.6.0.min.js"></script>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27244.95478866043!2d18.676277212660743!3d52.873955700837726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x37a84eca9fd13a47!2zWmVzcMOzxYIgU3prw7PFgiBOciAx!5e0!3m2!1spl!2spl!4v1616895864710!5m2!1spl!2spl" width="100%" height="600" style="border:0; margin-top:30%" allowfullscreen="" loading="fast"></iframe>

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
