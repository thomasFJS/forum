<?php
require_once "./functions.php";

$_SESSION['newTitle'] = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
$_SESSION['newDescription'] = filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING);
?>
