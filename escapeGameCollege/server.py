from flask import Flask, session, render_template, request, jsonify
import time
import socket
import threading
# -------------------- CONFIGURATION --------------------

HOST = "0.0.0.0"
PORT = 5000

app = Flask(__name__)
app.secret_key = 'password'

TOTAL_TIME = 5 * 60 # Durée totale du timer en secondes
WAIT_TIME = 5 # Délai d'attente avant de relancer le challenge (15 secondes)


# -------------------- ROUTES --------------------
@app.route('/')
def home():
    """Page principale - Initialise le timer si non existant."""
    current_time = time.time()

    # Vérifier si le challenge est terminé
    if 'completed' in session and session['completed']:
        # Vérifier si le délai d'attente est écoulé
        if 'end_time' in session:
            if current_time - session['end_time'] >= WAIT_TIME:
                session.pop('completed', None)
                session.pop('start_time', None)
                session.pop('end_time', None)
                return render_template('index.html', message="Vous pouvez relancer le challenge !")
            else:
                # Afficher le temps restant avant de pouvoir recommencer
                remaining_wait_time = WAIT_TIME - (current_time - session['end_time'])
                return render_template('index.html', message=f"Vous devez attendre encore {int(remaining_wait_time // 60)} minutes et {int(remaining_wait_time % 60)} secondes pour recommencer.")
        else:
            # Si 'end_time' n'existe pas encore, l'utilisateur n'a pas terminé ou la session a été réinitialisée
            return render_template('index.html', message="Le challenge n'est pas encore terminé.")
    
    # Si le challenge n'a pas été complété, commencer un nouveau challenge
    if 'start_time' not in session:
        session['start_time'] = current_time
        session['completed'] = False  # Suivi de la complétion du challenge
    return render_template('index.html')

@app.route('/timer', methods=['GET'])
def get_timer():
    """Retourne le temps restant."""
    if session.get('completed'):
        return jsonify({'time_remaining': 0})

    elapsed_time = time.time() - session.get('start_time', time.time())
    time_remaining = max(TOTAL_TIME - elapsed_time, 0)

    if time_remaining <= 0:
        session.pop('start_time', None)
        session['end_time'] = time.time()  # Enregistrer l'heure de fin

    return jsonify({'time_remaining': int(time_remaining)})

@app.route('/submit_answers', methods=['POST'])
def validate_answers():
    """Vérifie les réponses envoyées par l'utilisateur."""
    if session.get('completed'):
        return jsonify({"message": "Vous avez déjà résolu les énigmes !"})
    
    user_answers = {
        "answer1": request.form.get('answer1'),
        "answer2": request.form.get('answer2'),
        "answer3": request.form.get('answer3'),
        "answer4": request.form.get('answer4')
    }

    correct_answers = {
        "answer1": "Le Soyouz",
        "answer2": "Lier Philippe",
        "answer3": "Mercure",
        "answer4": "n°3"
    }

    correct_count = sum(1 for key in user_answers if user_answers[key] == correct_answers[key])
    incorrect_count = len(correct_answers) - correct_count

    if correct_count == len(correct_answers):
        session['completed'] = True  # Arrêter le timer et bloquer les réponses
        session['end_time'] = time.time()  # Enregistrer l'heure de fin
        message = "Félicitations, vous avez résolu toutes les énigmes correctement ! Vous pouvez entrer dans votre bureau. Ps : N'oubliez pas Pearl Harbor !"
    else:
        message = f"Vous avez {correct_count} bonne(s) réponse(s) et {incorrect_count} incorrecte(s). Essayez encore !"

    return jsonify({"message": message})


# -------------------- PARTIE A DEVELOPPPER POUR AJOUTER L'ALARME --------------------

# def handle_arduino():
#     server_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
#     server_socket.bind((HOST, PORT))
#     server_socket.listen(5)
    
#     print(f"Serveur en écoute sur {HOST}:{PORT}...")
#     while True:
#         client_socket, client_address = server_socket.accept()
#         print(f"Nouvelle connexion Arduino : {client_address}")

#         try:
#             message = client_socket.recv(1024).decode("utf-8")
#             if message:    
#                 print(f"Message reçu de {client_address} : {message}")

#                 with open("arduino_data.txt","w") as file:
#                     file.write(message)
                
#                 client_socket.send("Données bien reçu !".encode("utf-8"))
        
#         except Exception as e:
#             print(f"Erreur : {e}")
#         client_socket.close()


# -------------------- LANCEMENT DE L'APPLICATION --------------------

if __name__ == '__main__':
    app.run(host="0.0.0.0", port=5000, debug=True)