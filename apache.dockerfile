# On customize cette image; l'image officielle du serveur apache sous ubuntu
FROM ubuntu/apache2:latest

# Variables d'environnement
ENV APACHE_RUN_USER=symfony
ENV APACHE_RUN_GROUP=symfony

# Créer notre dossier de code pour le serveur
RUN mkdir -p /var/www/html/public

# On ajoute un fichier de configuration pour qu'apache nous serve les bons fichiers
COPY apache/default.conf /etc/apache2/sites-available/000-symfony.conf

# On active le "Virtual Host" : notre application symfony sera accessible grâce à ces lignes
RUN a2ensite 000-symfony.conf

# On active divers modules d'apache, nécessaire pour que symfony fonctionne
RUN a2enmod rewrite actions alias proxy_fcgi setenvif

# Modifier le USER de APACHE; sur ubuntu c'est dans le fichier envvars
RUN cat /etc/apache2/envvars

RUN sed -i "s/www-data/${APACHE_RUN_USER}/g" /etc/apache2/envvars

RUN cat /etc/apache2/envvars

RUN groupadd ${APACHE_RUN_GROUP}

RUN useradd -g ${APACHE_RUN_GROUP} ${APACHE_RUN_USER}