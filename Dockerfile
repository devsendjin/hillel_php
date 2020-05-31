FROM php:7.4.1-apache

#RUN docker-php-ext-install pdo_mysql

#RUN pecl install xdebug \
#    && docker-php-ext-enable xdebug

#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#COPY .docker/php/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y wget && \
    apt-get install -y git && \
    apt-get install -y zip

RUN git config --global user.email "test@gmail.com"
RUN git config --global user.name "My Name"

#RUN wget https://get.symfony.com/cli/installer -O - | bash

COPY default-symfony.conf /etc/apache2/sites-available

RUN a2ensite default-symfony.conf
RUN a2dissite 000-default.conf

RUN a2enmod rewrite

RUN service apache2 restart
