# Escape-Game
Une escape game adaptée pour les lycéens et collégiens lors de la Journée Porte Ouverte à l'Institut Universitaire Technologique de Kourou, en Guyane Française.
![gf](https://github.com/user-attachments/assets/e04358d7-f799-4827-b65d-a7113efc2115)

---

## Table des matières
1. [Liste du matériel](#liste-du-matériel-)
2. [Scénario de l'escape game](#scénario-de-lescape-game)
   - [Fuir](#fuir)
   - [Ne pas fuir](#ne-pas-fuir)
3. [Challenges](#challenges)
   - [Challenge 1](#challenge-1)
   - [Challenge 2 : Infrarouge](#challenge-2--infrarouge)
   - [Suite challenge 2 pour conclure l'escape game](#suite-challenge-2-pour-conclure-lescape-game)
4. [Pré-requis pour que les challenges fonctionnent](#pré-requis-pour-que-les-challenges-fonctionnent)
   - [Branchement du capteur infrarouge au Raspberry](#branchement-du-capteur-infrarouge-au-raspberry)
   - [Modification du fichier de configuration](#modification-du-fichier-de-configuration)
   - [Installation de Mosquitto (MQTT) sur le PC et Raspberry](#installation-de-mosquitto-mqtt-sur-le-pc-et-raspberry)
   - [Installation de ir-keytable, evdev, et python sur le Raspberry](#installation-de-ir-keytable-evdev-et-python-sur-le-raspberry)
   - [Mappage des touches de la télécommande infrarouge](#mappage-des-touches-de-la-télécommande-infrarouge)
5. [Solutions des challenges](#solutions-des-challenges)
   - [Solution challenge 1](#solution-challenge-1)
   - [Solution challenge 2](#solution-challenge-2)
6. [Autres informations importantes](#autres-informations-importantes)
   - [Comment le code infrarouge est envoyé au PC ?](#comment-le-code-infrarouge-est-envoyé-au-pc-)
   - [Comment le PC reçoit le code envoyé du Raspberry ?](#comment-le-pc-reçoit-le-code-envoyé-du-raspberry-)
   - [L'adresse escape-ceo-csg.fr n'existe pas !](#ladresse-escape-ceo-csgfr-nexiste-pas-)
   - [Comment le code C++ vérifie la validité du code ?](#comment-le-code-c-vérifie-la-validité-du-code-)
   - [Comment lancer le programme C++ ?](#comment-lancer-le-programme-c-)
   - [Importer la base de donnée `escapegame` dans mariadb](#importer-la-base-de-donnée-escapegame-dans-mariadb)
---

## Liste du matériel :
  - 1 Raspberry Pi
  - 1 Télécommande IR (Infrarouge)
  - 3 câbles mâle-femelle
  - PC pour lancer le programme du coffre et serveur Flask
  - arduino Wi-Fi

## Scénario de l'escape game
Ils sont entrés par effraction dans la base spatiale, ils doivent retrouver le code qui permet de débloquer un coffre, où dans ce coffre, le CEO avait déposé tous ses post-it avec login et mots de passe à son compte de la base spatiale, numéros de comptes, des documents (il)légaux, des lingots d'or et même le code de lancement de Ariane 6. Dès que le coffre s'ouvre une alarme se déclenche et ils feront face à un choix : 
- Fuir avec le contenu du coffre.

Ou bien :
- Ne pas fuir, lancer la fusée, et partir avec le contenu du coffre.

### Fuir
Sinon, s'ils décidents de fuir, ils se feront attraper. Ils essayent de combrioler une base spatiale... On reste réaliste, on n'est pas dans un film.

### Ne pas fuir
S'ils décident de lancer la fusée grâce au code de lancement trouvé dans le coffre, ils pourront lancer la fusée, et partir avec tout le contenu du coffre.

---
> [!IMPORTANT]
> _Le CEO de l'entreprise est un passionné d'histoire, en particulier de la Seconde Guerre mondiale et de l'attaque de Pearl Harbor. Il a une collection précieuse d'objets historiques, dont un coffre-fort sécurisé par un code faisant hommage à cette évenement historique. 
Le code du coffre est l'année de l'attaque de Pearl Harbor, soit 1941._

---

## Challenges

### Challenge 1
...

### Challenge 2 : Infrarouge
Avec la télécommande infrarouge, ils devront débloquer le coffre du CEO. Dans ce coffre ils trouveront le code de lancement de Ariane 6, l'identifiant et code du compte bancaire du CEO, login et mot de passe à son compte, une photo de famille, des documents (il)légaux, de l'or, et une liste de ses collaborateurs. Tout ce qu'il faut pour usurper le CEO (si nos participants/participantes se sentent... Malveillants/Malveillantes), ne serait-ce que pour quelques heures, voire quelques minutes/secondes. Largement suffisant pour causer des dégats conséquents à sa réputation, son entreprise, et notamment sa vie.

### Suite challenge 2 pour conclure l'escape game
Une fois le coffre du CEO ouvert, une alarme se déclenche et ils devront faire fasse à un choix :
- Fuir. Mais ils se feront attraper car c'est un lieu hautement sécurisé. Ils ont réussi à rentrer mais n'arriveront jamais à s'échapper.

Ou bien :
- Se connecter sur le compte du CEO, et lancer Ariane 6.

S'ils décident de ne pas fuir et de lancer la fusée avec le code de lancement, un autre script BASH sera exécuté par le biais du code C++. Ce script BASH va leur ouvrir le navigateur par défaut à l'adresse `escape-ceo-csg.fr/ceo-account.html` pour pouvoir se connecter au compte du CEO, et 0.5 secondes plus tard, on affiche le contenu du coffre en ouvrant *Files Manager* à un endroit "caché" du système Linux, où ils pourront consulté brièvement le contenu du coffre et lancer la fusée avec le compte du CEO.

Interface web pour se connecter à son compte :
![image](https://github.com/user-attachments/assets/ddf20ca2-303d-4c44-876f-36292dca903b)

Pour lancer la fusée avec le code de lancement :
![image](https://github.com/user-attachments/assets/c5570035-c622-4953-bf38-d9c258bb0bcf)

Animation de lancement de la fusée après avoir mis le bon code (Celui donné dans le fichier `code lancement ariane 6`)
![image](https://github.com/user-attachments/assets/50fe0511-38f9-47f0-a487-4e45b8cccae6)

---

## Pré-requis pour que les challenges fonctionnent

### Branchement du capteur infrarouge au Raspberry
![image](https://github.com/user-attachments/assets/17acd429-4ad7-486b-b69a-875a381f2744)

> [!CAUTION]
> Bien faire attention lors du branchement sur 3.3 V, et ne pas le mettre au PIN juste au-dessus, qui est 5 V car le **récepteur infrarouge iduino** risque de cramer.  
> Assurez-vous également que le **PIN GPIO** est bien branché au **18**, sinon il sera nécessaire de le rectifier dans le fichier `/boot/config.txt`.

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

## Solutions des challenges

### Solution challenge 1
...

### Solution challenge 2
Le code pour débloquer le coffre est l'année de l'attaque de Pearl Harbor en 1941. Une fois ce code entré, ils déverrouillent le coffre et doivent ensuite choisir entre fuir avec son contenu ou rester et lancer la fusée en se connectant au compte du CEO avec son identifiant de connexion.

---

## Autres informations importantes

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

> [!NOTE]
> Le serveur MQTT marche pas ? Sans doute dû aux adresses IP configurées en statique dans les codes `mqttClient.py` et `mqttServer.py`. Il faudra remplacer l'adresse IP dans ces 2 codes Python par l'adresse IP de votre Raspberry.

### *L'adresse **escape-ceo-csg.fr** n'existe pas !*
Il est nécessaire de modifier le fichier `/etc/hosts` en y ajoutant la ligne suivante :
```bash
sudo sh -c 'echo "127.0.0.1 escape-ceo-csg.fr" >> /etc/hosts'
```
Cette ligne est nécessaire pour que le script BASH `launchRocket.sh` puisse ouvrir le navigateur sur cette adresse.

### *_Comment le code C++ vérifie la validité du code ?_*
Le code C++ vérifie toutes les 4.5 secondes si le code est bon, et s'il est bon il ouvre le coffre, sinon il reste fermé.
La fonction exacte qui vérifie la validité du code est celle-ci :
```c++
// Fonction pour lire le code IR depuis un fichier
bool isValidCode(const string &filePath, const string &validCode) {
  ifstream inputFile(filePath);
  string fileCode;

  if (inputFile.is_open()) {
    getline(inputFile, fileCode);  // Lit la première ligne du fichier
    inputFile.close();

    // Compare le code du fichier avec le code valide
    return fileCode == validCode;
  } else {
    cerr << "Erreur d'ouverture du fichier!" << endl;
    return false;
  }
}
```
Et puis dans la partie principale du code on la définit, et précise le chemin du fichier à lire (ou juste le nom du fichier s'il est juste là) et le code valide.
```c++
int main() {
  // Le code IR valide, tu peux le modifier en fonction de ton besoin
  string validCode = "1941";
  string filePath = "codeIR.txt";

  // Vérifie si le code dans le fichier est valide
  bool codeValid = isValidCode(filePath, validCode);

  // Main loop
  while (true) {
    // Vérifie si le code est valide à chaque itération
    codeValid = isValidCode(filePath, validCode);

    clearScreen();

    drawStickmanOpeningChest(codeValid);

    // Si le code est valide, on demande à l'utilisateur s'il veut fuir ou pas
    if (codeValid) {
      // system("bash startAlarm.sh");
      cout << Utils::setTextColor(2) << "L'alarme s'est déclenchée, la sécurité arrive dans 45 secondes !" << Utils::resetTextColor() << "\n";
      string choice = "";
      cout << "Voulez-vous fuir ? (y/n) : ";
      cin >> choice;

      if (choice == "yes" || choice == "Yes" || choice == "Y" || choice == "y") {
        Utils::clearScreen();
        cout << "Vous vous mettez à courir, mais on vous attrape... Vous pensiez quoi ? Vous voler une base spatiale..." << "\nTHE END";
        break;
      } else if (choice == "no" || choice == "No" || choice == "N" || choice == "n") {
        // Sinon, on lance le script launchRocket.sh
        system("bash launchRocket.sh");
        break;
      } else {
        cout << "Stressé...? Normale..." << "\n";
      }
    }

    // Attente de 12 secondes avant la prochaine itération
    Utils::delay(4500);
  }

  return 0;
}
```

### *_Comment lancer le programme C++ ?_*
Donner les droits d'exécutions :
```bash
chmod u+x compile
```
Puis, il suffit simplement de faire :
```bash
./compile
```
Pour lancer le programme C++.

### Importer la base de donnée `escapegame` dans mariadb
Il faudra d'abord importer la base de donnée pour pouvoir se connecter au compte du CEO, mais aussi pour vérifier le code de lancement

> [!IMPORTANT]
> Tout est en clair dans la base de donnée. Rien n'est hashé ou encrypté par une clé.

Pour importer la base de donnée il suffit de taper la commande suivante dans le terminal, à l'endroit `escape-game/db/escapegame.sql`
```bash
cat escapegame.sql | mariadb -u <username> -p
```
Lit le fichier `escapegame.sql` et envoie son contenu à MariaDB, où il est exécuté en tant qu'utilisateur `<username>`, avec une demande de saisie du mot de passe.
Remplacer `<username>` par le nom utilisateur créée dans votre base de donnée. Si c'est root alors :
```bash
cat escapegame.sql | mariadb -u root -p
```
