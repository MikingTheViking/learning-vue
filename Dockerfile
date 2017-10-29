FROM ubuntu:16.04

### Installing Basic Software Utilties ###

RUN apt-get update && apt-get install -y \
	software-properties-common

RUN apt-get update && apt-get install -y \
	python-software-properties


### Add a php7.1 repo & install necessary dependencies ###

RUN apt-get update && apt-get install -y \
	locales
RUN locale-gen en_US.UTF-8 && export LANG=en_US.UTF-8
RUN LC_ALL=C.UTF-8 add-apt-repository -y ppa:ondrej/php
RUN apt-get update && DEBIAN_FRONTEND=noninteractive apt-get install -y \
	nginx \
	curl \
	git \
	netcat \
	php7.1 \
	php7.1-cli \
	php7.1-fpm \
	php7.1-mbstring \
	php7.1-pgsql \
	php7.1-xml \
	php7.1-zip \
	php7.1-fpm \
	php7.1-mcrypt \
	php7.1-gd \
	php7.1-curl \
	php7.1-json \
	libpcre3 \
	supervisor

#install Composer
RUN curl -sS https://getcomposer.org/installer | php \
	&& mv composer.phar /usr/local/bin/composer

#install node
RUN curl -sL https://deb.nodesource.com/setup_8.x | bash -
RUN apt-get install -y nodejs

#confirm install
RUN node -v
RUN npm -v

# copy the configuration files
RUN sed -i 's/2M/10M/g' /etc/php/7.1/fpm/php.ini
COPY config/nginx-dev.conf /etc/nginx/nginx.conf
RUN rm -rf /etc/supervisor/conf.d /etc/supervisor/supervisord.conf
COPY config/supervisord-web-dev.conf /etc/supervisor/supervisord.conf

RUN mkdir -p /var/run/php
RUN mkdir -p /var/log/php-fpm

EXPOSE 80

WORKDIR /src

CMD ["/bin/sh", "-c", "supervisord -c /etc/supervisor/supervisord.conf"]