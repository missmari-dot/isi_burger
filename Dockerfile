# Stage 1: Build
FROM composer:latest AS build
WORKDIR /app
COPY . .
RUN composer install --no-dev --optimize-autoloader

# Stage 2: Runtime
FROM php:8.2-cli
WORKDIR /app
COPY --from=build /app .
CMD ["php", "artisan", "serve"]