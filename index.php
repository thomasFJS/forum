<?php
require_once "./php/functions.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Forum</title>
    <link rel="stylesheet" type="text/css" href="./style/style.css"/>
</head>
<body>
	<h1>Accueil</h1>
	<?php
	if(isset($_SESSION['logged'])){
  header("Location: ./php/main.php");
	}else{?>
	<form id="frmConnect" method="POST" action="./php/login.php">
    <fieldset>
      <legend>Connection</legend>
        <p>Identifiant: <input type="text" name="user" required="required" value="<?php if(isset($_SESSION['user'])){echo $_SESSION['user']; }?>"/></p>
        <p>Mot de passe: <input type="password" name="password" required="required" value="<?php if(isset($_SESSION['password'])){echo $_SESSION['password'];}?>"/></p>
	      <p><input type="submit" value="Valider" name="submit">
	      <p class="error"><?php if (isset($_SESSION['errors']['log'])) { echo $_SESSION['errors']['log'];}  ?></p>
</fieldset>
  <a href="./php/createAccount.php">Pas encore inscrit?</a>
  <?php if (isset($_SESSION['msgAccount'])) { echo $_SESSION['msgAccount'];}  ?>
  </form>
	<?php }?>

</body>
</html>
