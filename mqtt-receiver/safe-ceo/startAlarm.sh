#!/bin/bash

# L'URL du serveur Flask
URL="http://10.122.6.12:8086/send"

# La donnée à envoyer dans le champ "message"
MESSAGE="/startAlarmSinceChestWasOpened"

# Utilisation de curl pour envoyer une requête POST avec la donnée dans le champ "message"
curl -X POST -F "message=$MESSAGE" "$URL" &>/dev/null
