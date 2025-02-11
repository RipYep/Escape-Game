<?php
include_once("./utils.php");

// DB open
include_once("./dbConfig.php");
$db = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);
$db->set_charset("utf8");

// Data from client (filtered + escaped)
$groupName = NULL;
if (preg_match("/^.{3,15}$/", $_POST['groupName'])) $groupName = $db->real_escape_string($_POST['groupName']);

// Check
if ($groupName == NULL) logout($db);

// DB select
$query = "SELECT * FROM tblGroups WHERE groupName = '$groupName';";
$result = $db->query($query);
$numRows = $result->num_rows;

// Check
if ($numRows > 0) logout($db, $result, "Username already used! Please choose another one.");

// DB insert
$query = "INSERT INTO tblGroups (id, groupName, points, startTime, endTime) VALUES (NULL , '$groupName', 0, NOW(), NULL);";
$success = $db->query($query);

// Check
if (!$success) logout($db);

$idGroup = $db->insert_id;

// Data to session
session_start();
$_SESSION['idGroup'] = $idGroup;

// Redirect
header("Location: ajxEscapeGame.php");
exit();
?>
