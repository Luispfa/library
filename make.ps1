# make.ps1

$COMPOSE_FILE = "docker-compose.yml"

function Clean {
    if (Test-Path -Path "src/Controller") { Remove-Item -Path "src/Controller" -Recurse -Force }
    if (Test-Path -Path "src/Entity") { Remove-Item -Path "src/Entity" -Recurse -Force }
    if (Test-Path -Path "src/Repository") { Remove-Item -Path "src/Repository" -Recurse -Force }
}

function ClearCache {
    $env:APP_ENV = "test"
    docker-compose -f $COMPOSE_FILE run php bin/console cache:clear --env=$(if ($env) { $env } else { "dev" })
    $env:APP_ENV = "dev"
}

function PrepareTest {
    $env:APP_ENV = "test"
    docker-compose -f $COMPOSE_FILE run php vendor/bin/phpunit
    $env:APP_ENV = "dev"
    Clean
}

function Prepare {
    Write-Host "prepare"
    docker-compose -f $COMPOSE_FILE up -d --build
    docker-compose -f $COMPOSE_FILE run php composer install
}

function Start1 {
    Write-Host "start"
    # Inicia el contenedor
    docker-compose -f $COMPOSE_FILE up -d
}

function Stop {
    Write-Host "stop"
    docker-compose -f $COMPOSE_FILE down
}

function ExecuteTests {
    $env:APP_ENV = "test"
    docker-compose -f $COMPOSE_FILE run php vendor/bin/phpunit $(if ($args) { $args[0] } else { "tests/" })
    $env:APP_ENV = "dev"
}

# Main script logic
$action = $args[0]

switch ($action) {
    "clean" { Clean }
    "clear-cache" { ClearCache }
    "prepare-test" { PrepareTest }
    "prepare" { Prepare }
    "start" { Start1 }
    "stop" { Stop }
    "execute-tests" { ExecuteTests }
    default {
        Write-Host "Usage: .\make.ps1 <action>"
        Write-Host "Actions: clean, clear-cache, prepare-test, prepare, start, stop, execute-tests"
    }
}
