FROM php:latest

COPY . /var/www/html

EXPOSE 3000

CMD["apache2-foreground"]