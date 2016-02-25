#!/bin/sh

set -e

# create password
PASS=${MYSQL_PASS:-$(pwgen -s 12 1)}
_word=$( [ ${MYSQL_PASS} ] && echo "preset" || echo "random" )
echo "=> Creating MySQL simple_blog user with ${_word} password"

mysql -hlocalhost -uroot -e "CREATE USER 'simple_blog'@'localhost' IDENTIFIED BY '$PASS'"

# create the DB and stuff
mysql -hlocalhost -uroot < /app/config/schema.sql
mysql -hlocalhost -uroot -e "GRANT ALL PRIVILEGES ON simple_blog.* to simple_blog@'localhost' WITH GRANT OPTION"

# remove the admin user...
# oh wait, we do not have ACL.. oh well~

# declare the env variables
echo "DB_PASSWORD = $PASS" >> /app/.env
echo "DB_USERNAME = simple_blog" >> /app/.env
echo "APP_KEY = $(pwgen -s 32 1)" >> /app/.env

# print to log
echo "======================================="
echo "Your app is ready!"
echo "These are your environment variables:"
echo "---"
cat /app/.env
echo "---"
echo "======================================="