FROM php:8.3-fpm

# Timezone
ENV TZ=America/Fortaleza
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Extensions
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions pdo_pgsql zip bz2 bcmath opcache
#mbstring json curl redis
RUN install-php-extensions @composer-2

RUN pecl install redis && docker-php-ext-enable redis

RUN apt update -y
#RUN apt install -y php-xdebug php-pdo_pgsql php-zip php-bz2 php-bcmath php-redis php-opcache php-mbstring php-json php-curl
#RUN apt install -y libaio1 libaio1-dev

# PHP conf
COPY docker-config/php/www.conf /usr/local/etc/php-fpm.d/www.conf
COPY docker-config/php/php-fpm.conf /usr/local/etc/php-fpm.conf
COPY docker-config/php/php-web.ini /usr/local/etc/php/php.ini

# Scheduler
RUN apt install -y systemctl supervisor cron
COPY docker-config/supervisor/supervisord.conf /etc/supervisord.conf
COPY docker-config/supervisor/steward_supervisord.conf /etc/supervisord.conf
RUN systemctl enable supervisor

COPY docker-config/cron/scheduler-laravel /etc/cron.d/scheduler-laravel
RUN chmod 0644 /etc/cron.d/scheduler-laravel && touch /var/log/cron.log && crontab /etc/cron.d/scheduler-laravel && mkdir /var/log/steward

RUN mkdir /app
WORKDIR /app
COPY . /app

RUN chown -R www-data:www-data /app

RUN composer install

RUN chmod 777 -R storage
RUN php artisan optimize:clear

EXPOSE 9000

ENTRYPOINT ["php-fpm", "--nodaemonize"]
