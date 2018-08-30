<?php
	session_start();

	$db = new PDO("mysql:host=localhost;dbname=dbForum", "root");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
?>
