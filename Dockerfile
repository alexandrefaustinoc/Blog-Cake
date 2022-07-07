FROM php:7.2-apache
LABEL maintainer="ono.naoyaa@gmail.com"

# Install the required packages and remove the apt cache.
RUN apt-get update

# install Postgre PDO
RUN apt-get install -y libpq-dev \
  && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql\
  && docker-php-ext-install pdo pdo_pgsql pgsql
# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

# Add cake command to system path
ENV PATH="${PATH}:/var/www/html/lib/Cake/Console"
ENV PATH="${PATH}:/var/www/html/app/Vendor/bin"



# Copy the code into /var/www/html/ inside the image
COPY . .

# Set default working directory
WORKDIR ./app

# Create tmp directory and make it writable by the web server
RUN mkdir -p \
    tmp/cache/models \
    tmp/cache/persistent \
  && chown -R :www-data \
    tmp \
  && chmod -R 770 \
    tmp

# Enable Apache modules and restart
RUN a2enmod rewrite \
  && service apache2 restart

EXPOSE 80
