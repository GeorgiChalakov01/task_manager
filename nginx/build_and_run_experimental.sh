#!/bin/sh

docker stop task_manager_nginx
docker rm task_manager_nginx

docker build -t task_manager_nginx .
docker run -d -p 8080:8080 --network task_manager_network --name task_manager_nginx task_manager_nginx
