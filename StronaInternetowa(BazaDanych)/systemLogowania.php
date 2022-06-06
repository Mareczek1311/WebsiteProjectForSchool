
<?php
session_start();


if((!isset($_POST['login'])) || (!isset($_POST['password'])))
{
  header('Location:Logowanie.php');
  exit();
}

require_once "connectt.php";

$connect = @new mysqli($host, $db_user, $db_password, $db_name);
//sqli
if($connect->connect_errno!=0)
{
  echo "Error:".$connect->connect_errno."Opis: ".$connect->connect_errno;
}
else{
  $login = $_POST['login'];
  $password = $_POST['password'];
  $login = htmlentities($login, ENT_QUOTES, "UTF-8");

if($result = @$connect->query(sprintf("SELECT * FROM uzytkownicy WHERE user='%s'", mysqli_real_escape_string($connect,$login))))
{

  $users = $result->num_rows;
  if($users > 0)
    {

      $wiersz = $result->fetch_assoc();
      if (password_verify($password, $wiersz['pass']))
        {

          $_SESSION['logged'] = true;
          $_SESSION['id'] = $wiersz['id'];
          $_SESSION['user'] = $wiersz['user'];
          $_SESSION['adres'] = $wiersz['adres'];
          $_SESSION['imie'] = $wiersz['imie'];
          $_SESSION['nazwisko'] = $wiersz['nazwisko'];
					$_SESSION['numer'] = $wiersz['telefon'];


          $result->free();
          header("Location: oferty.php");
        }
        else
        {

          header("Location: Logowanie.php");
        }
    }


  else
  {

    header("Location: Logowanie.php");
  }
}
  $connect->close();
}

?>
