FROM ubuntu:trusty
MAINTAINER "Alvin Natawiguna <13512030@std.stei.itb.ac.id>"

# note: for ARG, you need to pass --build-arg <arg_name>=<arg_value>, since these are required
# this parameter is optional
ARG 'http_proxy'

# Install packages
ENV DEBIAN_FRONTEND noninteractive
RUN apt-get update && \
  apt-get install software-properties-common -y && \
  apt-key adv --recv-keys --keyserver hkp://keyserver.ubuntu.com:80 0xcbcb082a1bb943db && \
  add-apt-repository -y 'deb [arch=amd64,i386] http://kartolo.sby.datautama.net.id/mariadb/repo/10.1/ubuntu trusty main'
RUN apt-get update && \
  apt-get -y install supervisor git apache2 libapache2-mod-php5 php5-gd php5-mysql pwgen php-apc php5-mcrypt mariadb-server dos2unix && \
  echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Add image configuration and scripts
# Some are copied from https://github.com/tutumcloud/lamp
ADD ./init/scripts/start-apache2.sh /start-apache2.sh
ADD ./init/scripts/start-mysqld.sh /start-mysqld.sh
ADD ./init/scripts/run.sh /run.sh

RUN chmod 755 /*.sh
ADD ./init/config/my.cnf /etc/mysql/conf.d/my.cnf
ADD ./init/config/supervisord-apache2.conf /etc/supervisor/conf.d/supervisord-apache2.conf
ADD ./init/config/supervisord-mysqld.conf /etc/supervisor/conf.d/supervisord-mysqld.conf

# Remove pre-installed database
RUN rm -rf /var/lib/mysql/*

# Add MySQL utils and the init scripts
ADD ./init/scripts/create_mysql_admin_user.sh /create_mysql_admin_user.sh
ADD ./init/scripts/init.sh /init.sh
RUN chmod 755 /*.sh

# config to enable .htaccess
ADD ./init/config/apache_default /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

# pull the image from gitlab.informatika.org
ARG 'gitlab_token'

RUN rm -rf /app && \
  git clone http://gitlab-ci-token:${gitlab_token}@gitlab.informatika.org/if4033/if4033-simple-blog-reloaded.git /app
RUN mkdir -p /app && rm -fr /var/www/html && ln -s /app /var/www/html

# fix broken files on windows
RUN dos2unix /*.sh

# some cleanups
RUN apt-get clean -qq

# Environment variables to configure php
ENV PHP_UPLOAD_MAX_FILESIZE 10M
ENV PHP_POST_MAX_SIZE 10M

# Add volumes for MySQL
VOLUME ["/etc/mysql", "/var/lib/mysql"]

# Add volumes for images and .env
VOLUME ["/var/if4033-simple-blog/images", "/app/images"]

EXPOSE 80 3306
CMD ["/run.sh"]