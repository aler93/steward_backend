* git clone
* If necessary build the docker image ahead of time: docker build . -t aler/php-fpm:8.2
* cp .env.example .env
* Setup DB connection and requried app keys
* docker-compose up
* Note: steward_scheduler will start running as well, it can be stopped with "docker stop steward_scheduler"