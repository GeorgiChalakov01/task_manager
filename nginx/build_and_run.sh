#!/bin/sh

docker stop task_manager_nginx
docker rm task_manager_nginx

docker build -t task_manager_nginx .
docker run -d -p 8080:8080 --name task_manager_nginx task_manager_nginx
#docker logs --follow task_manager_nginx
