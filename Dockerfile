FROM php:8.2-apache-bookworm

LABEL org.opencontainers.image.title="HoorayHug Image"
LABEL org.opencontainers.image.description="A simple PHP and SQLite image hosting application."

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        imagemagick \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmagickwand-dev \
        libpng-dev \
        libsqlite3-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" gd pdo_sqlite \
    && pecl install imagick-3.7.0 \
    && docker-php-ext-enable imagick \
    && a2enmod rewrite \
    && sed -ri 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf \
    && rm -rf /tmp/pear ~/.pearrc /var/lib/apt/lists/*

ENV HOORAYHUG_IMAGE_VERSION=2026.05

COPY docker-entrypoint.sh /usr/local/bin/hoorayhug-image-entrypoint
COPY . /var/www/html

RUN chmod +x /usr/local/bin/hoorayhug-image-entrypoint \
    && chown -R www-data:www-data /var/www/html/data /var/www/html/imgs \
    && chmod -R u+rwX,g+rwX /var/www/html/data /var/www/html/imgs

VOLUME ["/var/www/html/data", "/var/www/html/imgs"]

ENTRYPOINT ["hoorayhug-image-entrypoint"]
CMD ["apache2-foreground"]
