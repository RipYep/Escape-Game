#!/bin/bash

# Ouvre l'adresse dans le navigateur par défaut
xdg-open http://escape-ceo-csg.fr/escape-game/ceo-account.html

# Pause pour laisser le navigateur s'ouvrir
sleep 0.8

# Ouvre l'explorateur de fichiers à /etc/CEO/
xdg-open "/home/$USER/IR+Mqtt & Web/CEO/"
