#!/bin/bash

# Démarrer MySQL en arrière-plan
service mysql start

# Attendre au max 15 secondes que MySQL soit prêt
for i in {1..15}; do
    if mysqladmin ping --silent; then
        echo "✅ MySQL est prêt !"
        break
    else
        echo "⏳ En attente de MySQL ($i)..."
        sleep 1
    fi
done

# Attendre que MySQL soit prêt
echo "Attente de MySQL..."
until mysql -u root -e "SELECT 1" > /dev/null 2>&1; do
    sleep 1
done

# Créer la BDD si elle n'existe pas
mysql -u root -e "CREATE DATABASE IF NOT EXISTS lanparty_hincelouis CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
echo "bd créé"

# Exécuter le script SQL
mysql -u root lanparty_hincelouis < /init.sql

# Démarrer le serveur PHP sur le port attendu par Render
echo "🚀 Lancement du serveur PHP sur le port 10000"
php -S 0.0.0.0:10000 -t /var/www/html

exit 0