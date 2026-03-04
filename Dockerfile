# Use official PHP 8.4 FPM image
FROM php:8.4-fpm

# Set working directory
WORKDIR /var/www/html

# Install system dependencies (including libpq-dev for PostgreSQL)
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpq-dev \
    zip \
    unzip \
    nginx \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions required for Laravel
RUN docker-php-ext-install pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy composer files first for layer caching
COPY composer.json composer.lock ./

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Copy the rest of the application code (includes pre-built public/build assets)
COPY . .

# Run composer scripts now that all code is present
RUN composer dump-autoload --optimize

# Copy NGINX configuration
COPY nginx.conf /etc/nginx/sites-available/default

# Copy startup script and make it executable
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Expose port 80
EXPOSE 80

# Start the container
CMD ["/start.sh"]
