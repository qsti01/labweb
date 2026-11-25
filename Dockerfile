FROM wordpress:php8.2-apache

# Копируем разработанную тему FitnessApp в директорию тем WordPress
COPY ./wp-content/themes/fitnessapp /var/www/html/wp-content/themes/fitnessapp

# Устанавливаем права доступа для веб-сервера Apache (www-data)
RUN chown -R www-data:www-data /var/www/html/wp-content/themes/fitnessapp
