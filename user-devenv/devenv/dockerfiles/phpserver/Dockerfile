FROM 	ubuntu:latest

# set correct timezone
RUN ln -sf /usr/share/zoneinfo/Europe/Berlin /etc/localtime && echo "Europe/Berlin" > /etc/timezone

# install packages
RUN apt-get update; \
	apt-get -y --no-install-recommends install python-pip ghostscript nginx php5-fpm php5-cli clamav-freshclam clamav-daemon php5-mysql php5-imagick php5-mcrypt php5-curl php5-intl php5-gd poppler-utils texlive-latex-extra texlive-lang-german texlive-fonts-recommended lmodern; \
	mkdir -p /var/www/htdocs; \
	pip install awscli; \
	rm /etc/nginx/sites-enabled/default && rm /etc/nginx/sites-available/default; \
	/usr/bin/freshclam; \
	echo "56 * * * * clamav	/usr/bin/freshclam --quiet" >> /etc/crontab; \
	apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*;

# Install AWS ElastiCache Memcache Extension
ADD ./packages/AmazonElastiCacheClusterClient-1.0.1-PHP55-64bit/AmazonElastiCacheClusterClient-1.0.0/amazon-elasticache-cluster-client.so /usr/lib/php5/20121212/amazon-elasticache-cluster-client.so
RUN chmod a-x /usr/lib/php5/20121212/amazon-elasticache-cluster-client.so
RUN echo "extension=amazon-elasticache-cluster-client.so" | sudo tee /etc/php5/mods-available/memcached.ini
RUN php5enmod memcached


# add .htpasswd
ADD .htpasswd /etc/nginx/.htpasswd

# add configuration
ADD ./etc /etc/

# shared volumes and ports
VOLUME ['/var/www/php']
EXPOSE 80

# should be ENTRYPOINT, but this makes debugging easier
CMD ["nginx", "-g", "daemon off;"]




