<?php
require_once("library/function.php");
if (isset($_SESSION['type'])) {
	unset($_SESSION['proid']);
	unset($_SESSION['type']);
	$_SESSION["message"] = "Logout Succesful";
}
header('location: '.BASE_URL);
?>