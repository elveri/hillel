FROM nginx:1.15.8-alpine
 
RUN addgroup -g 1000 -S borgir
RUN adduser -u 1000 -S -G borgir borgir
 
COPY app.conf /etc/nginx/conf.d/default.conf
COPY nginx.conf /etc/nginx/nginx.conf
 
RUN touch /var/run/nginx.pid \
 && chown -Rf borgir:borgir \
    /var/run/nginx.pid \
    /var/cache/nginx \
    /var/log/nginx
 
USER borgir