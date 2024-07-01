# Utilise l'image officielle PHP avec Apache
FROM php:8.1-apache

# Installe les dépendances nécessaires
RUN apt-get update && apt-get install -y \
    git \
    unzip

# Installe Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Définit le répertoire de travail
WORKDIR /var/www/html

# Copie les fichiers de votre application dans le conteneur
COPY . /var/www/html

# Installe les dépendances définies dans composer.json
RUN composer install

# Donne les permissions appropriées
RUN chown -R www-data:www-data /var/www/html