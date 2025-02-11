<?php
include_once("./utils.php");

// DB open
include_once("./dbConfig.php");
$db = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);
$db->set_charset("utf8");

// Data from client (filtered + escaped)
$login = NULL;
if (preg_match("/^.{0,100}$/", $_POST['login'])) $login = $db->real_escape_string($_POST['login']);
$pwd = NULL;
if (preg_match("/^.{0,100}$/", $_POST['pwd'])) $pwd = $db->real_escape_string($_POST['pwd']);

// Check
if ($login == NULL || $pwd == NULL) {
  header("Location: ceo-account.html");
  exit();
}

// DB select
$query = "SELECT * FROM tblChiefEnterprise WHERE login = '$login' AND pwd = '$pwd';";
$result = $db->query($query);
$numRows = $result->num_rows;

// Check
if ($numRows == 0) {
  header("Location: ceo-account.html");
  exit();
}

// Data from DB
while ($row = $result->fetch_assoc()) {
  $idUser = $row['id'];
  $login = $row['login'];
}

// Data to session
session_start();
$_SESSION['idUser'] = $idUser;

// Redirect
header("Location: ceo-account.php");
?>
