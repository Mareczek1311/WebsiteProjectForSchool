<?php
session_start();
  require_once "connectt.php";
error_reporting(0);
$email = $_POST['email'];
$temat = $_POST['temat'];
$opis = $_POST['opis'];

$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
$isReady = true;
if((filter_var($emailB,FILTER_SANITIZE_EMAIL)==false)|| ($emailB!=$email))
{
  $isReady=false;
  $_SESSION['error_email']="Insert correct email";
}


  mysqli_report(MYSQLI_REPORT_STRICT);
  $connect = new mysqli($host, $db_user, $db_password, $db_name);
  if(empty($email) OR empty($temat) OR empty($opis) OR $isReady == false){
      header('Location:kontakt.php');
  }else{
  $result = $connect->query("INSERT INTO zgloszenia VALUES (NULL, '$email', '$temat', '$opis')");
  header('Location:kontakt.php');
    $connect->close();
  }

?>
