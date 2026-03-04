# Use official PHP image with FPM
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
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
    nodejs \
    npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions required for Laravel
RUN docker-php-ext-install pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy the application code
COPY . .

# Copy NGINX configuration
COPY nginx.conf /etc/nginx/sites-available/default

# Clean up existing public/build if present (avoids cross-OS path issues)
RUN rm -rf public/build

# Install dependencies (Composer and NPM)
RUN composer install --no-dev --optimize-autoloader
RUN npm install
RUN npm run build

# Make the customized startup script executable
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Expose port (Render sets the PORT env variable automatically, mapping to 80 internally behind their proxy)
EXPOSE 80

# Specify the command to run when starting the container
CMD ["/start.sh"]
