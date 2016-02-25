#!/bin/sh

set -e

# set params
DB_USERNAME=${DB_USERNAME:-'simple-blog'}
DB_PASSWORD=${DB_PASSWORD:-$(pwgen -s 12 1)}
DB_DATABASE=${DB_DATABASE:-'simple_blog'}
APP_KEY=${APP_KEY:-$(pwgen -s 32 1)}

# assumption: if the file does not exist, then we need to create the user
if [ -s /app/.env ] ; then
  export $(cat /app/.env | xargs)
else
  # run daemon
  /usr/bin/mysqld_safe > /dev/null 2>&1 &

  RET=1
  while [[ RET -ne 0 ]]; do
    echo "=> Waiting for confirmation of MySQL service startup"
    sleep 5
    mysql -uroot -e "status" > /dev/null 2>&1
    RET=$?
  done

  # create user
  echo "=> Creating MySQL ${DB_USERNAME} user..."

  mysql -uroot -e "CREATE USER '${DB_USERNAME}'@'localhost' IDENTIFIED BY '$PASS'"

  # create the DB and stuff
  # assumption: the DB_DATABASE is set dynamically
  echo "CREATE DATABASE IF NOT EXISTS ${DB_DATABASE};" | mysql -uroot
  echo "USE \`${DB_DATABASE}\`; $(cat /app/config/schema.sql)" | mysql -uroot
  mysql -uroot -e "GRANT ALL PRIVILEGES ON \`${DB_DATABASE}\`.* to '${DB_USERNAME}'@'localhost' WITH GRANT OPTION"

  # remove the admin user...
  # oh wait, we do not have ACL.. oh well~

  # declare the env variables
  echo "DB_PASSWORD = $DB_PASSWORD" >> /app/.env
  echo "DB_DATABASE = $DB_DATABASE" >> /app/.env
  echo "DB_USERNAME = $DB_USERNAME" >> /app/.env
  echo "APP_KEY = $APP_KEY" >> /app/.env

  mysqladmin -uroot shutdown
fi

# print to log
echo "======================================="
echo "Your app is ready!"
echo "These are your environment variables:"
echo "---"
cat /app/.env
echo "---"
echo "======================================="