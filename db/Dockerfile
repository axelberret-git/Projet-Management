# Dockerfile
FROM mariadb:latest

# Copier le script d'initialisation
COPY init.sql /docker-entrypoint-initdb.d/

# Variables d'environnement pour la configuration de la base de données
ENV MYSQL_ROOT_PASSWORD=rootpassword
ENV MYSQL_DATABASE=restaurant_db
ENV MYSQL_USER=restaurant_user
ENV MYSQL_PASSWORD=userpassword

EXPOSE 3306
