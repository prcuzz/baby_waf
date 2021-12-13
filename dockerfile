FROM  ctftraining/base_image_nginx_mysql_php_56

COPY file /var/www/html

RUN chmod -R 777 /var/www/html/* \
	&& sh -c 'mysqld_safe &' \
		&& sleep 5s \
	&& mysql -e "source /var/www/html/db.sql;" -uroot -proot

EXPOSE 80

CMD ["/bin/sh", "-c", "/var/www/html/start.sh"]
