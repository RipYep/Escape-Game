import paho.mqtt.client as mqtt
import time
import threading

mqtt_broker = "10.122.0.123"  # Adresse IP du Raspberry Pi
mqtt_port = 1883  # Port MQTT par défaut
file_path = "./safe-ceo/codeIR.txt"  # Chemin du fichier où les codes IR seront enregistrés

# Variable pour stocker la ligne en cours
current_codes = ""
last_received_time = time.time()  # Horodatage de la dernière réception

# Callback pour la connexion
def on_connect(client, userdata, flags, rc):
    print(f"Connected with result code {rc}")
    # Abonnez-vous à un topic si nécessaire
    client.subscribe("ir/commands")

# Callback pour la réception de messages
def on_message(client, userdata, msg):
    global current_codes, last_received_time  # Utiliser la variable globale pour stocker la ligne en cours

    message = msg.payload.decode()  # Décoder le message reçu
    print(f"Message reçu sur {msg.topic}: {message}")

    if message == "ENTER":
        # Si le message est "ENTER", on sauvegarde immédiatement le code
        save_codes_to_file()  # Sauvegarder le code actuel dans le fichier
    elif message.isdigit():
        # Si le message est un chiffre, l'ajouter à la ligne en cours
        current_codes += message  # Ajouter le chiffre à la ligne en cours
        print(f"Code IR '{message}' ajouté à la ligne.")
        last_received_time = time.time()  # Réinitialiser le timer

# Fonction pour sauvegarder les codes dans le fichier
def save_codes_to_file():
    global current_codes
    print("Tentative d'enregistrement du fichier...")  # Ajout d'un message de debug
    if current_codes:
        try:
            with open(file_path, "w") as f:
                f.write(current_codes)
            print(f"Codes IR '{current_codes}' enregistrés dans le fichier.")
        except Exception as e:
            print(f"Erreur lors de l'écriture du fichier : {e}")
        current_codes = ""

# Fonction pour vider le fichier toutes les 15 secondes d'inactivité
def reset_file():
    global current_codes, last_received_time
    while True:
        time.sleep(1)  # Vérifier toutes les secondes si le délai est dépassé
        if time.time() - last_received_time >= 15:  # Si plus de 15 secondes se sont écoulées
            if current_codes != "":  # Sauvegarder les codes si présents
                save_codes_to_file()
            current_codes = ""  # Réinitialiser la variable
            print("Fichier réinitialisé.")
            with open(file_path, "w") as f:
                f.truncate(0)  # Effacer le contenu du fichier

# Création du client MQTT
client = mqtt.Client()

# Définir les callbacks
client.on_connect = on_connect
client.on_message = on_message

# Connexion au broker MQTT
client.connect(mqtt_broker, mqtt_port, 60)

# Lancer le thread de réinitialisation toutes les 15 secondes
reset_thread = threading.Thread(target=reset_file, daemon=True)
reset_thread.start()

# Boucle principale du client MQTT
client.loop_forever()
