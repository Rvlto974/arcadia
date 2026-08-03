FROM php:8.2-apache

# Configuration du DocumentRoot vers /public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Activation propre de AllowOverride All dans le VirtualHost par défaut
RUN sed -i '/<Directory \/var\/www\/html>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/sites-available/000-default.conf

# Alternative propre pour injecter le bloc Directory sans caractères invisibles
RUN echo '<Directory /var/www/html/public/>' >> /etc/apache2/apache2.conf \
    && echo '    Options Indexes FollowSymLinks' >> /etc/apache2/apache2.conf \
    && echo '    AllowOverride All' >> /etc/apache2/apache2.conf \
    && echo '    Require all granted' >> /etc/apache2/apache2.conf \
    && echo '</Directory>' >> /etc/apache2/apache2.conf

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

# Fix pour éliminer le warning ServerName d'Apache
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf