<?php
require_once "./functions.php";

$_SESSION["userData"] = getUserByLogin($_SESSION['user']);
if(!isset($_SESSION['logged'])){
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css"/>
</head>
<body>
  <?php
  if(isset($_SESSION['errors']['title'])){
    echo "<h1>". $_SESSION['errors']['title'] . "</h1>";
    unset($_SESSION['errors']['title']);
  }
  if(isset($_SESSION['errors']['description'])){
    echo "<h1>". $_SESSION['errors']['description'] . "</h1>";
    unset($_SESSION['errors']['description']);
  }
  if(isset($_SESSION['errors']['insertPost'])){
    echo "<h1>". $_SESSION['errors']['insertPost'] . "</h1>";
    unset($_SESSION['errors']['insertPost']);
  }
  ?>
	<h1>Bonjour <?php echo $_SESSION["userData"][0]["surname"] . " " . $_SESSION["userData"][0]["name"];?>, voici votre fil d'actualités</h1>

<form method="POST" action="./post.php">
  <fieldset>
    <legend>Nouveau post</legend>
    Titre:
    <p><input type="text" name="title" required="required" value="<?php if(isset($_SESSION['newTitle'])){echo $_SESSION['newTitle']; }?>"/></p>
    Description:
    <p><textarea rows="40" cols="100" name="description" value="<?php if(isset($_SESSION['newDescription'])){echo $_SESSION['newDescription']; }?>"></textarea></p>
    <p><input type="submit" value="Insérer" name="submit"></p>
  </fieldset>
</form>
<form method="POST" action="./logout.php">
 <input type="submit" value="Déconnexion" name="submit">
</form>

<?php
$_SESSION['postData'] = getPost();

for($i=count($_SESSION['postData'])-1;$i>=0;$i--){
  $auteur = getUserById($_SESSION['postData'][$i]["idUser"]);
  echo '<div id="post">Auteur: '. $auteur[0]["surname"] .' '. $auteur[0]["name"] .'<h1>' . $_SESSION["postData"][$i]["title"] .' </h1><p>'. $_SESSION["postData"][$i]["description"] .'</p></div>';
}
?>
</body>
</html>
