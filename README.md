## Steward api

- git clone
- set variables for Docker Compose
- docker-compose up
- docker exec --user=$USER php artisan key:generate
- docker exec --user=$USER php artisan jwt:secret
- docker exec --user=$USER php artisan migrate --seed

### Executar testes:
- docker exec -it steward_api php ./vendor/phpunit/phpunit/phpunit --color=always tests/Feature/NomeDoTeste.php
