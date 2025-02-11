import evdev
import time
import paho.mqtt.client as mqtt
import threading

# Fonction pour obtenir le périphérique IR
def get_ir_device():
    devices = [evdev.InputDevice(path) for path in evdev.list_devices()]
    for device in devices:
        if device.name == "gpio_ir_recv":  # Nom du périphérique
            print("Using device", device.path)
            return device
    print("No device found!")
    return None

# Paramètres MQTT
mqtt_broker = "10.122.6.12"  # Adresse IP du Raspberry (Broker MQTT)
mqtt_port = 1883  # Port MQTT
mqtt_topic = "ir/commands"

# Fonction de callback MQTT
def on_connect(client, userdata, flags, rc):
    if rc == 0:
        print("Connecté au broker MQTT avec succès.")
    else:
        print(f"Échec de la connexion au broker MQTT, code : {rc}")

# Connexion au broker MQTT
client = mqtt.Client()
client.on_connect = on_connect

# Démarrer le loop MQTT dans un thread séparé
def start_mqtt_loop():
    client.connect(mqtt_broker, mqtt_port, 60)
    client.loop_start()  # Démarre la boucle MQTT dans un thread séparé

# Mappage des codes d'événements
key_map = {
    1: "1",   # Code 1
    2: "2",   # Code 2
    3: "3",   # Code 3
    4: "4",   # Code 4
    5: "5",   # Code 5
    6: "6",   # Code 6
    7: "7",   # Code 7
    8: "8",   # Code 8
    9: "9",   # Code 9
    28: "ENTER"  # Code 28 pour ENTER
}

# Fonction principale
def main():
    # Obtenir le périphérique IR
    dev = get_ir_device()

    if not dev:
        print("Erreur : périphérique IR non trouvé.")
        return

    # Commencer à lire les événements IR en boucle continue
    print("Listening for IR events...")

    try:
        # Boucle continue pour lire les événements
        for event in dev.read_loop():
            if event.type == evdev.ecodes.EV_KEY:  # Type d'événement de touche
                if event.value == 1:  # La touche est appuyée
                    if event.code in key_map:  # Vérifier si le code de la touche est mappé
                        key_pressed = key_map[event.code]
                        print(f"Touche appuyée : {key_pressed}")

                        # Si la touche appuyée est "ENTER"
                        if key_pressed == "ENTER":
                            # Publier un message spécifique pour ENTER
                            client.publish(mqtt_topic, "ENTER")
                        else:
                            # Publier la touche via MQTT
                            client.publish(mqtt_topic, key_pressed)

                        # Publier la touche via MQTT
                        client.publish(mqtt_topic, key_pressed)
                        print(f"Message '{key_pressed}' publié sur le topic '{mqtt_topic}'")  # Débogage ajouté

    except KeyboardInterrupt:
        print("Arrêté par l'utilisateur.")
    except Exception as e:
        print(f"Erreur lors de la capture des événements IR : {e}")

# Lancer le script principal
if __name__ == "__main__":
    start_mqtt_loop()  # Démarrer le loop MQTT dans un thread séparé
    main()             # Exécuter la fonction principale pour traiter les événements IR
