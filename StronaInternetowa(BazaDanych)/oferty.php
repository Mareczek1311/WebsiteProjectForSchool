<?php
session_start();

if(!isset($_SESSION['logged']))
{
  header('Location:ofertyoffline.php');

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
      <link rel="stylesheet" href="select.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
</head>


<body style='background-color:#eceff1'>

<div class="wrapper">
	<div class="header">

		<div class ="logo">
			  <img src="OluX.png" class="logo">
			<div style="clear:both;"></div>
		</div>
	</div>
	<div class="nav">
		<ol>
			<?php
			echo "<li><a href='konto.php'>Witaj ".$_SESSION['user']."</a></li>";?>
    <li><a href="index.php">Strona główna</a></li?>

			<li><a href="oferty.php" name='kategoria' value='0'>Ogłoszenia</a>
			<li><a href="tworzenieogloszenia.php">Zamieść Ogłoszenie</a></li?>
			<li><a href="kontakt.php">Kontakt</a></li?>
			<li><a href="wylogowanie.php">Wyloguj się</a></li?>

		</ol>



	</div>
<div style='background-color:white; color:black;width:350; height:800; position:absolute; margin-left:10%'>
  <form method="post">
    <br/>

    <a style='margin-left:20%; margin-top:5%;'>Filtry</a><br/><br/>

      </label>

            <label style='margin-left:20%'>Kategoria</label>
        <label class="select" for="slct" style='position:center;'>
        <select name='kategoria' id="slct" required="required">
          <option value="0" disabled="disabled" selected="selected">Wybierz kategorie:</option>
          <option value="Motoryzacja">Motoryzacja</option>
          <option value="Dom">Dom</option>
          <option value="RTV AGD">RTV AGD</option>
          <option value="Akcesoria dla zwierząt">Akcesoria dla zwierząt</option>
          <option value="Rolnictwo">Rolnictwo</option>
          <option value="Ogród">Ogród</option>
          <option value="Nieruchomości">Nieruchomości</option>
          <option value="Budownictwo">Budownictwo</option>
        </select>
        <svg>
          <use xlink:href="#select-arrow-down"></use>
        </svg>
      </label>
      <!-- SVG Sprites-->
      <svg class="sprites">
        <symbol id="select-arrow-down" viewbox="0 0 10 6">
          <polyline points="1 1 5 5 9 1"></polyline>
        </symbol>
      </svg>
    <br/><br/><a style='margin-left:20%; margin-top:5%;'>Cena (zł)</a><br/>
    <input type='number' style='border-color:#aaaaaa ;background-color:#ffffff; color:black; height: 50px;margin-left:20%;margin-top:5%;' placeholder="Do" name='do'>
  <input type='text' style='border-color:#aaaaaa ;background-color:#ffffff; color:black; height: 50px;margin-left:20%;margin-top:5%;' placeholder="czego szukasz?" name='wyszukaj'>
  <input type='submit' style='font-family:"Lato", sans-serif; border:0; text-align:center; width:85;height:40;background-color:#87cefa; color:white; margin-left:30%;margin-top:5%;' value="Wyszukaj">

</div>
	<?php
	error_reporting(0);
	require_once "connectt.php";
	$connect = @new mysqli($host, $db_user, $db_password, $db_name);

	if($connect->connect_errno!=0)
	{
		echo "Error:".$connect->connect_errno."Opis: ".$connect->connect_errno;
	}
	else{
			$result = @$connect->query(sprintf("DELETE FROM ogloszenia WHERE ilosc == 0"));
		if(isset($_POST['wyszukaj']))
		{
			$wyszukaj = $_POST['wyszukaj'];
      $do = $_POST['do'];
      $kategoria = $_POST['kategoria'];
			if($wyszukaj == '' && $do=='' && $kategoria == '')
			{
				$result = @$connect->query(sprintf("SELECT * FROM ogloszenia"));
			}
      else if($wyszukaj == '' && $do!='' && $kategoria=='')
      {
        $result = @$connect->query(sprintf("SELECT * FROM ogloszenia WHERE cena < '$do'"));
      }
      else if($wyszukaj != '' && $do=='' && $kategoria=='')
      {
        $result = @$connect->query(sprintf("SELECT * FROM ogloszenia WHERE nazwaogl = '$wyszukaj'"));
      }
      else if($wyszukaj == '' && $do=='' && $kategoria!='')
      {
        $result = @$connect->query(sprintf("SELECT * FROM ogloszenia WHERE kategoria = '$kategoria'"));
      }
      else if($wyszukaj != '' && $do!='' && $kategoria!='')
      {
        $result = @$connect->query(sprintf("SELECT * FROM ogloszenia WHERE nazwaogl = '$wyszukaj' AND cena < '$do' AND kategoria = '$kategoria'"));
      }
      else if($wyszukaj == '' && $do!='' && $kategoria!='')
      {
        $result = @$connect->query(sprintf("SELECT * FROM ogloszenia WHERE cena < '$do' AND kategoria = '$kategoria'"));
      }
      else if($wyszukaj != '' && $do=='' && $kategoria!='')
      {
        $result = @$connect->query(sprintf("SELECT * FROM ogloszenia WHERE nazwaogl = '$wyszukaj' AND kategoria = '$kategoria'"));
      }
      else if($wyszukaj != '' && $do!='' && $kategoria=='')
      {
        $result = @$connect->query(sprintf("SELECT * FROM ogloszenia WHERE nazwaogl = '$wyszukaj' AND cena < '$do'"));
      }
      echo "<table style='color:black; margin-left:30%;'>";
    while($row = mysqli_fetch_array($result)){
      echo "<tr style='position:relative;background-color:white;'><td><img style='position:relative; height:147px; width:188px; margin-right=0%;' class='box_image' src = uploads/".$row['image']." alt=".$_SESSION['newfilename']."></td><td style='width:500px;'><p style='margin-top:-40; margin-left:10' name='ogloszenie'><b>" . $row['nazwaogl'] . "</b><br/>od <b style='font-size=20;'>".$row['sprzedawca']."</b><br/><br/> Cena: <b style='font-size:20'>".$row['cena']." zł</b><br/><a      href='Zamowienie.php?id=".$row['id']."' style='text-decoration:none; color:black; font-size:24;'>Kup</a></p></td></tr>";
    }
    echo "</table>";

  }
  else
    {
      echo "<form method='post'>";

      $result = @$connect->query(sprintf("SELECT * FROM ogloszenia"));
      echo "<table style='color:black; margin-left:30%;'>";
      while($row = mysqli_fetch_array($result)){


      echo "<tr style='position:relative;background-color:white;'><td><img style='position:relative; height:147px; width:188px; margin-right=0%;' class='box_image' src = uploads/".$row['image']." alt=".$_SESSION['newfilename']."></td><td style='width:500px;'><p style='margin-top:-40; margin-left:10' name='ogloszenie'><b>" . $row['nazwaogl'] . "</b><br/>od <b style='font-size=20;'>".$row['sprzedawca']."</b><br/><br/> Cena: <b style='font-size:20'>".$row['cena']." zł</b><br/><a      href='Zamowienie.php?id=".$row['id']."' style='text-decoration:none; color:black; font-size:24;'>Kup</a></p></td></tr>";
      }
      echo "</table>";

    }
$connect->close();
	}

	?>
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
