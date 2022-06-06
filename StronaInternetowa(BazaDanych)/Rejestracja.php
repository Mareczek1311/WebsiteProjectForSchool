
<?php
session_start();

if(isset($_POST['email']))
{
  $isReady=true;

  $nickname = $_POST['nick'];

  if((strlen($nickname)<3) || (strlen($nickname)> 20))
  {
    $isReady=false;
    $_SESSION['error_nick']="Nazwa użytkownika musi mieć od 4 do 20 znaków";

  }

  if(ctype_alnum($nickname)==false)
  {
    $isReady=false;
    $_SESSION['error_nick'] = "Zła nazwa użytkownika";
  }

  $email = $_POST['email'];
  $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

  if((filter_var($emailB,FILTER_SANITIZE_EMAIL)==false)|| ($emailB!=$email))
  {
    $isReady=false;
    $_SESSION['error_email']="Podano zły email";
  }

  $password = $_POST['password'];

  $adres = $_POST['adres'];
  if((strlen($adres) == 0))
  {
    $isReady = false;
    $_SESSION['error_adres']="Podano zły adres";
  }
  $imie = $_POST['imie'];
  $nazwisko = $_POST['nazwisko'];
if((strlen($imie)) < 3 || (strlen($imie)>20))
{
  $isReady=false;
  $_SESSION['error_imie']="Imie musi miec od 3 do 20 znaków";
}
if((strlen($nazwisko)<3) || (strlen($nazwisko)> 20))
{
  $isReady=false;
  $_SESSION['error_nazwisko']="Nazwisko musi mieć od 3 do 20 znaków";

}

if((strlen($password) < 5 || (strlen($password)>14)))
{
  $_SESSION['error_haslo']="Hasło musi mieć od 5 do 14 znaków";

}

  $password_hash = password_hash($password, PASSWORD_DEFAULT);

  $numer = $_POST['telefon'];
  $numer = str_replace(' ', '', $numer);
  if((strlen($numer)<9) || (strlen($numer) >9))
  {
    $isReady=false;
    $_SESSION['error_kontakt']="Podano zły numer telefonu";
  }

  require_once "connectt.php";
  mysqli_report(MYSQLI_REPORT_STRICT);
  try{
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
    if($connect->connect_errno!=0)
    {
      throw new Exception(mysqli_connect_errno());
    }
    else{

      $result = $connect->query("SELECT id FROM uzytkownicy WHERE email ='$email'");

      if(!$result) throw new Exception($connect->error);

      $emailCounter = $result->num_rows;
      if($emailCounter > 0)
      {
        $isReady=false;
        $_SESSION['error_email']="Podany email jest już użyty";
      }

      $result = $connect->query("SELECT id FROM uzytkownicy WHERE user ='$nickname'");

      if(!$result) throw new Exception($connect->error);

      $nicknameCounter = $result->num_rows;
      if($nicknameCounter > 0)
      {
        $isReady=false;
        $_SESSION['error_nick']="Podana nazwa użytkownika jest zajęta";
      }

      if($isReady == true)
      {
        if($connect->query("INSERT INTO uzytkownicy VALUES (NULL, '$nickname', '$password_hash', '$email','$adres','$imie','$nazwisko','$numer')"))
        {
            $_SESSION['registeredTrue'] = true;
            $_SESSION['adres'] = $adres;
            $_SESSION['imie'] = $imie;
            $_SESSION['nazwisko'] = $nazwisko;
            $_SESSION['numer'] = $numer;
            header('Location:Logowanie.php');
        }
        else
        {
          throw new Exception($connect->error);
          header('Location:Rejestracja.php');

        }

      }

      $connect->close();
    }
  }
  catch (Exception $error)
  {
    echo '<span style="color:red;">Server error! ERROR_404</span>';
    //echo '<br/> Informacja dla dewelopera: '.$error;
  }

}

?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <title> Formularz do rejestracji </title>
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
    			<li><a href="kontakt.php">Kontakt</a></li?>
    			<li><a href="Logowanie.php">Zaloguj się</a></li?>
      </ol>



    </div>
    <div class="container">
        <div class="form">
            <div class="heading">
                <img src="OluX.png" class="logo">
                <h1> Formularz Rejestracji</h1>
                </div>
                <form method="post">
                <div class="wrap">
                  <div class="f1">
                    <label>Imię</label>
                    <input type="text" name ='imie'/>
                    <span class="focus-input"></span>
                </div>
                <?php
                  if(isset($_SESSION['error_imie']))
                  {
                    echo '<p class="error" style="color:red"> '.$_SESSION['error_imie'].'</p>';
                    unset($_SESSION['error_imie']);
                  }
                ?>
                <div class="f2">
                    <label>Nazwisko</label>
                    <input type="text" name='nazwisko'/>
                    <span class="focus-input"></span>
                </div>
                <?php
                  if(isset($_SESSION['error_nazwisko']))
                  {
                    echo '<p class="error" style="color:red"> '.$_SESSION['error_nazwisko'].'</p>';
                    unset($_SESSION['error_nazwisko']);
                  }
                ?>
              </div>
              <div class="wrap2">
              <label>Nazwa użytkownika</label>
              <input type="text" name='nick'>
              <span class="focus-input"></span>
          </div>
          <?php
            if(isset($_SESSION['error_nick']))
            {
              echo '<p class="error" style="color:red"> '.$_SESSION['error_haslo'].'</p>';
              unset($_SESSION['error_nick']);
            }
          ?>
              <div class="wrap2">
              <label>Hasło</label>
              <input type="password" name='password'>
              <span class="focus-input2"></span>
          </div>
          <?php
            if(isset($_SESSION['error_haslo']))
            {
              echo '<p class="error" style="color:red"> '.$_SESSION['error_haslo'].'</p>';
              unset($_SESSION['error_haslo']);
            }
          ?>
              <div class="wrap2">
                    <label>Email</label>
                    <input type="text" name='email'>
                    <span class="focus-input2"></span>
                </div>
                <?php
                  if(isset($_SESSION['error_email']))
                  {
                    echo '<p class="error" style="color:red"> '.$_SESSION['error_email'].'</p>';
                    unset($_SESSION['error_email']);
                  }
                ?>
                <div class="wrap2">
                    <label>Numer telefonu</label>
                    <input type="text" name='telefon'>
                    <span class="focus-input2"></span>
                </div>
                <?php
                  if(isset($_SESSION['error_kontakt']))
                  {
                    echo '<p class="error" style="color:red"> '.$_SESSION['error_kontakt'].'</p>';
                    unset($_SESSION['error_kontakt']);
                  }
                ?>
                <div class="wrap2">
                    <label>Adres zamieszkania</label>
                    <input type="text" name='adres'>
                    <span class="focus-input2"></span>
                </div>
                <?php
                  if(isset($_SESSION['error_adres']))
                  {
                    echo '<p class="error" style="color:red"> '.$_SESSION['error_adres'].'</p>';
                    unset($_SESSION['error_adres']);
                  }
                ?>
                <button class="btn">Zarejestruj</button>

                </div>
              </form>
                <div class="image">
                    <img src="blue.jpg" class="img" alt=""/>
                </div>
            </div>
      </body>
</html>
