<?php
require_once "./functions.php";
$db = getConnexion();

if(!isset($_SESSION['user']))
{
$_SESSION['user'] = filter_input(INPUT_POST, "user", FILTER_SANITIZE_STRING);
}
if(!isset($_SESSION['password'])){
$_SESSION['password'] = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
}

$_SESSION['errors'] = array();

if(checkLogin($_SESSION['user'], $_SESSION['password']) == true) {
	$_SESSION['logged'] = true;
	header("Location: main.php");
	}
	else{
		$_SESSION['errors']['log'] = "Mauvais identifiant";
}

//echo json_encode($_SESSION['toJson']);
//header("Location: ../index.php");
?>
