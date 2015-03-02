FROM 	ubuntu:latest

RUN	apt-get update 					&& \
	apt-get -y upgrade				&& \
	apt-get -y install 	apache2			\ 
				php5 			\
				libapache2-mod-php5 	\
				php5-mcrypt		\
				php5-gd			\
				php5-mysql		&& \
	mkdir -v /var/www/php				&& \
	chown www-data.www-data /var/www/php
	
COPY	index.php /var/www/php/
COPY	000-default.conf /etc/apache2/sites-available/

VOLUME ['/var/www/php']

EXPOSE 80

#       should be ENTRYPOINT, but this makes debugging easier
CMD	apache2ctl -f /etc/apache2/apache2.conf -e info -DFOREGROUND





