# Choisir une image PHP officielle
FROM php:8.0-cli

# Installer les dépendances
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd

# Copier tout le projet dans le conteneur
COPY . /var/www/html

# Définir le répertoire de travail
WORKDIR /var/www/html

# Exposer le port
EXPOSE 10000

# Lancer PHP built-in server
CMD ["php", "-S", "0.0.0.0:10000", "-t", "."]
