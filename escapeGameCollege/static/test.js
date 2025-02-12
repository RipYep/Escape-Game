// -------------------- VARIABLES --------------------

// Variable pour stocker l'intervalle du timer
let timer;

// -------------------- FONCTIONS --------------------

// Récupère le temps restant depuis le serveur
async function getTimeRemaining() {
    try {
        const response = await fetch('/timer');
        const data = await response.json();
        return data.time_remaining; // Temps restant
    } catch (error) {
        console.error("Erreur lors de la récupération du temps :", error);
        return 0; // Retourne 0 en cas d'erreur
    }
}


// Lance le compte à rebours
async function startTimer() {
    let timeRemaining = await getTimeRemaining(); // Temps initial depuis le serveur
    console.log("Temps restant initial :", timeRemaining);  // Ajoutez ce log pour déboguer

    if (!timer && timeRemaining > 0) {
        timer = setInterval(async () => {
            timeRemaining = await getTimeRemaining(); // Met à jour le temps
            console.log("Temps restant mis à jour :", timeRemaining);  // Ajoutez ce log pour déboguer

            // Met à jour l'affichage
            document.getElementById("timer").innerText = formatTime(timeRemaining);

            // Arrête le compte à rebours si le temps est écoulé
            if (timeRemaining <= 0) {
                clearInterval(timer);
                document.getElementById("message").innerText = "Temps écoulé !";
                disableInputs();
            }
        }, 1000); // Mise à jour toutes les secondes
    } else {
        console.error("Le temps restant est invalide ou égal à 0 !");
    }
}

// Formate le temps en mm:ss
function formatTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const secs = seconds % 60;
    return `${minutes.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
}

// Désactive les champs de saisie et le bouton de validation
function disableInputs() {
    const inputs = document.querySelectorAll("input");
    inputs.forEach(input => input.disabled = true);
    document.getElementById("submit").disabled = true;  // Désactive le bouton de validation
}

// Envoie les réponses au serveur pour vérification
async function validateAnswers() {
    const answer1 = document.getElementById("answer1");
    const answer2 = document.getElementById("answer2");
    const answer3 = document.getElementById("answer3");
    const answer4 = document.getElementById("answer4");
    const messageElement = document.getElementById("message");

    // Vérifier si les éléments existent dans le DOM avant de les utiliser
    if (!answer1 || !answer2 || !answer3 || !answer4 || !messageElement) {
        console.error("Un ou plusieurs éléments manquent dans le DOM.");
        return;
    }

    const answer1Value = answer1.value;
    const answer2Value = answer2.value;
    const answer3Value = answer3.value;
    const answer4Value = answer4.value;

    try {
        const response = await fetch('/submit_answers', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                answer1: answer1Value,
                answer2: answer2Value,
                answer3: answer3Value,
                answer4: answer4Value
            })
        });

        const data = await response.json();
        messageElement.innerText = data.message;

        // Si toutes les réponses sont correctes, arrêter le timer et désactiver les champs
        if (data.message.includes("Félicitations")) {
            clearInterval(timer);
            disableInputs();
        }
    } catch (error) {
        console.error("Erreur lors de l'envoi des réponses :", error);
        messageElement.innerText = "Erreur lors de la vérification. Réessayez.";
    }
}

// -------------------- GESTIONNAIRE D'ÉVÉNEMENTS --------------------

// Lancement automatique du timer lorsque la page est chargée
document.addEventListener('DOMContentLoaded', function () {
    startTimer();  // Démarre le timer une fois que le DOM est prêt
});

// Ajoute un gestionnaire pour le bouton de validation
document.getElementById("submit").addEventListener("click", validateAnswers);
