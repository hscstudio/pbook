FROM enryold/docker-nginx-php7-yii2

COPY . /var/www/html

RUN chmod -R 777 /var/www/html/assets
RUN chmod -R 777 /var/www/html/runtime
RUN chmod -R 777 /var/www/html/web/assets
RUN chmod -R 777 /var/www/html/tmp