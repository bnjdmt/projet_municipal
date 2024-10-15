# Utiliser une image PHP avec FPM pour un backend Symfony
FROM php:8.2-fpm

# Installer les dépendances système
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb


# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier les fichiers du projet Symfony dans le conteneur
COPY . .

# Installer Symfony CLI pour le développement (facultatif)
RUN curl -sS https://get.symfony.com/cli/installer | bash && mv /root/.symfony*/bin/symfony /usr/local/bin/symfony

# Donner les permissions correctes
RUN chown -R www-data:www-data var/cache var/log var

# Exposer le port pour PHP-FPM
EXPOSE 9000
