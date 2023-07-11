FROM php:apache
# php files to working directory
COPY . /var/www/html

EXPOSE 80

# Define a volume for live code synchronization
VOLUME /var/www/html

# start Apache server
CMD ["apache2ctl", "-D", "FOREGROUND"]