#!/bin/bash

# Démarrer le serveur MySQL en arrière-plan
/usr/sbin/mysqld --user=mysql --datadir=/var/lib/mysql --skip-grant-tables &

# Attendre que MySQL soit prêt (une manière simple de vérifier)
sleep 5

# Lancer PHP-FPM en arrière-plan
php-fpm &

# Lancer Apache au premier plan
apachectl -D FOREGROUND

# Garder les processus en cours d'exécution
wait