FROM mysql:8.0.12

COPY ./docker/db/dump /docker-entrypoint-initdb.d
RUN chmod -R 755 /docker-entrypoint-initdb.d/