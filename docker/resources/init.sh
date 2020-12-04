#!/bin/sh

set -e

composer --no-interaction install --no-progress --no-scripts

dockerize \
  -wait tcp://"${DB_HOST}":"${DB_PORT}" -timeout 60s \

php-fpm -F
