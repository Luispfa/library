# make.ps1

$COMPOSE_FILE = "docker-compose.yml"

function _LoadEnvironmentVariables($envFile) {
    Get-Content $envFile | ForEach-Object {
        if ($_ -match "^\s*([^#][A-Za-z_][A-Za-z0-9_]*)\s*=\s*(.*)$") {
            [System.Environment]::SetEnvironmentVariable($matches[1], $matches[2], [System.EnvironmentVariableTarget]::Process)
        }
    }
}

function CleanSrc {
    Write-Host "CleanSrc"
    if (Test-Path -Path "src/Controller") { Remove-Item -Path "src/Controller" -Recurse -Force }
    if (Test-Path -Path "src/Entity") { Remove-Item -Path "src/Entity" -Recurse -Force }
    if (Test-Path -Path "src/Repository") { Remove-Item -Path "src/Repository" -Recurse -Force }
}

function _CleanProject {
    Write-Host "CleanProject"
    if (Test-Path "vendor") { Remove-Item -Recurse -Force "vendor" }
    if (Test-Path "var") { Remove-Item -Recurse -Force "var" }
    if (Test-Path "composer.lock") { Remove-Item -Force "composer.lock" }
    if (Test-Path "symfony.lock") { Remove-Item -Force "symfony.lock" }
    if (Test-Path "docker\db\data") { Remove-Item -Recurse -Force "docker\db\data" }
}

function ClearCache {
    if ([string]::IsNullOrEmpty($parameter)) { $parameter = "dev" }
    Write-Host "ClearCache $parameter"
    docker-compose -f $COMPOSE_FILE run php bin/console cache:clear --env=$parameter
}

function _RunTestSqlScript {
    _LoadEnvironmentVariables(".env")
    _LoadEnvironmentVariables(".env.test")
    $MYSQL_USER_TEST = [System.Environment]::GetEnvironmentVariable("MYSQL_USER_TEST", [System.EnvironmentVariableTarget]::Process)
    $MYSQL_PASSWORD_TEST = [System.Environment]::GetEnvironmentVariable("MYSQL_PASSWORD_TEST", [System.EnvironmentVariableTarget]::Process)
    $MYSQL_DATABASE_ORDERS = [System.Environment]::GetEnvironmentVariable("MYSQL_DATABASE_ORDERS", [System.EnvironmentVariableTarget]::Process)
    Write-Host "RunTestSqlScript "$MYSQL_DATABASE_ORDERS"_test"

    docker-compose -f $COMPOSE_FILE run php bin/console doctrine:database:drop --force  --if-exists --env=test
    docker-compose -f $COMPOSE_FILE run php bin/console doctrine:database:create --env=test
    $scriptContents = Get-Content -Raw -Path "docker/db/dump/00-dump.sql"
    $scriptContents | docker exec -i sf6_db mysql -u $MYSQL_USER_TEST -p"$MYSQL_PASSWORD_TEST" $MYSQL_DATABASE_ORDERS'_test'
}

function PrepareTest {
    Write-Host "PrepareTest"
    _RunTestSqlScript
    $env:APP_ENV = "test"
    docker-compose -f $COMPOSE_FILE run php vendor/bin/phpunit
    $env:APP_ENV = "dev"
}

function Prepare {
    Write-Host "prepare"
    docker-compose -f $COMPOSE_FILE down -v
    _CleanProject
    docker-compose -f $COMPOSE_FILE up -d --build
    ComposerInstall
    CleanSrc
}

function Start1 {
    Write-Host "start"
    docker-compose -f $COMPOSE_FILE up -d
}

function Stop {
    Write-Host "stop"
    docker-compose -f $COMPOSE_FILE down
}

function ExecuteTests {
    if ([string]::IsNullOrEmpty($parameter)) { $parameter = "tests/" }
    Write-Host "ExecuteTests " $parameter 
    $env:APP_ENV = "test"
    docker-compose -f $COMPOSE_FILE run php vendor/bin/phpunit $parameter
    $env:APP_ENV = "dev"
}

function CodeReview {
    if ([string]::IsNullOrEmpty($parameter)) { $parameter = "src/" }
    Write-Host "CodeReview $parameter"
	docker-compose -f $COMPOSE_FILE run php vendor/bin/psalm --show-info=true $parameter
}

function ComposerInstall{
    Write-Host "Composer-install"
    docker-compose -f $COMPOSE_FILE run php composer install
}
	

# Main script logic
$action = $args[0]
$parameter = $args[1]

switch ($action) {
    "clean-src" { CleanSrc }
    "clear-cache" { ClearCache }
    "prepare-test" { PrepareTest }
    "prepare" { Prepare }
    "start" { Start1 }
    "stop" { Stop }
    "execute-tests" { ExecuteTests }
    "code-review" { CodeReview }
    "composer-install" { ComposerInstall }
    default {
        Write-Host "Usage: .\make.ps1 <action> <parameter>"
        Write-Host "Actions: clean-src, clear-cache, prepare-test, prepare, start, stop, execute-tests, code-review, composer-install"
    }
}