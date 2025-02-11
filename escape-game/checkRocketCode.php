<?php
// Data from session
session_start();
$idUser = NULL;
if (isset($_SESSION['idUser'])) $idUser = $_SESSION['idUser'];

// Check
if ($idUser == NULL) {
	header("Location: logout.php");
	exit();
}

$launchCode = NULL;
if (isset($_POST['launchCode'])) $launchCode = $_POST['launchCode'];

if ($launchCode == "487-158-9451-48") header("Location: launchRocket.php");
else header("Location: ceo-account.php?error=Code de lancement erroné");
?>
