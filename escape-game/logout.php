<?php

	// Session open
	session_start();

	// Unset session vars
	session_unset();

	// Session close, go to index page
	if (session_destroy()) {
		header("Location: index.html");
	}

?>
