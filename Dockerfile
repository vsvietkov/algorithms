FROM php:8.2

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
RUN apt-get update && apt-get install -y zip unzip

ARG workdir=/algorithms
WORKDIR ${workdir}
