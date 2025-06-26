FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
	git zip unzip curl libpq-dev libonig-dev libxml2-dev \
	&& docker-php-ext-install pdo pdo_pgsql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/backend
COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data: /var/www/backend

EXPOSE 9000
CMD ["php-fpm"]