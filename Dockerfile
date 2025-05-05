FROM php:8.1-apache

# Installer les dépendances système et les bibliothèques nécessaires pour les extensions
RUN apt-get update && apt-get install -y --no-install-recommends \
    libpq-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && rm -rf /var/lib/apt/lists/*

# Installer et activer les extensions PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install -j$(nproc) gd mysqli pdo pdo_pgsql zip

# Activer explicitement l'extension pdo_pgsql
RUN docker-php-ext-enable pdo_pgsql

# Activer le module rewrite d'Apache
RUN a2enmod rewrite

# Copier la configuration du VirtualHost
COPY vhost.conf /etc/apache2/sites-available/your_app.conf

# Désactiver le site par défaut
RUN a2dissite 000-default.conf

# Activer votre configuration de VirtualHost
RUN a2ensite your_app.conf

# Copier les fichiers de l'application
COPY . /var/www/html/

# Définir le répertoire de travail
WORKDIR /var/www/html

# Exposer le port 80
EXPOSE 80

# Commande pour démarrer le serveur Apache
CMD ["apache2-foreground"]
