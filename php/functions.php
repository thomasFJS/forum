<?php
session_start();

function getConnexion(){

	$server = "localhost";
	$dbName = "dbForum";
	$dbUser = "root";
	$dbPassword = "";

	static $db = null;
	if($db === null){
		$db = new PDO("mysql:host=$server;dbname=$dbName",$dbUser,$dbPassword);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}
	return $db;

}

function checkLogin($login, $password){
  $db = getConnexion();
  $query = $db->prepare('SELECT login, password FROM tuser WHERE login="'.$login.'" AND password="'.md5($password).'";');
  $query->execute();
  if($query->rowCount()>0) {
    return true;
  }
  else{
    return false;
  }
}

function createNewUser($login, $password, $surname, $name){
  $db = getConnexion();
  $query = $db->prepare('INSERT INTO tuser (surname, name, login, password)
  VALUES ("'. $surname .'", "' . $name . '", "'. $login .'","' . md5($password) . '"); ');
  $query->execute();
}

function getUserByLogin($login){
  $db = getConnexion();
  $query = $db->prepare('SELECT idUser, surname, name, login FROM tuser WHERE login="'. $login .'";');
  $query->execute();

  $query = $query->fetchAll();

  return $query;
}
function getUserById($id){
  $db = getConnexion();
  $query = $db->prepare('SELECT idUser, surname, name, login FROM tuser WHERE idUser="'. $id .'";');
  $query->execute();

  $query = $query->fetchAll();

  return $query;
}

function insertPost($title, $description, $idUser){
  $db = getConnexion();
  $query = $db->prepare('INSERT INTO tNews (title, description, idUser)
  VALUES ("'. $title .'", "' . $description . '", "'. $idUser .'"); ');
  $query->execute();
}

function getPost(){
  $db = getConnexion();
  $query = $db->prepare('SELECT title, description, idUser FROM tnews');
  $query->execute();
  $query = $query->fetchAll();

  return $query;
}
?>
