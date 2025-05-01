# Choisir l'image PHP officielle avec CLI
FROM php:8.0-cli

# Installer les dépendances PHP + MySQL server
RUN apt-get update && \
    apt-get install -y \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
        default-mysql-server \
        mariadb-client && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd mysqli && \
    docker-php-ext-enable gd mysqli

# Copier le code de l'application dans le conteneur
COPY . /var/www/html

# Copier le script SQL et le script de démarrage
COPY init.sql /init.sql
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Définir le dossier de travail
WORKDIR /var/www/html

# Exposer le port sur lequel ton serveur PHP intégré tourne
EXPOSE 10000

# Lancer le script qui démarre MySQL + PHP
CMD ["/bin/bash", "/start.sh"]
