<?php
// Data from session
session_start();
$idGroup = NULL;
if (isset($_SESSION['idGroup'])) $idGroup = $_SESSION['idGroup'];

// Check
if ($idGroup == NULL) {
	echo "<script>localStorage.removeItem('timerTime');</script>";
	header("Location: logout.php");
	exit();
}
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
		<script type='text/javascript' src='./js/ajxEscapeGame.js'></script>

		<!-- UTF8 encoding -->
		<meta charset='UTF-8'>

		<!-- Prevent from zooming -->
		<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0,  shrink-to-fit=no"> -->

		<!-- Icon -->
		<link rel='icon' type='image/png' href='./design/favicon.png' />

		<!-- Title -->
		<title>Escape game</title>
	</head>

	<!-- Body -->
	<body>
		<div class='timer' id='timer'>

		</div>
		<!-- Wrapper -->
		<div class='wrapper'>

			<h1>Infiltration/Exfiltration</h1>

			<article class='challengeInfo'>
				<p class='challengeText'>Mission : Désactiver l'alarme silencieuse, ..., débloquer le coffre du CEO et s'échapper.</p>
			</article>

			<!-- <a id='logout' href="./logout.php">Logout</a> -->
		</div>
	</body>
</html>
