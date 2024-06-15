#!/bin/sh

docker stop task_manager_mariadb
docker rm task_manager_mariadb

docker build -t task_manager_mariadb .
#docker run -d --name task_manager_mariadb -p 3306:3306 -v /home/gchalakov/docker_mounted_directories/zadachnik_db:/var/lib/mysql -e MYSQL_DATABASE=TM -e MYSQL_USER=chalakov_zadachnik -e MYSQL_PASSWORD=Kursova_Rabota_2023-2024 -e MYSQL_ROOT_PASSWORD=Diplomna_Rabota_2024-2024 task_manager_mariadb
docker run -d --name task_manager_mariadb -p 3306:3306 -e MYSQL_DATABASE=TM -e MYSQL_ROOT_PASSWORD=0000 task_manager_mariadb
