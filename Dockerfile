# Choisir l'image PHP officielle
FROM php:8.0-cli

# Installer les dépendances nécessaires
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd

# Copier tout le contenu du dossier actuel dans /var/www/html
COPY . /var/www/html

# Définir le répertoire de travail sur la racine du projet
WORKDIR /var/www/html

# Exposer le port 10000 pour l'accès externe
EXPOSE 10000

# Lancer le serveur PHP intégré
CMD ["php", "-S", "0.0.0.0:10000", "-t", "/var/www/html"]
