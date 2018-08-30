<?php
  require_once "./functions.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Créer ton compte</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css"/>
</head>
<body>
	<h1>Accueil</h1>
	<form id="frmCreateAcc" method="POST" action="registerAccount.php">
    <fieldset>
      <legend>Inscription</legend>
     Prénom :
     <p><input type="text" name="newFName" value="<?php if (isset($_SESSION['newFName'])) { echo $_SESSION['newFName'];}  ?>" required="required"/></p>
     Nom :
     <p><input type="text" name="newLName" value="<?php if (isset($_SESSION['newLName'])) { echo $_SESSION['newLName'];}  ?>" required="required"/></p>
	   Identifiant :
     <p><input type="text" name="newUser" value="<?php if (isset($_SESSION['newUser'])) { echo $_SESSION['newUser'];}  ?>" required="required"/></p>
     Mot de passe :
     <p><input type="password" name="newPassword" required="required" /></p>
     Validation du mot de passe :
     <p><input type="password" name="confirmPassword" required="required" /></p>
     <p class="error"><?php if (isset($_SESSION['errors']['bPwd'])) { echo $_SESSION['errors']['bPwd'];}  ?></p>
	   <p><input type="submit" value="Valider" name="submit"></p>
    </fieldset>
    <a href="../index.php">Retour sur connection</a>
	</form>
</body>
</html>
