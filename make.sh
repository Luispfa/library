#!/bin/bash

source .env
source .env.test
COMPOSE_FILE="docker-compose.yml"

clean_src() {
    echo "clean_src"
    if [[ -d "src/Controller" ]]; then
        rm -rf src/Controller
    fi
    if [[ -d "src/Entity" ]]; then
        rm -rf src/Entity
    fi
    if [[ -d "src/Repository" ]]; then
        rm -rf src/Repository
    fi
}

function _clean_project {
    echo "clean_project"
    if [[ -d "vendor" ]]; then
        rm -rf vendor
    fi
    if [[ -d "var" ]]; then
        rm -rf var
    fi
    if [[ -f "composer.lock" ]]; then
        rm -f composer.lock
    fi

    if [[ -f "symfony.lock" ]]; then
        rm -f symfony.lock
    fi

    if [[ -d "docker/db/data" ]]; then
        rm -rf docker/db/data
    fi
}


clear_cache() {
    local env="${@:-dev}"
    echo "clear-cache $env"
    docker-compose -f "$COMPOSE_FILE" run php bin/console cache:clear --env="$env"
}

_run_test_sql_script() {
    echo "_run_test_sql_script " "$MYSQL_DATABASE_ORDERS"_test
    docker-compose -f "$COMPOSE_FILE" run php bin/console doctrine:database:drop --force  --if-exists --env=test
    docker-compose -f "$COMPOSE_FILE" run php bin/console doctrine:database:create --env=test
    docker exec -i sf6_db mysql -u "$MYSQL_USER_TEST" -p"$MYSQL_PASSWORD_TEST" "$MYSQL_DATABASE_ORDERS"_test < docker/db/dump/00-dump.sql
}

prepare_test() {
    echo "prepare_test"
    _run_test_sql_script
    export APP_ENV="test"
    docker-compose -f "$COMPOSE_FILE" run php vendor/bin/phpunit
    export APP_ENV="dev"
}

prepare() {
    echo "prepare"
    docker-compose -f "$COMPOSE_FILE" down -v
    _clean_project
    docker-compose -f "$COMPOSE_FILE" up -d --build
    composer_install
    clean_src
}

start() {
    echo "start"
    docker-compose -f "$COMPOSE_FILE" up -d
}

stop() {
    echo "stop"
    docker-compose -f "$COMPOSE_FILE" down
}

execute_tests() {
    local path="${@:-tests/}"
    echo "execute_tests $path"
    export APP_ENV="test"
    docker-compose -f "$COMPOSE_FILE" run php vendor/bin/phpunit $path
    export APP_ENV="dev"
}

code_review() {
    local path="${@:-src/}"
    echo "code_review $path"
    docker-compose -f $COMPOSE_FILE run php vendor/bin/psalm --show-info=true $path
}

composer_install() {
    echo "composer_install"
    docker-compose -f "$COMPOSE_FILE" run php composer install
}

case "$1" in
    clean-src) clean_src ;;
    clear-cache) clear_cache $2 ;;
    prepare-test) prepare_test ;;
    prepare) prepare ;;
    start) start ;;
    stop) stop ;;
    execute-tests) execute_tests "$2" ;;
    code-review) code_review "$2" ;;
    composer-install) composer_install ;;
    *)
        echo "Uso: $0 {clean-src|clear-cache|prepare-test|prepare|start|stop|execute-tests|code-review|composer-install} [path]"
        exit 1
        ;;
esac

# Wait for user input to keep the terminal open
read -p "Press Enter to exit..."