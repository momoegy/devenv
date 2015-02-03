FROM ubuntu:latest

RUN 	echo 'Acquire::http::Proxy "http://cube.fritz.box:3142";' > /etc/apt/apt.conf.d/01proxy

RUN     apt-get update                                  && \
        apt-get -y upgrade                              && \
        apt-get -y install    nginx                 	&& \
	mkdir -v -p /var/www/static			&& \
	chown www-data.www-data /var/www/static


COPY	nginx.conf /etc/nginx/nginx.conf
COPY	default /etc/nginx/sites-available/
COPY	index.html /var/www/static/

VOLUME ['/var/www/static']

EXPOSE	80

CMD	[ "nginx" ]
