$(document).ready(function(){
//==============================================================================

var totalTime = localStorage.getItem('timerTime'); // Récupérer le temps depuis localStorage
if (!totalTime) {
	totalTime = 10 * 60; // Si aucune donnée n'est trouvée, initialiser à 10 minutes
}

var timerInterval;
var temps = totalTime; // Initialiser temps avec le totalTime

function updateTimer() {
	var minutes = Math.floor(temps / 60);
	var seconds = temps % 60;
	$('#timer').text(formatTime(minutes) + ':' + formatTime(seconds));

	if (temps <= 0) {
		clearInterval(timerInterval); // Arrêter le timer lorsque le temps est écoulé
		localStorage.removeItem('timerTime'); // Supprime l'élément de localStorage
		localStorage.removeItem('tempsRestant'); // Supprime l'élément de localStorage
		$('#timer').text("Temps écoulé !"); // Affiche un message lorsque le temps est écoulé
	} else {
		temps--;
		localStorage.setItem('timerTime', temps); // Sauvegarder le temps restant dans localStorage
	}
}

function formatTime(time) {
	return time < 10 ? '0' + time : time;
}

// Démarrer le timer
timerInterval = setInterval(updateTimer, 1000); // Mettre à jour toutes les secondes

/*==============================================================================
	Send ajax to server
==============================================================================*/

// Event pour le premier flag (firstFlag)
jQuery("body").on("click", "button#submitFirstFlag", function() {
	var firstFlag = jQuery("article input[name='firstFlag']").val();
	sendAjax("ajxCheckFlags.php", {firstFlag: firstFlag});
});

// Event pour le premier flag (firstFlag)
jQuery('body').on('click', '#logout', function(event) {
	// Supprimer le temps restant du localStorage
	localStorage.removeItem('tempsRestant');
	localStorage.removeItem('timerTime');

	// Arrêter le timer si l'intervalle est défini
	if (typeof timerInterval !== "undefined") {
		clearInterval(timerInterval);
	}
});

/*==============================================================================
	Receive ajax from server
==============================================================================*/

// Receive ajax data
function receiveAjax(data) {
	if (defined(data) && data['success']) {
		// Si on reçoit success true, arrêter le timer
		clearInterval(timerInterval); // Arrêter le timer

		// Afficher le temps écoulé
		var endTime = Math.floor(totalTime - temps); // Calculer le temps de complétion
		var minutes = Math.floor(endTime / 60);
		var seconds = endTime % 60;
		$('#timer').text("Temps écoulé : " + formatTime(minutes) + ":" + formatTime(seconds)); // Afficher le temps dans la section
	} else {
		// Si il y a une erreur ou pas de succès
		$('#timer').text("Erreur ou flag invalide.");
	}
}

/*==============================================================================
	Usefull functions
==============================================================================*/

	// --- Send AJAX data to server
	function sendAjax(serverUrl, data) {
		jsonData = JSON.stringify(data);
		jQuery.ajax({type: 'POST', url: serverUrl, dataType: 'json', data: "data=" + jsonData,
			success: function(data) {
				receiveAjax(data);
			}
		});
	}



	// --- Test whether a variable is defined or not
	function defined(myVar) {
		if (typeof myVar != 'undefined') return true;
		return false;
	}

//==============================================================================
});
