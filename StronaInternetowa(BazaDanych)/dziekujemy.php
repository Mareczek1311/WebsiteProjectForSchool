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
		<ol>	<?php if((isset($_SESSION['logged'])))
			{
				if($_SESSION['logged'] ==true)
				{

					echo "<li><a href='konto.php'>Witaj ".$_SESSION['user']."</a></li>";
				}
			}?>
    <li><a href="index.php">Strona główna</a></li>
      <li><a href="onas.php">O nas</a></li>
			<li><a href="oferty.php">Ogłoszenia</a>

        <?php if(!isset($_SESSION['logged']))
        {

			       echo  "<li><a href='Logowanie.php'>Zamieść Ogłoszenie</a></li?>";
       		}
          else
            {
              echo  "<li><a href='tworzenieogloszenia.php'>Zamieść Ogłoszenie</a></li?>";
            }
            ?>
			<li><a href="kontakt.php">Kontakt</a></li?>
				<?php if(!isset($_SESSION['logged']))
				{

						echo "<li><a href='Logowanie.php'>Zaloguj się</a></li?>";
						echo "<li><a href='Rejestracja.php'>Zarejestruj sie</a></li?>";

				}
        else{
          		echo	"<li><a href='wylogowanie.php'>Wyloguj się</a></li?>";
        }
				?>
		</ol>



	</div>

	<div class="content" ></div>
<h1 style='text-align:center;'>Dziękujemy za zakup!</h1>
<a href='index.php' style='margin-left:40%; text-decoration:none; font-size:32; color:white;'>Przejdź do strony głównej</a>

</div class="socials">
	<div class="socialdivs">
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
		</div>
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
