# Usa la imagen oficial de Ubuntu como base
FROM ubuntu:latest

# Actualiza los repositorios e instala las dependencias necesarias
#RUN apt-get update && apt-get install -y \
   
 #   && rm -rf /var/lib/apt/lists/*

# Instala PHP, NGINX, Composer y Node.js
RUN apt-get update && apt-get install -y \
    php-fpm \
    php-mysql \
    nginx \
    software-properties-common \
    curl \
    php-cli \
    php-xml \
    php-curl \
    php-mbstring \
    npm \
    unzip \
    wget \
    && rm -rf /var/lib/apt/lists/*

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


# Copia la configuración de NGINX
COPY laravel.conf /etc/nginx/sites-available/default

RUN wget -O composer-setup.php https://getcomposer.org/installer

RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
# Expone los puertos 80 (NGINX) y 443 (si es necesario)
EXPOSE 80

EXPOSE 5173

# Comando para iniciar NGINX
CMD /etc/init.d/php8.3-fpm start && nginx -g "daemon off;"
