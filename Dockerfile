FROM php:8.2-apache

# Instalar extensões necessárias para MySQL (PDO)
RUN docker-php-ext-install pdo pdo_mysql

# Copiar o projeto para o Apache
COPY . /var/www/html/

# Garantir permissões corretas
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
