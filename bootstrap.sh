#!/usr/bin/env bash

sudo composer update
sudo cp env-chat .env
sudo php artisan key:generate
sudo php artisan cache:clear 
sudo chmod -R 777 ../chat2
cd laradock
sudo cp env-example .env 
sudo docker-compose up -d nginx mysql redis
sudo docker-compose ps
