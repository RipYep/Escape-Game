# Escape-Game
Une escape game adaptée pour les lycéens et collégiens lors de la Journée Porte Ouverte à l'Institut Universitaire Technologique de Kourou, en Guyane Française.

![logouniv](https://github.com/user-attachments/assets/d22e83d5-4026-42f8-993f-aa8d3e3a919b)
![téléchargement](https://github.com/user-attachments/assets/7ec4deea-47f4-4a91-ab36-93608a6b9645)

Liste du matériel :
  - 1 Raspberry Pi zéro
  - 1 Télécommande IR (Infrarouge)
  - 3 câbles mâle-femelle
  - PC portable pour lancer le programme du coffre et serveur Flask
  - arduino Wi-Fi

## Scénario de l'escape game
Ils sont entrés par effraction dans la base spatiale, ils doivent retrouver le code qui permet de débloquer un coffre, où dans ce coffre, le CEO avait déposé tous ses post-it avec login et mots de passe à son compte de la base spatiale, numéros de comptes, des documents (il)légaux, des lingots d'or et le code de lancement de Ariane 6. Dès que le coffre s'ouvre une alarme se déclenche et ils feront face à un choix : 
- Fuir avec le contenu du coffre.

Ou bien :
- Ne pas fuir, lancer la fusée, et partir avec le contenu du coffre.

### Ne pas fuir
S'ils décident de lancer la fusée grâce au code de lancement trouvé dans le coffre, ils pourront lancer la fusée, et partir avec tout le contenu du coffre.

### Fuir
Sinon, s'ils décidents de fuir, ils se feront attraper. Ils essayent de combrioler une base spatiale... On reste réaliste, on n'est pas dans un film.

## Challenge 1 : ...


## Challenge 2 : Infrarouge
Avec la télécommande infrarouge, ils devront débloquer le coffre du CEO. Dans ce coffre ils trouveront le code de lancement de Ariane 6, l'identifiant et code du compte bancaire du CEO, login et mot de passe à son compte, une photo de famille, des documents (il)légaux, de l'or, et une liste de ses collaborateurs. Tout ce qu'il faut pour usurper le CEO (si nos participants/participantes se sentent... Malveillants/Malveillantes), ne serait-ce que pour quelques heures, voire quelques minutes/secondes. Largement suffisant pour causer des dégats conséquents à sa réputation, son entreprise, et notamment sa vie.

## Suite challenge 2 pour conclure l'escape game
Une fois le coffre du CEO ouvert, une alarme se déclenche et ils devront faire fasse à un choix :
- Fuir. Mais ils se feront attraper car c'est un lieu hautement sécurisé. Ils ont réussi à rentrer mais n'arriveront jamais à s'échapper.

Ou bien :
- Se connecter sur le compte du CEO, et lancer Ariane 6.

S'ils décident de ne pas fuir et de lancer la fusée avec le code de lancement, un autre script BASH sera exécuté par le biais du code C++. Ce script BASH va leur ouvrir le navigateur par défaut à l'adresse ***escape-ceo-csg.fr/ceo-account.html*** pour pouvoir se connecter au compte du CEO, et 0.5 secondes plus tard, on affiche le contenu du coffre en ouvrant *Files Manager* à un endroit "caché" du système Linux, où ils pourront consulté brièvement le contenu du coffre (ou pas) et lancer la fusée avec le compte du CEO.

## Réponse challenge 1

## Pré-requis pour que le challenge 2 fonctionne

### Installation de Mosquitto (MQTT)
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
pip install evdev
sudo apt update && sudo apt install -y python3 python3-pip
```
### Mappage des touches de la télécommande
Dans un premier temps, il faut exécuter la commande `ir-keytable -t -p all`, puis appuyer sur les touches de la télécommande pour vérifier si le Raspberry Pi reçoit bien les signaux infrarouges.
Une fois le protocole (necx) détecté, il suffit d’appuyer sur une touche, de noter son code hexadécimal, puis d'enregistrer le code correspondant à la touche appuyé dans **/etc/rc_keymaps/customRemote.toml**.

Contenu du fichier **/etc/rc_keymaps/customRemote.toml** :


Pour charger la configuration des touches de la télécommande :
```bash
sudo ir-keytable -c -w /etc/rc_keymaps/customRemote.toml
```

### *Comment le code infrarouge est envoyé au PC ?*
Un script Python (`server.py`) s'exécute sur le Raspberry Pi, qui agit en tant qu'émetteur. Ce script lance le programme `ir-keytable` pour gérer les signaux infrarouges et démarre le serveur **Mosquitto** pour la communication MQTT. À chaque pression d'une ***touche numérique*** sur la télécommande infrarouge, le code correspondant est détecté par le Raspberry Pi et transmis au PC.

L'utilisateur doit saisir un code, puis appuyer sur le bouton **OK** de la télécommande IR pour soumettre le code au PC. Ce geste sert à "notifier" le PC (le récepteur) d'enregistrer le code dans le fichier `codeIR.txt`, afin que le programme C++ puisse lire ce fichier et vérifier la validité du code.

### L'adresse escape-ceo-csg.fr n'existe pas !
Il est nécessaire de modifier le fichier /etc/hosts en y ajoutant la ligne suivante :
```bash
sudo sh -c 'echo "127.0.0.1 escape-ceo-csg.fr" >> /etc/hosts'
```


