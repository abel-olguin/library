#!/bin/bash
echo "Removing old containers in case they exists"
docker rmi $(docker images -a -q) -f
docker system prune -f

echo "Initializing the new containers"
docker-compose up -d --build --remove-orphans

echo "Ready to work..."
docker logs --follow php-container
