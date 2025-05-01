FROM php:8.1-apache

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

# Activer le module rewrite d'Apache (couramment utilisé pour les URLs propres)
RUN a2enmod rewrite

# Configuration d'Apache pour servir votre application depuis /var/www/html
<VirtualHost *:80>
    DocumentRoot /var/www/html
    <Directory /var/www/html/>
        Options Indexes FollowSymLinks MultiViews
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>

# Supprimer la configuration par défaut d'Apache
RUN a2dissite 000-default.conf

# Activer votre configuration
RUN a2ensite default

# Copier les fichiers de l'application
COPY . /var/www/html/

# Définir le répertoire de travail
WORKDIR /var/www/html

# Exposer le port 80
EXPOSE 80

# Commande pour démarrer le serveur Apache
CMD ["apache2-foreground"]