FROM php:8.2-apache

# Configuration du DocumentRoot vers /public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Installation des dépendances et extensions
RUN apt-get update && apt-get install -y \
    libssl-dev \
    unzip \
    git \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_mysql
RUN pecl install mongodb && docker-php-ext-enable mongodb
RUN a2enmod rewrite

WORKDIR /var/www/html

# ... (le reste de votre Dockerfile) ...

# Fix pour éliminer le warning ServerName d'Apache
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf