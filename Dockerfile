FROM php:8.0-fpm-alpine

# Installer les dépendances système nécessaires pour PHP et Apache
RUN apk add --no-cache --update \
    apache2 \
    apache2-utils \
    libpng-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    freetype-dev \
    libxpm-dev

# Installer les extensions PHP de base
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp --with-xpm
RUN docker-php-ext-install -j$(nproc) gd mysqli pdo pdo_pgsql zip

# Installer d'autres extensions courantes (à adapter selon vos besoins)
RUN docker-php-ext-install -j$(nproc) \
    bcmath \
    mbstring \
    xml \
    intl

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Activer le module rewrite d'Apache
RUN a2enmod rewrite

# Copier la configuration Apache personnalisée
COPY apache2.conf /etc/apache2/apache2.conf
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Copier le code de l'application dans le conteneur
COPY . /var/www/html

# Définir le dossier de travail
WORKDIR /var/www/html

# Exposer le port 80 pour Apache
EXPOSE 80

# Définir la commande pour démarrer Apache en arrière-plan et PHP-FPM au premier plan
CMD ["/bin/sh", "-c", "php-fpm & apachectl -D FOREGROUND"]

#17ujNaViilm1FDOK c'est le mdp de la base de données