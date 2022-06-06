<?php
session_start();
if(!isset($_SESSION['logged']))
{
  header('Location:index.php');

}
if(isset($_POST['submit']))
{
 $isReady = true;
  $file=addslashes(file_get_contents($_FILES['file']['tmp_name']));
  $fileName=$_FILES['file']['name'];
  $fileTmpName=$_FILES['file']['tmp_name'];
  $fileSize=$_FILES['file']['size'];
  $fileError=$_FILES['file']['error'];
  $fileType=$_FILES['file']['type'];
  $_SESSION['filenamee'] = $file;
  $fileExt = explode('.', $fileName);

  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png');

  $nazwaogl = $_POST['nazwaogl'];
  $opis = $_POST['opis'];
  $cena = $_POST['cena'];
  $stan = $_POST['stan'];
  $kontakt = $_POST['kontakt'];
  $adres = $_POST['adres'];
  $ilosc = 1;
  $kategoria = $_POST['kategoria'];


  if(in_array($fileActualExt, $allowed))
  {
    if($fileError == 0)
    {
      if($fileSize < 909090)
      {

        $fileNameNew = uniqid('', true).".".$fileActualExt;
        $_SESSION['newfilename'] = $fileNameNew;
        $fileDestianation = 'uploads/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestianation);



              require_once "connectt.php";
              mysqli_report(MYSQLI_REPORT_STRICT);

              try{
                  $connect = new mysqli($host, $db_user, $db_password, $db_name);
                  if($connect->connect_errno!=0)
                  {
                    throw new Exception(mysqli_connect_errno());
                  }
                  else{

                    if($isReady == true)

                    $connect->query("INSERT INTO `ogloszenia`(`nazwaogl`,`opis`,`cena`,`image`,`ilosc`,`stan`,`adres`,`telefon`,`kategoria`,`sprzedawca`) VALUES('$nazwaogl','$opis', '$cena','$fileNameNew','$ilosc','$stan','$adres','$kontakt','$kategoria','".$_SESSION['user']."')");
                    header("Location:oferty.php");

                  }
                    $connect->close();
              }

            catch (Exception $error)
            {
              echo '<span style="color:red;">Server error! ERROR_404</span>';
              echo '<br/> Developer information'.$error;
            }

      }
      else
      {
        echo "Plik jest za duży!";
      }
    }
    else
    {
      echo "Błąd w wysyłaniu danych!";
    }
  }
  else{
    echo "Zły typ danych!";
  }
}

?>
