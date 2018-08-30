<?php
require_once "./functions.php";

$_SESSION['newUser'] = filter_input(INPUT_POST, 'newUser', FILTER_SANITIZE_STRING);
$_SESSION['newFName'] = filter_input(INPUT_POST, 'newFName', FILTER_SANITIZE_STRING);
$_SESSION['newLName'] = filter_input(INPUT_POST, 'newLName', FILTER_SANITIZE_STRING);
$_SESSION['newPassword'] = filter_input(INPUT_POST, 'newPassword', FILTER_SANITIZE_STRING);
$_SESSION['confirmPassword'] = filter_input(INPUT_POST, 'confirmPassword', FILTER_SANITIZE_STRING);

if($_SESSION['newPassword'] == $_SESSION['confirmPassword']){
  //insert dans la table user
  try {
createNewUser($_SESSION['newUser'],$_SESSION['newPassword'],$_SESSION['newFName'],$_SESSION['newLName']);
} catch(Exception $e){
  $_SESSION['msgAccount'] = "Une erreur est survenu";
  header("Location: ./createAccount.php");
}
$_SESSION['msgAccount'] = "Votre compte à bien été créer";
unset($_SESSION['newUser']);
unset($_SESSION['newFName']);
unset($_SESSION['newLName']);
header("Location: ../index.php");

}
else{
  $_SESSION['errors']['bPwd'] = "Les mots de passe ne correspondent pas";
  header("Location: ./createAccount.php");
}
?>
