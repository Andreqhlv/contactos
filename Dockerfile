# Usa imagen base oficial de PHP con Apache
FROM php:8.2-apache

# Instala mysqli
RUN docker-php-ext-install mysqli

# Copia los archivos al contenedor
COPY . /var/www/html/

# Da permisos
RUN chown -R www-data:www-data /var/www/html
