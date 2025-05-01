#!/bin/bash

# Démarrer MySQL en arrière-plan
service mysql start

# Attendre que MySQL soit prêt
echo "Attente de MySQL..."
until mysqladmin ping --silent; do
    sleep 1
done

# Créer la BDD si elle n'existe pas et exécuter le script SQL
mysql -u root <<EOF
CREATE DATABASE IF NOT EXISTS lanparty_hincelouis CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EOF

mysql -u root lanparty_hincelouis < /init.sql

# Démarrer le serveur PHP intégré
php -S 0.0.0.0:10000 -t /var/www/html

# S'assurer qu'il n'y a pas de caractères invisibles avant exit
exit 0