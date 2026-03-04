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
    ca-certificates \
    gnupg \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Node.js 20 LTS (via NodeSource for modern Node compatible with Vite 7)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && node -v && npm -v

# Install PHP extensions required for Laravel
RUN docker-php-ext-install pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy composer files first (for caching)
COPY composer.json composer.lock ./

# Install PHP dependencies (no scripts yet so autoloader doesn't fail on missing code)
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Copy package files for npm caching
COPY package.json package-lock.json ./

# Install Node dependencies
RUN npm ci

# Copy the rest of the application code
COPY . .

# Build frontend assets with Vite
RUN npm run build

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
