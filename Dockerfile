FROM php:8.1-apache # Ou une autre version de PHP si nécessaire

# Installer les dépendances système courantes
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    --no-install-recommends && rm -rf /var/lib/apt/lists/*

# Installer et activer les extensions PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install -j$(nproc) gd mysqli pdo pdo_pgsql zip

# Activer d'autres extensions PHP courantes (décommentez si nécessaire)
# RUN docker-php-ext-install -j$(nproc) intl opcache

# Copier les fichiers de l'application
COPY . /var/www/html/

# Définir le répertoire de travail
WORKDIR /var/www/html

# Configuration d'Apache (si nécessaire, adaptez selon vos besoins)
<FilesMatch \.php$>
    SetHandler application/x-httpd-php
</FilesMatch>
<Directory /var/www/html>
    Options Indexes FollowSymLinks MultiViews
    AllowOverride All
    Require all granted
</Directory>
# ... d'autres configurations d'Apache ...

# Exposer le port 80
EXPOSE 80

# Commande pour démarrer le serveur Apache (devrait être la commande par défaut de l'image php:-apache)
# CMD ["apache2-foreground"]