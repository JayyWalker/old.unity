FROM nginx:1.17.1

COPY ./docker/resources/nginx.conf /etc/nginx/conf.d/default.conf
