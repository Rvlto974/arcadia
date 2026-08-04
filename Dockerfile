FROM php:8.2-apache

# Installer les extensions nécessaires pour MySQL/PDO
RUN docker-php-ext-install pdo pdo_mysql

# Activer mod_rewrite pour Apache (très utile pour le routage MVC)
RUN a2enmod rewrite

# Définir le répertoire de travail
WORKDIR /var/www/html

RUN a2enmod rewrite