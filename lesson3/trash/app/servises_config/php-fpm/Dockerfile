FROM phpdockerio/php73-fpm:latest

WORKDIR /var/www/html

# Install selected extensions and other stuff
RUN apt-get update \
  && apt-get -y --no-install-recommends install apt-utils \
  && apt-get -y --no-install-recommends install iputils-ping \
  && apt-get -y --no-install-recommends install telnet \
  && apt-get -y --no-install-recommends install git \
  && apt-get -y --no-install-recommends install ssh \
  && apt-get -y --no-install-recommends install less \
  && apt-get -y --no-install-recommends install supervisor \
    && apt-get -y --no-install-recommends install php-memcached php7.3-mysql php-redis php-xdebug php7.3-gmp php7.3-bcmath php-curl php-json php-readline php-mbstring php-xml php-amqp dnsutils  \
    && composer global require --dev phpstan/phpstan && ln -s ~/.composer/vendor/bin/phpstan /usr/local/bin/phpstan \
    && echo 'eval `ssh-agent`' >> ~/.bashrc \
    && ln -s /usr/bin/php /usr/local/bin/php \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*