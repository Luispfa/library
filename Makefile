COMPOSE_FILE = "docker-compose.yml"

clean:
	if exist src\Controller rmdir /s /q src\Controller
	if exist src\Entity rmdir /s /q src\Entity
	if exist src\Repository rmdir /s /q src\Repository

clear-cache:
	docker-compose -f $(COMPOSE_FILE) run php bin/console cache:clear --env=$(if $(env),$(env),dev)

prepare-test:
	make clear-cache env=test
	set export APP_ENV=test
	docker-compose -f $(COMPOSE_FILE) run php vendor/bin/phpunit
	set export APP_ENV=dev
	make clean

prepare:
	docker-compose -f $(COMPOSE_FILE) up -d --build
	docker-compose -f $(COMPOSE_FILE) run php composer install

start:
	docker-compose -f $(COMPOSE_FILE) up -d 

stop:
	docker-compose -f $(COMPOSE_FILE) down

execute-tests:
	docker-compose -f $(COMPOSE_FILE) run php vendor/bin/phpunit $(if $(path), $(path), tests/)
