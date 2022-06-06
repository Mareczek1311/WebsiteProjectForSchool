<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Zaloguj sie </title>
    <link rel="stylesheet" href="stylesL.css">
    	<link rel="stylesheet" href="style.css" type ="text/css" />
  </head>
  <body>


<div class="box">
  <h1>Logowanie</h1>
  <form  action="systemLogowania.php" method="post">
  <input type="text" name="login" placeholder="Login">
  <input type="password" name="password" placeholder="Hasło">
  <a style='text-decoration:none; color:black'>Nie masz jeszcze konta? </a><a style='text-decoration:none; color:black' href='Rejestracja.php'>Zarejestruj się!</a>
  <input type="submit" name="Submit" value="Zaloguj się">
</form>
</div>
<div class="nav">
  <ol>

    <li><a href="index.php">Strona główna</a></li?>
			<li><a href="oferty.php">Ogłoszenia</a>

      <li><a href="Logowanie.php">Zamieść Ogłoszenie</a></li?>
			<li><a href="kontakt.php">Kontakt</a></li?>
			<li><a href="Rejestracja.php">Zarejestruj sie</a></li?>
  </ol>



</div>
  </body>
</html>
