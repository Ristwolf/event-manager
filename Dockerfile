# Usa a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Instala extensões e dependências
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Copia os arquivos do projeto para dentro do container
WORKDIR /var/www/html
COPY . /var/www/html

# Dá permissão para a pasta storage e bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Habilita o módulo rewrite do Apache
RUN a2enmod rewrite

# Expõe a porta 80 para acesso ao servidor
EXPOSE 80

# Comando para iniciar o Apache
CMD ["apache2-foreground"]
