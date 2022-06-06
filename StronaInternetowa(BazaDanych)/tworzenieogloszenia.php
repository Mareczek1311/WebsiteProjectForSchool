
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <title> Formularz do rejestracji </title>
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

                <h1> Ogłoszenie</h1>
                </div>
                <form method="post" action='systemtworzeniaogloszenia.php' enctype="multipart/form-data">
                  <div class="wrap2">
                  <label>Nazwa ogloszenia</label>
                  <input type="text" name='nazwaogl'>
                  <span class="focus-input"></span>
              </div>
              <div class="wrap2">
              <label>Opis</label>
              <input type="text" name='opis'>
              <span class="focus-input"></span>
          </div>
              <div class="wrap2">
              <label>Cena</label>
              <input type="text" name='cena'>
              <span class="focus-input2"></span>
          </div>

                <div class="wrap2">
                    <label>Numer telefonu</label>
                    <input type="text" name='kontakt'>
                    <span class="focus-input2"></span>
                </div>
                <div class="wrap2">
                    <label>Adres zamieszkania</label>
                    <input type="text" name='adres'>
                    <span class="focus-input2"></span>

                </div>
                <label>Stan</label>
                <label class="select" for="slct">
    <select name='stan' id="slct" required="required">
      <option value="0" disabled="disabled" selected="selected">Stan:</option>
      <option value="Nowy">Nowy</option>
      <option value="Używany">Używany</option>

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
        <label>Kategoria</label>
                <label class="select" for="slct">
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

                <input class='btn' type="file" name="file" placeholder='Zdjęcie'>
                <input class='btn' type="submit" name="submit"></input>

                </div>
              </form>
                <div class="image">
                    <img src="blue.jpg" class="img" alt=""/>
                </div>
            </div>
      </body>
</html>
