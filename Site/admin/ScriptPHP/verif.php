<?php
session_start();
if (!isset($_SESSION['login'])) {
	$_SESSION['login_redirect'] = $_SERVER['PHP_SELF'];
	header('Location:index_adm.php');
}
?>
