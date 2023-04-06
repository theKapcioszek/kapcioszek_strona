#!/bin/bash

docker-compose up -d --build

echo "making sure conteiner properly starts before proceeding... (1 min)"

sleep 60

docker exec -i kapcioszek_strona-mysql_db-1 sh -c 'exec mysql -uroot -e "create database 'strona_praktyka'"'

docker exec -i kapcioszek_strona-mysql_db-1 sh -c 'exec mysql strona_praktyka < /home/strona_praktyka.sql'

echo "done! (open localhost:2137/kod in your browser to see the site!)"