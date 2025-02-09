# Escape-Game
Une escape game adaptée pour les lycéens et collégiens lors de la Journée Porte Ouverte à l'Institut Universitaire Technologique de Kourou, en Guyane Française.

Liste du matériel :
  - 1 Raspberry Pi
  - 1 Télécommande IR (Infrarouge)
  - 3 câbles mâle-femelle
  - PC portable pour lancer le programme du coffre et serveur Flask
  - arduino Wi-Fi

## Scénario de l'escape game
Ils sont entrés par effraction dans la base spatiale, ils doivent retrouver le code qui permet de débloquer un coffre, où dans ce coffre, le CEO avait déposé tous ses post-it avec login et mots de passe à son compte de la base spatiale, numéros de comptes, des documents (il)légaux, des lingots d'or et même le code de lancement de Ariane 6. Dès que le coffre s'ouvre une alarme se déclenche et ils feront face à un choix : 
- Fuir avec le contenu du coffre.

Ou bien :
- Ne pas fuir, lancer la fusée, et partir avec le contenu du coffre.

### Ne pas fuir
S'ils décident de lancer la fusée grâce au code de lancement trouvé dans le coffre, ils pourront lancer la fusée, et partir avec tout le contenu du coffre.

### Fuir
Sinon, s'ils décidents de fuir, ils se feront attraper. Ils essayent de combrioler une base spatiale... On reste réaliste, on n'est pas dans un film.

---

_Le CEO de l'entreprise est un passionné d'histoire, en particulier de la Seconde Guerre mondiale et de l'attaque de Pearl Harbor. Il a une collection précieuse d'objets historiques, dont un coffre-fort sécurisé par un code faisant hommage à cette évenement historique. 
Le code du coffre est l'année de l'attaque de Pearl Harbor, soit 1941._

---

## Challenge 1 : ...


## Challenge 2 : Infrarouge
Avec la télécommande infrarouge, ils devront débloquer le coffre du CEO. Dans ce coffre ils trouveront le code de lancement de Ariane 6, l'identifiant et code du compte bancaire du CEO, login et mot de passe à son compte, une photo de famille, des documents (il)légaux, de l'or, et une liste de ses collaborateurs. Tout ce qu'il faut pour usurper le CEO (si nos participants/participantes se sentent... Malveillants/Malveillantes), ne serait-ce que pour quelques heures, voire quelques minutes/secondes. Largement suffisant pour causer des dégats conséquents à sa réputation, son entreprise, et notamment sa vie.

## Suite challenge 2 pour conclure l'escape game
Une fois le coffre du CEO ouvert, une alarme se déclenche et ils devront faire fasse à un choix :
- Fuir. Mais ils se feront attraper car c'est un lieu hautement sécurisé. Ils ont réussi à rentrer mais n'arriveront jamais à s'échapper.

Ou bien :
- Se connecter sur le compte du CEO, et lancer Ariane 6.

S'ils décident de ne pas fuir et de lancer la fusée avec le code de lancement, un autre script BASH sera exécuté par le biais du code C++. Ce script BASH va leur ouvrir le navigateur par défaut à l'adresse `escape-ceo-csg.fr/ceo-account.html` pour pouvoir se connecter au compte du CEO, et 0.5 secondes plus tard, on affiche le contenu du coffre en ouvrant *Files Manager* à un endroit "caché" du système Linux, où ils pourront consulté brièvement le contenu du coffre et lancer la fusée avec le compte du CEO.

---

## Pré-requis pour que les challenges fonctionnent

### Branchement du capteur infrarouge au Raspberry
![image](https://github.com/user-attachments/assets/17acd429-4ad7-486b-b69a-875a381f2744)

### Modification du fichier de configuration  

Ensuite, on se rend dans le fichier `/boot/config.txt` avec la commande `sudo nano /boot/config.txt` pour décommenter la ligne suivante :  
```ini
dtoverlay=gpio-ir,gpio_pin=18
```

Sauvegarder après avoir modifier (`CTRL + X, puis Y et ENTER`).

Puis redémarrer le Raspberry :
```bash
sudo reboot
```

### Installation de Mosquitto (MQTT) sur le PC et Raspberry
```bash
sudo apt update && sudo apt install -y mosquitto mosquitto-clients
sudo systemctl enable mosquitto
sudo systemctl start mosquitto
```

### Installation de ir-keytable, evdev, et python sur le Raspberry
```bash
sudo apt install -y ir-keytable python3 python3-pip python3-venv
python3 -m venv venv
source venv/bin/activate
pip install evdev paho-mqtt
```

### Mappage des touches de la télécommande infrarouge
Dans un premier temps, il faut exécuter la commande `ir-keytable -t -p all`, puis appuyer sur les touches de la télécommande pour vérifier si le Raspberry Pi reçoit bien les signaux infrarouges.
Une fois le protocole (necx) détecté, il suffit d’appuyer sur une touche, de noter son code hexadécimal, puis d'enregistrer le code correspondant à la touche appuyé dans `/etc/rc_keymaps/customRemote.toml`.

Exemple contenu du fichier **/etc/rc_keymaps/customRemote.toml** :
```toml
[[protocols]]
name = "nec"

[[protocols.scancodes]]
0x0001 = "1"
0x0002 = "2"
0x0003 = "3"
0x0004 = "4"
0x0005 = "5"
0x0006 = "6"
0x0007 = "7"
0x0008 = "8"
0x0009 = "9"
0x0028 = "28"
```

Pour charger la configuration des touches de la télécommande :
```bash
sudo ir-keytable -c -w /etc/rc_keymaps/customRemote.toml
```

---

### _*Comment le code infrarouge est envoyé au PC ?*_
Lancer le programme `mqttServer.py` :
```bash
python3 mqttServer.py
```
Le script Python (`mqttServer.py`) agit en tant qu'émetteur. Ce script lance le programme `ir-keytable` pour gérer les signaux infrarouges et démarre le serveur **Mosquitto** pour la communication MQTT. À chaque pression d'une ***touche numérique*** sur la télécommande infrarouge, le Raspberry Pi détecte le code correspondant et publie ce code sur le topic `ir/commands` du broker MQTT. Le PC, abonné à ce topic, reçoit le code via MQTT.

### *_Comment le PC reçoit le code envoyé du Raspberry ?_*
Lancer le programme `mqttClient.py` :
```bash
python3 mqttClient.py
```
L'utilisateur doit saisir un code, puis appuyer sur le bouton ***OK*** de la télécommande IR pour soumettre le code au PC. Ce geste sert à "notifier" le PC (le récepteur) qu'il doit récupérer le code envoyé par le Raspberry Pi via le topic `ir/commands` sur le serveur MQTT, et enregistrer le code reçu jusqu'à présent dans le fichier `codeIR.txt` dans le répertoire `./safe-ceo/`. Ce fichier sera ensuite utilisé par le programme C++ pour vérifier la validité du code.

**_Le fichier `codeIR.txt` est effacé toutes les 15 secondes. Ce délai est réinitialisé chaque fois qu'un nouveau code est enregistré dans les 15 secondes qui suivent le dernier enregistrement._**

### *L'adresse **escape-ceo-csg.fr** n'existe pas !*
Il est nécessaire de modifier le fichier `/etc/hosts` en y ajoutant la ligne suivante :
```bash
sudo sh -c 'echo "127.0.0.1 escape-ceo-csg.fr" >> /etc/hosts'
```

### *_Comment le code C++ vérifie la validité du code ?_*
Le code C++ vérifie toutes les 4.5 secondes si le code est bon, et s'il est bon il ouvre le coffre, sinon il reste fermé.

Cette ligne est nécessaire pour que le script BASH `launchRocket.sh` puisse ouvrir le navigateur sur cette adresse.

### *_Serveur MQTT marche pas ?_*
Sans doute dû aux adresses IP configurées en statique dans les codes `mqttClient.py` et `mqttServer.py`. Il faudra remplacer l'adresse IP dans ces 2 codes Python par l'adresse IP de votre Raspberry.

---

## Solution challenge 1

---

## Solution challenge 2
Le code pour débloquer le coffre est l'année de l'attaque de Pearl Harbor en 1941. Une fois ce code entré, ils déverrouillent le coffre et doivent ensuite choisir entre fuir avec son contenu ou rester et lancer la fusée en se connectant au compte du CEO avec son identifiant de connexion.

---
