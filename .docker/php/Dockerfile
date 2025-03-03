FROM php:8.1.0-apache AS APP_SERVER

ENV TZ=America/Sao_Paulo

WORKDIR /var/www/html/

COPY .docker/php/php.ini $PHP_INI_DIR/php.ini
COPY ./src/.env.example /var/www/html/.env

COPY ./.docker/php/afterbuild.sh /.docker/afterbuild.sh
RUN chmod 755 /.docker/afterbuild.sh

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Installing OS dependencies
RUN   apt-get update -y && \
    apt-get upgrade -y && \
    apt-get install -yq --no-install-recommends wget libyaml-dev libzip-dev libpng-dev unzip libssl-dev pkg-config git vim

RUN a2enmod rewrite
RUN pecl install yaml-2.1.0 zip && \
    docker-php-ext-install pdo pdo_mysql && \
    docker-php-ext-enable yaml zip pdo pdo_mysql 

# INSTALL COMPOSER
RUN cd /tmp/ && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# PHPUNIT
RUN cd /tmp/ && wget https://phar.phpunit.de/phpunit.phar && chmod +x phpunit.phar && mv phpunit.phar /usr/local/bin/phpunit


# NodeJS
RUN curl -fsSL https://deb.nodesource.com/setup_14.x | bash - && \
    apt-get install -y nodejs
# RUN apt-get install nodejs14 -y && \ apt-get install npm -y


EXPOSE 9055