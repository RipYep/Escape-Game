#!/bin/bash

## Ce script sert à démarrer une alarme si vous avez un serveur web

# Adresse IP du Raspberry
RASP="10.10.10.10"

# L'URL du serveur Flask
URL="http://$RASP/send"

# La donnée à envoyer dans le champ "message"
MESSAGE="/startAlarmSinceChestWasOpened"

# Utilisation de curl pour envoyer une requête POST avec la donnée dans le champ "message"
curl -X POST -F "message=$MESSAGE" "$URL" &>/dev/null
