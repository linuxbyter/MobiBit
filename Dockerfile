FROM php:8.4-apache
RUN apt-get update && apt-get install -y \
    git curl zip unzip nodejs npm libgd-dev \
    && docker-php-ext-install pdo pdo_pgsql gd
COPY . /var/www/html
WORKDIR /var/www/html
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --ignore-platform-reqs --no-scripts
RUN npm install && npm run build
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf
EXPOSE 80
