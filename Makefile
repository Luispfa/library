include .env
export
include .env.test
export
COMPOSE_FILE = "docker-compose.yml"

clean-src:
	if exist src\Controller rmdir /s /q src\Controller
	if exist src\Entity rmdir /s /q src\Entity
	if exist src\Repository rmdir /s /q src\Repository

_clean-project:
	if exist "vendor" rmdir /s /q "vendor"
	if exist "var" rmdir /s /q "var"
	if exist "composer.lock" del /q "composer.lock"
	if exist "symfony.lock" del /q "symfony.lock"
	if exist "docker\db\data" rmdir /s /q "docker\db\data"

clear-cache:
	@docker-compose -f $(COMPOSE_FILE) run php bin/console cache:clear --env=$(if $(env),$(env),dev)

_run-test-sql-script:
	@docker-compose -f $(COMPOSE_FILE) run php bin/console doctrine:database:drop --force --if-exists --env=test
	@docker-compose -f $(COMPOSE_FILE) run php bin/console doctrine:database:create --env=test
	@docker exec -i sf6_db mysql -u $(MYSQL_USER_TEST) -p$(MYSQL_PASSWORD_TEST) $(MYSQL_DATABASE_ORDERS)_test < docker/db/dump/00-dump.sql


prepare-test:
	@make _run-test-sql-script
	set @export APP_ENV=test
	@docker-compose -f $(COMPOSE_FILE) run php vendor/bin/phpunit
	set @export APP_ENV=dev

prepare:
	@docker-compose -f $(COMPOSE_FILE) down -v
	@make _clean-project
	@docker-compose -f $(COMPOSE_FILE) up -d --build
	@make composer-install
	@make clean-src

start:
	@docker-compose -f $(COMPOSE_FILE) up -d 

stop:
	@docker-compose -f $(COMPOSE_FILE) down

execute-tests:
	set @export APP_ENV=test
	@docker-compose -f $(COMPOSE_FILE) run php vendor/bin/phpunit $(if $(path), $(path), tests/)
	set @export APP_ENV=dev

code-review:
	@docker-compose -f $(COMPOSE_FILE) run php vendor/bin/psalm --show-info=true $(if $(path), $(path), src/)

composer-install:
	@docker-compose -f $(COMPOSE_FILE) run php composer install