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
Avec la télécommande infrarouge, ils devront débloquer le coffre du CEO. Dans ce coffre ils trouveront le code de lancement de Arianne 6 et identifiant et code du compte bancaire du CEO. Tout ce qu'il faut pour usurper le CEO. Et nuire à sa vie.


## Suite challenge 3 pour conclure l'escape game

Une fois le coffre du CEO ouvert, une alarme se déclenche, le flag trouvé dans le coffre sera rentré tout seule grâce à un simple script BASH lancé avant de terminer le programme, et dans ce même script BASH, on les affichent l'adresse à laquel se rendre pour se connecter sur le compte du CEO avec le login et mot de passe trouvé dans le coffre du CEO, ou bien 
