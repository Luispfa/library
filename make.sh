#!/bin/bash

COMPOSE_FILE="docker-compose.yml"

clean() {
    if [ -d "src/Controller" ]; then
        rm -rf src/Controller
    fi
    if [ -d "src/Entity" ]; then
        rm -rf src/Entity
    fi
    if [ -d "src/Repository" ]; then
        rm -rf src/Repository
    fi
}

clear_cache() {
    export APP_ENV="test"
    docker-compose -f "$COMPOSE_FILE" run php bin/console cache:clear --env=$(if [ -n "$env" ]; then echo "$env"; else echo "dev"; fi)
    export APP_ENV="dev"
}

prepare_test() {
    export APP_ENV="test"
    docker-compose -f "$COMPOSE_FILE" run php vendor/bin/phpunit
    export APP_ENV="dev"
    clean
}

prepare() {
    echo "prepare"
    docker-compose -f "$COMPOSE_FILE" up -d --build
    docker-compose -f "$COMPOSE_FILE" run php composer install
}

start() {
    docker-compose -f "$COMPOSE_FILE" up -d
}

stop() {
    docker-compose -f "$COMPOSE_FILE" down
}

execute_tests() {
    export APP_ENV="test"
    docker-compose -f "$COMPOSE_FILE" run php vendor/bin/phpunit $(if [ -n "$path" ]; then echo "$path"; else echo "tests/"; fi)
    export APP_ENV="dev"
}

# Lógica principal del script
case "$1" in
    clean) clean ;;
    clear-cache) clear_cache ;;
    prepare-test) prepare_test ;;
    prepare) prepare ;;
    start) start ;;
    stop) stop ;;
    execute-tests) execute_tests ;;
    *)
        echo "Uso: $0 {clean|clear-cache|prepare-test|prepare|start|stop|execute-tests}"
        exit 1
        ;;
esac

# Esperar la entrada del usuario para mantener la terminal abierta
read -p "Press Enter to exit..."