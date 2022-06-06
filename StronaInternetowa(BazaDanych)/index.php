
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

	<div class="content">
<ol style='background-color:white; margin-left:6%;color:black;'>
  <li value='1' style='text-align:center'>Wiosna z dzieckiem</li>
  <li value='1' style='text-align:center'>Buduj  i remontuj</li>
  <li value='1' style='text-align:center'>Wypoczywaj</li>
  <li value='1' style='text-align:center'>Wymieniaj</li>
</ol>
<style>
section {
  position: relative;
}

section img {
  position: absolute;
}
.top {
  animation-name: fade;
  animation-timing-function: ease-in-out;
  animation-iteration-count: infinite;
  animation-duration: 7s;
  animation-direction: alternate;
}

@keyframes fade {
  0% {
    opacity: 1;
  }
  25% {
    opacity: 1;
  }
  75% {
    opacity: 0;
  }
  100% {
    opacity: 0;
  }
}
</style>
<section>
  <img class="bottom" src="asd.png" />
  <img class="top" src="asdd.png" />

</section>

  </div>

  <a href="oferty.php?Dom"><img style='display: block; margin-left: auto;margin-right: auto; margin-top:15%;' src="asdddd.png"/></a>
  <a href="oferty.php?Ogród"><img style='display: block; margin-left: auto;margin-right: auto; margin-top:1%;' src="asddd.png"/></a>
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
		<div style="clear:both"></div>
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
