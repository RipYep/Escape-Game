# Escape-Game
Une escape game adaptée pour les lycéens et collégiens.

Liste du matériel :
  - Raspberry Pi zéro
  - Télécommande IR (Infrarouge)
  - 3 câbles mâle-femelle
  - PC portable pour lancer le programme du coffre
  - arduino

## Scénario de l'escape game
Ils sont entrés par effraction dans la base spatiale, ils doivent retrouver le code qui permet de débloquer un coffre, où dans ce coffre, le CEO avait déposé tous ces post-it avec des mots de passe, numéros de comptes, des documents (il)légaux, des lingots d'or et le code de lancement de Arianne 6. Dans ces post-it, il y aura un login et mot de passe sur son compte. Dès que le coffre s'ouvre une alarme se déclenche et ils auront 2 minutes pour : 
- Soit s'échapper, et selon le temps pris pour arriver jusque là, soit ils se font attraper s'ils ont pris trop de temps, soit ils arrivent à s'échapper.
- Soit lancer la fusée

S'ils décident de lancer la fusée grâce au code de lancement trouvé dans le coffre, ils pourront lancer la fusée, qui sera lancée trop tôt, et fera sûrement **BOOM**. Ou pas.

## Challenge 1 : Alarme silencieuse
Lorsqu'ils rentrent dans la base spatiale par éffraction, ils vont devoir dans un premier temps désactiver l'alarme, donc ils vont devoir chercher *pas très loin* dans la salle, un M5Stack, qui aura un programme lancé par défaut pour affiché le flag pour valider ce premier challenge. Une fois l'alarme désactivé, le "gardien" donne la télécommande infrarouge et le deuxième challenge commence.

## Challenge 2 : 


## Challenge 3 : Infrarouge
Avec la télécommande infrarouge, ils devront débloquer le coffre du CEO. Dans ce coffre ils trouveront le code de lancement de Arianne 6, l'identifiant et code du compte bancaire du CEO, login et mot de passe à son compte et une photo de famille, des documents (il)légaux, de l'or, et une liste de ses collaborateurs. Tout ce qu'il faut pour usurper le CEO (si nos participants/participantes se sentent... Malveillants), ne serait-ce que pour quelques heures, voire quelques minutes/secondes. Largement suffisant pour causer des dégats conséquents à sa réputation, son entreprise, et notamment sa vie.

### *Comment le code infrarouge est envoyé au PC ?*
Un code python server.py sur le raspberry qui fait office de émetteur, lance ir-keytable et le serveur **Mosquitto**, et chaque touche ***numérique infrarouge*** détécter de la télécommande infrarouge, sera envoyé au PC. Ils devront taper un code puis OK sur la télécommande IR pour pouvoir "submit" le code infrarouge au PC, et surtout pour "notifier" le PC (le recépteur) d'enregistrer le code dans le fichier ***codeIR.txt***.

## Suite challenge 3 pour conclure l'escape game
Une fois le coffre du CEO ouvert, une alarme se déclenche, le flag trouvé dans le coffre sera rentré tout seule grâce à un simple script BASH lancé avant de terminer le programme.
À partir de là, ils feront fasse à un choix :
- Fuir et potentiellement se faire attraper si trop de temps à été pris pour en arriver là.
Ou bien :
- Se connecter sur le compte du CEO, et lancer Arianne 6.

S'ils décident de ne pas fuir, et lancer la fusée avec le code de lancement, un autre script BASH sera exécuté par le biais du code c++. Ce script BASH va leur ouvrir *Files Manager* à un endroit "caché" dans le système Linux, où ils pourront voir tous les documents trouvés dans le coffre, notamment login et mot de passe au compte + code de lancement de la fusée et l'adresse à laquel se rendre pour se connecter au compte du CEO et lancer la fusée.
