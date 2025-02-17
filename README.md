# Escape Game
Une escape game adaptée pour les lycéens et collégiens lors de la Journée Porte Ouverte à l'Institut Universitaire Technologique de Kourou le 7 Février 2025, en Guyane Française.
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
   - [Mise en place de l'escape game avec le script `setup.sh`](#mise-en-place-de-lescape-game-avec-le-script-setupsh)
   - [Qu'est-ce que le fichier `setup.sh` fait ?](#quest-ce-que-le-fichier-setupsh-fait-)
7. [Problèmes rencontrés](#problèmes-rencontrés)
   - [Alarme avec les M5Stack](#alarme-avec-les-m5stack)
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
- Ne pas fuir, lancer la fusée et partir avec le contenu du coffre.

### Fuir
Sinon, s'ils décident de fuir, ils se feront attraper. Ils essaient de cambrioler une base spatiale... On reste réaliste, on n'est pas dans un film.

### Ne pas fuir
S'ils décident de lancer la fusée grâce au code de lancement trouvé dans le coffre, ils pourront lancer la fusée, et partir avec tout le contenu du coffre.

---
> [!IMPORTANT]
> _Le CEO de l'entreprise est un passionné d'histoire, en particulier de la Seconde Guerre mondiale et de l'attaque de Pearl Harbor. Il a une collection précieuse d'objets historiques, dont un coffre-fort sécurisé par un code faisant hommage à cet événement historique. 
Le code du coffre est l'année de l'attaque de Pearl Harbor, soit 1941._

---

## Challenges

### Challenge 1 : Désactivation de l'alarme à la base spatiale


À l'entrée sur le site de la base spatiale, une alarme silencieuse se déclenche automatiquement. Pour arrêter l'alarme et accéder au bureau du directeur, les participants disposent de 5 minutes pour désactiver l'alarme. Si le temps imparti est dépassé, une alerte sera envoyée à la gendarmerie et les participants risquent de finir en prison !

**Objectif :**
Les participants devront désactiver l'alarme en répondant correctement à une série de questions à travers une interface web accessible dans la salle. 

![image](https://github.com/user-attachments/assets/6e84c653-86b3-4efb-9781-6f9f50cc316b)

**Prérequis techniques pour réaliser ce challenge :**

1. Mettre à jour le système :
    ```bash
    sudo apt update && sudo apt upgrade
    ```

2. Installer Python et `pip` :
    ```bash
    sudo apt install python3.12-pip
    ```

3. Installer Flask :
    ```bash
    pip3 install flask
    ```



**Déploiement du serveur :**

Pour mettre en place ce challenge, vous devrez télécharger le dossier *escapeGameCollege*.

Assurez-vous que tout fonctionne correctement avant de lancer le challenge !


### Challenge 2 : Infrarouge
Avec la télécommande infrarouge, ils devront débloquer le coffre du CEO. Dans ce coffre ils trouveront le code de lancement d'Ariane 6, l'identifiant et code du compte bancaire du CEO, login et mot de passe à son compte, une photo de famille, des documents (il)légaux, de l'or, et une liste de ses collaborateurs. Tout ce qu'il faut pour usurper le CEO (si nos participants/participantes se sentent... Malveillants/Malveillantes), ne serait-ce que pour quelques heures, voire quelques minutes/secondes. Largement suffisant pour causer des dégâts conséquents à sa réputation, son entreprise, et notamment sa vie.

### Suite challenge 2 pour conclure l'escape game
Une fois le coffre du CEO ouvert, une alarme se déclenche et ils devront faire face à un choix :
- Fuir. Mais ils se feront attraper car c'est un lieu hautement sécurisé. Ils ont réussi à rentrer mais n'arriveront jamais à s'échapper.

Ou bien :
- Se connecter sur le compte du CEO, et lancer Ariane 6.

S'ils décident de ne pas fuir et de lancer la fusée avec le code de lancement, un autre script BASH sera exécuté par le biais du code C++. Ce script BASH va leur ouvrir le navigateur par défaut à l'adresse `escape-ceo-csg.fr/ceo-account.html` pour pouvoir se connecter au compte du CEO, et 0.5 secondes plus tard, on affiche le contenu du coffre en ouvrant *Files Manager* à un endroit "caché" du système Linux, où ils pourront consulter brièvement le contenu du coffre et lancer la fusée avec le compte du CEO.

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

Sauvegarder après avoir modifié (`CTRL + X, puis Y et ENTER`).

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
Les réponses aux questions sont les suvantes :

![image](https://github.com/user-attachments/assets/5eb81ac7-09b0-404b-a01d-15aedb930b71)


### Solution challenge 2
Le code pour débloquer le coffre est l'année de l'attaque de Pearl Harbor en 1941. Une fois ce code entré, ils déverrouillent le coffre et doivent ensuite choisir entre fuir avec son contenu ou rester et lancer la fusée en se connectant au compte du CEO avec son identifiant de connexion.

Lorsque le coffre est verrouillé, il s'affiche de cette manière.
![image](https://github.com/user-attachments/assets/2cd858c7-c1ce-4223-b87f-196cc210baa4)

Une fois le coffre déverrouillé, ils auront le choix entre s’enfuir ou rester pour lancer la fusée.
![image](https://github.com/user-attachments/assets/b6a89a46-cc87-405c-9699-cecfec534830)

S'ils décident de ne pas fuir, ils seront redirigés vers l'adresse escape-ceo-csg.fr et invités à se connecter au compte du CEO.

Interface web pour se connecter à son compte :
![image](https://github.com/user-attachments/assets/ddf20ca2-303d-4c44-876f-36292dca903b)

Pour lancer la fusée avec le code de lancement (Celui donné dans le fichier `code lancement ariane 6`) :
![image](https://github.com/user-attachments/assets/c5570035-c622-4953-bf38-d9c258bb0bcf)

Animation de lancement de la fusée après avoir mis le bon code :
![image](https://github.com/user-attachments/assets/50fe0511-38f9-47f0-a487-4e45b8cccae6)

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
> Le serveur MQTT ne marche pas ? Sans doute dû aux adresses IP configurées en statique dans les codes `mqttClient.py` et `mqttServer.py`. Il faudra remplacer l'adresse IP dans ces 2 codes Python par l'adresse IP de votre Raspberry.

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
Et puis, dans la partie principale du code on la définit, et précise le chemin du fichier à lire (ou juste le nom du fichier s'il est juste là) et le code valide.
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
Donner les droits d'exécution :
```bash
chmod u+x compile
```
Puis, il suffit simplement de faire :
```bash
./compile
```
Pour lancer le programme C++.

### Importer la base de donnée `escapegame` dans mariadb
Il faudra d'abord importer la base de données pour pouvoir se connecter au compte du CEO, mais aussi pour vérifier le code de lancement

> [!IMPORTANT]
> Tout est en clair dans la base de données. Rien n'est hashé ou encrypté par une clé.

Pour importer la base de données il suffit de taper la commande suivante dans le terminal, à l'endroit `escape-game/db/escapegame.sql`
```bash
cat escapegame.sql | mariadb -u <username> -p
```

Lit le fichier `escapegame.sql` et envoie son contenu à MariaDB, où il est exécuté en tant qu'utilisateur `<username>`, avec une demande de saisie du mot de passe.
Remplacer `<username>` par le nom utilisateur créé dans votre base de données. Si c'est `root` alors :
```bash
cat escapegame.sql | mariadb -u root -p
```

## Mise en place de l'escape game avec le script `setup.sh`

### *_Qu'est ce que le fichier `setup.sh` fait ?_*

Le fichier `setup.sh` permet de configurer l'escape game en effectuant les opérations suivantes :

1. **Déplacement du répertoire web `escape-game`** :
   - Déplace le répertoire `escape-game` dans le répertoire `/var/www/html/`, qui est le répertoire par défaut pour les fichiers web sur un serveur.
   - Attribue les permissions nécessaires au répertoire `escape-game` pour qu'il puisse être correctement servi par le serveur web (permissions de lecture et d'exécution pour tout le monde, et écriture pour le propriétaire).
   - Exemple de commande exécutée :
     ```bash
     sudo mv escape-game /var/www/html/
     sudo chown -R www-data:www-data /var/www/html/escape-game
     sudo chmod -R 755 /var/www/html/escape-game
     ```

2. **Déplacement du répertoire `CEO`** :
   - Déplace le répertoire `CEO` dans `/etc/CEO/`, afin de centraliser les informations liées au compte CEO dans un répertoire système sécurisé.
   - Attribue les droits nécessaires au répertoire `CEO` pour que l'utilisateur actuel puisse y accéder et modifier les fichiers (permissions de lecture et d'écriture pour le propriétaire, sans exécution).
   - Exemple de commande exécutée :
     ```bash
     sudo mv CEO /etc/
     sudo chown -R $USER:$USER /etc/CEO
     sudo chmod -R 600 /etc/CEO
     ```

3. **Vérification des droits d'exécution** :
   - Si le script est exécuté sans les droits root (en tant qu'utilisateur non privilégié), il affiche un message d'erreur et arrête l'exécution.
   - Exemple de commande exécutée pour vérifier les droits :
     ```bash
     if [ "$(id -u)" -ne 0 ]; then
         echo "Ce script doit être exécuté en tant que root. Utilise : sudo ./setup.sh"
         exit 1
     fi
     ```

4. **Configuration terminée** :
   - Une fois les opérations effectuées, un message de confirmation est affiché pour indiquer que la configuration a été réalisée avec succès.

### Exemple de sortie attendue :

```bash
Le répertoire 'escape-game' a été déplacé vers /var/www/html/ et les permissions ont été ajustées.
Le répertoire 'CEO' a été déplacé vers /etc/CEO/ et appartient maintenant à [user] avec des droits de lecture et écriture.
Configuration terminée avec succès !
```

> [!NOTE]
> Pour ce qui est d'importer la base de données, il serait préférable que vous le fassiez soit en graphique depuis `phpmyadmin`, soit en ligne de commande, comme vu précédemment.

### Lancer `setup.sh`
Donner les droits d'exécution au fichier BASH :
```bash
chmod +x setup.bash
```

Lancer le fichier BASH
```bash
sudo ./setup.sh
```

---

## Problèmes rencontrés

### Alarme avec les M5Stack
(Adrien) : Pour ma part j'ai dû passer un bon 3-4 h à essayer de faire fonctionner le buzzer sur le M5Stack Core 2. Donc le code de la doc du M5Stack ne marchait pas, non plus celui de `ChatGPT`, et pareil les codes qu'on trouve sur des forums...
Donc après une matinée entière, j'ai abandonné vu que la librairie `M5` n'existait pas (???). Mettre le M5 à jour non plus, pas fonctionné... Et idem si je mettais la librairie `m5stack`...
