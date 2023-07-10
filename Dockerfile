FROM php:apache
# php files to working directory
COPY . /var/www/html

EXPOSE 80
# start Apache server
CMD ["apache2ctl", "-D", "FOREGROUND"]