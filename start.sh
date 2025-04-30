#!/bin/bash

# Attendre que MySQL soit prêt
echo "Attente de MySQL..."
until mysql -u root -e "SELECT 1" > /dev/null 2>&1; do
    sleep 1
done

# Créer la BDD si elle n'existe pas
mysql -u root -e "CREATE DATABASE IF NOT EXISTS lanparty_hincelouis CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# Exécuter le script SQL
mysql -u root lanparty_hincelouis < /init.sql

# Démarrer le serveur PHP sur le port attendu par Render
echo "Démarrage du serveur PHP sur le port $PORT"
php -S 0.0.0.0:$PORT -t /var/www/html

exit 0
