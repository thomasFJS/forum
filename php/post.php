<?php
require_once "./functions.php";

$_SESSION['newTitle'] = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
$_SESSION['newDescription'] = filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING);

if(empty($_SESSION['newTitle'])){
  $_SESSION['errors']['title'] = "La saisie d'un titre est obligatoire!";
}
elseif(empty($_SESSION['newDescription'])){
  $_SESSION['errors']['description'] = "La saisie d'une description est obligatoire!";
}
else{
  try{
    insertPost($_SESSION['newTitle'], $_SESSION['newDescription'], $_SESSION['userData'][0]["idUser"]);

    $_SESSION['errors']['insertPost'] = "Le post a bien été insérer";
    unset($_SESSION['newTitle']);
    unset($_SESSION['newDescription']);

  }
  catch(Exception $e){
    $_SESSION['errors']['insertPost'] = "Le post n'a pas pu être insérer suite a une erreur";
  }
}
header("Location: ./main.php");
?>
