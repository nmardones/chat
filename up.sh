#!/usr/bin/env bash

cd laradock
sudo docker-compose up -d nginx mysql redis
sudo docker-compose ps
