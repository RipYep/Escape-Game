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

// DB open
include_once("./dbConfig.php");
$db = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);
$db->set_charset("utf8");

// DB select
$query = "SELECT id, login FROM tblChiefEnterprise WHERE id = '$idUser';";
$result = $db->query($query);
$numRows = $result->num_rows;

// Check
if ($numRows == 0) {
	header("Location: logout.php");
	exit();
}

// Data from DB
while ($row = $result->fetch_assoc()) {
	$login = $row['login'];
}
$result->close();

// DB close
$db->close();

$error = NULL;
if (isset($_GET['error'])) $error = $_GET['error'];

?>
<html>
	<!-- Head -->
	<head>
		<!-- CSS files -->
		<link rel='stylesheet' type='text/css' href='./css/web.css' media='screen' />
		<link rel='stylesheet' type='text/css' href='./css/02_fonts.css' media='screen' />
		<link rel='stylesheet' type='text/css' href='./css/03_icons.css' media='screen' />

		<!-- JS files -->
		<script type='text/javascript' src='./js/jquery-3.7.0.min.js'></script>
		<script type='text/javascript' src='./js/jquery-ui.min.js'></script>

		<!-- UTF8 encoding -->
		<meta charset='UTF-8'>

		<!-- Prevent from zooming -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0,  shrink-to-fit=no">

		<!-- Icon -->
		<link rel='icon' type='image/png' href='./design/favicon.png' />

		<!-- Title -->
		<title>Escape game</title>
	</head>

	<!-- Body -->
	<body>
		<!-- Wrapper -->
		<div class='wrapper'>

			<h1>Bienvenue, <?php echo "$login"; ?></h1>

			<h2>Lancer Ariane 6</h2>
			<form class='ceo' action='checkRocketCode.php' method='post'>
				<?php echo "<p class='error'>$error</p>"; ?>
				<input class='launchCode' type=text name='launchCode' placeholder='Code de lancement' />
				<input class='submitCode' type='submit' value='OK' />
			</form>

		</div>
	</body>
</html>
<style media="screen">
body {
	height: 100vh;
	background-image: url("./medias/backRocketImage.svg");
	background-repeat: no-repeat;
	background-size: cover;
	background-attachment: fixed;
	overflow-y: hidden;
}

/* Style pour le champ de saisie de code de lancement */
.launchCode {
  padding: 12px 20px;
  font-size: 16px;
  border: 2px solid #333;
  border-radius: 8px;
  background-color: #1e1e1e;
  color: #fff;
  width: 100%;
  max-width: 400px;
  box-sizing: border-box;
  transition: all 0.3s ease;
}

.launchCode:focus {
  border-color: #f0b90b;
  outline: none;
  background-color: #333;
}

/* Style pour le bouton de soumission */
.submitCode {
  background-color: #f0b90b;
  color: #fff;
  padding: 14px 28px;
  font-size: 18px;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  transition: all 0.3s ease;
  box-sizing: border-box;
  width: 100%;
  max-width: 200px;
}

.submitCode:hover {
  background-color: #e09e0b;
}

.submitCode:active {
  background-color: #c98909;
}

.error {
	color: red;
}

</style>
