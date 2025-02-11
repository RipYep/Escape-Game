#!/bin/bash

# Vérifie si le script est exécuté avec les droits root
if [ "$(id -u)" -ne 0 ]; then
    echo "Ce script doit être exécuté en tant que root. Utilise : sudo ./setup.sh"
    exit 1
fi

# Récupère l'utilisateur courant (qui a lancé sudo)
CURRENT_USER=$(logname)

# Déplacement du répertoire web escape-game vers /var/www/html/
if [ -d "./escape-game" ]; then
    mv ./escape-game /var/www/html/
    chown -R www-data:www-data /var/www/html/escape-game  # Assigne à l'utilisateur du serveur web
    chmod -R 755 /var/www/html/escape-game  # Lecture et exécution pour tous, écriture pour le propriétaire
    echo "Le répertoire 'escape-game' a été déplacé vers /var/www/html/ et les permissions ont été ajustées."
else
    echo "Erreur : Le répertoire 'escape-game' n'existe pas dans le répertoire actuel."
fi

# Déplacement du répertoire CEO vers /etc/CEO/
if [ -d "./CEO" ]; then
    mv ./CEO /etc/
    chown -R "$CURRENT_USER":"$CURRENT_USER" /etc/CEO  # Assigne les droits à l'utilisateur qui a lancé sudo
    chown 755 /etc/CEO
    chmod 666 /etc/CEO/*  # Accès total pour le propriétaire
    echo "Le répertoire 'CEO' a été déplacé vers /etc/CEO/ et appartient maintenant à $CURRENT_USER."
else
    echo "Erreur : Le répertoire 'CEO' n'existe pas dans le répertoire actuel."
fi

echo "Configuration terminée avec succès !"
