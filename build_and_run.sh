#!/bin/sh

db_root_password="changeme"
db_user="changeme"
db_password="changeme"
db_database="TM"

minio_root_username="changeme"
minio_root_password="changeme"

docker stop task_manager_nginx
docker rm task_manager_nginx

docker stop task_manager_mariadb
docker rm task_manager_mariadb

docker stop task_manager_minio
docker rm task_manager_minio

docker network rm task_manager_network

sleep 2


docker network create task_manager_network

cd mariadb
docker build -t task_manager_mariadb .
docker run -d \
	--name task_manager_mariadb \
	--network task_manager_network \
	-e "MYSQL_USER=$db_user" \
	-e "MYSQL_PASSWORD=$db_password" \
	-e "MYSQL_DATABASE=$db_database" \
	-e "MYSQL_ROOT_PASSWORD=$db_root_password" \
	task_manager_mariadb

cd ../minio
docker build -t task_manager_minio .
docker run -d \
	--name task_manager_minio \
	--network task_manager_network \
	-p 9000:9000 \
	-p 9001:9001 \
	-e "MINIO_ROOT_USER=$minio_root_username" \
	-e "MINIO_ROOT_PASSWORD=$minio_root_password" \
	task_manager_minio 

cd ../nginx/
minio_ip=$(docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' task_manager_minio)
docker build -t task_manager_nginx .
docker run -d \
	--name task_manager_nginx \
	--network task_manager_network \
	-p 8080:8080 \
	-e "MYSQL_USER=$db_user" \
	-e "MYSQL_PASSWORD=$db_password" \
	-e "MYSQL_DATABASE=$db_database" \
	-e "MYSQL_ROOT_PASSWORD=$db_root_password" \
	-e "MINIO_ROOT_USER=$minio_root_username" \
	-e "MINIO_ROOT_PASSWORD=$minio_root_password" \
	-e "MINIO_IP=$minio_ip" \
	task_manager_nginx 

cd ..
echo Finished
