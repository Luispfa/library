﻿<div style="display: block; text-align: center;">
  <img src="youtube-banner.png" alt="@fitCoding - Library" style="max-width: 30%; float: left; margin-right: 20px;">
  <div style="max-width: 70%; text-align: left;">
    <strong style="font-size: 30px; font-weight: bold;">Proyecto "Library"</strong>
    <br>
    <span style="font-size: 24px;">Desarrollo de Software con Symfony 6, PHP 8.2 y Arquitectura Hexagonal</span>
  </div>
</div>
<p></p>

El proyecto **"Library"** es una aplicación de ejemplo que demuestra el uso de **Symfony 6**, **PHP 8.2**, **Docker** y varias buenas prácticas de desarrollo como **SOLID**, **TDD**, **DDD**, **Clean Code** y **Arquitectura Hexgonal**. La aplicación simula la gestión de órdenes de compra de libros por parte de un empleado para un cliente.

## Tabla de Contenidos
- [Instalación](#instalación)
- [Actualiza el archivo "hosts"](#actualiza-el-archivo-hosts)
- [Inicializar el proyecto](#inicializar-el-proyecto)
- [Estructura de Directorios](#estructura-de-directorios)

## Instalación

1. Asegúrate de tener **Docker** y **Docker Compose** instalados en tu sistema antes de continuar.


2. Lo primero es **Iniciar Docker Desktop**

3. A continuación, se describen los pasos para ejecutar los comandos necesarios para trabajar con el proyecto. Los comandos pueden ejecutarse en la terminal de su sistema operativo. 

<details>
<summary>
  <label style="font-size: 16px; font-weight: bold;">Makefile</label>
  <label>(Si tiene instalado Makefile, puede utilizarlo)</label>
</summary>
<p>

```bash
# 1. Clona este repositorio en tu máquina local:
git clone https://github.com/Luispfa/library.git

# 2. Navega al directorio del proyecto:
cd library

# 3. Construye y levanta los contenedores Docker:
\library> make prepare

# 4. Instala PHPUnit y sus dependencias:
\library> make prepare-test

# 5. Ejecuta todos los tests
\library> make execute-tests

```
</p>
</details>
<p></p>

<details>
<summary>
  <label style="font-size: 16px; font-weight: bold;">PowerShell</label>
  <label>(puede usar PowerShell, para Windows)</label>
</summary>
<p>

```bash
# 1. Clona este repositorio en tu máquina local:
git clone https://github.com/Luispfa/library.git

# 2. Navega al directorio del proyecto:
cd library

# 3. Construye y levanta los contenedores Docker:
\library> ./make.ps1 prepare

# 4. Instala PHPUnit y sus dependencias:
\library> ./make.ps1 prepare-test

# 5. Ejecuta todos los tests
\library> ./make.ps1 execute-tests

```
</p>
</details>
<p></p>
<details>
<summary>
  <label style="font-size: 16px; font-weight: bold;">Bash</label>
  <label>(Linux, macOS y Windows)</label>
</summary>
<p>

```bash
# 1. Clona este repositorio en tu máquina local:
git clone https://github.com/Luispfa/library.git

# 2. Navega al directorio del proyecto:
cd library

# 3. Construye y levanta los contenedores Docker:
\library> .\make.sh prepare

# 4. Instala PHPUnit y sus dependencias:
\library> .\make.sh prepare-test

# 5. Ejecuta todos los tests
\library> .\make.sh execute-tests

```
</p>
</details>

## Actualiza el archivo **"hosts"**

```plaintext
    Añade: 127.0.0.1 dev.library.com

    Windows:
        Path: C:\Windows\System32\drivers\etc\hosts

    Linux:
        Path: /etc/hosts

    macOS:
        Path: /etc/hosts
```
Accede a la aplicación en tu navegador web o en Postman http://dev.library.com. Deberías poder ver la aplicación en funcionamiento.

## Inicializar el proyecto

Después de la instalación inicial, cuando accedas al proyecto en otro momento, sigue estos pasos para realizar tareas diarias comunes:

<details>
<summary>
  <label style="font-size: 16px; font-weight: bold;">Makefile</label>
  <label>(Si tiene instalado Makefile, puede utilizarlo)</label>
</summary>
<p>

```bash
# 1. Navega al directorio del proyecto:
cd library

# 2. levanta los contenedores Docker:
\library> make start

# 3. Parar los contenedores Docker:
\library> make stop

# 4. Ejecutar los tests de una carpeta - default path=test/
\library> make execute-tests (optional)path=tests/orders/list/application/

# 5. Ejecutar los tests de un archivo - default path=test/
\library> make execute-tests (optional)path=tests/orders/list/infrastructure/controller/GetOrdersListerControllerTest.php

# 6. Limpiar cache - default env=dev
\library> make clear-cache (optional)env=dev|test

# 7. Herramienta de analisis estático para encontrar errores en PHP de todo el proyecto - default path=src/
\library> make code-review (optional)path=src/orders

# 8. Instalar dependencias con Composer
\library> make composer-install

```

</p>
</details>
<p></p>

<details>
<summary>
  <label style="font-size: 16px; font-weight: bold;">PowerShell</label>
  <label>(puede usar PowerShell, para Windows)</label>
</summary>
<p>

```bash
# 1. Navega al directorio del proyecto:
cd library

# 2. levanta los contenedores Docker:
\library> ./make.ps1 start

# 3. Parar los contenedores Docker:
\library> ./make.ps1 stop

# 4. Ejecutar los tests de una carpeta  - default path=test/
\library> ./make.ps1 execute-tests (optional)tests/orders/list/application/

# 5. Ejecutar los tests de un archivo - default path=test/
\library> ./make.ps1 execute-tests (optional)tests/orders/list/infrastructure/controller/GetOrdersListerControllerTest.php

# 6. Limpiar cache - default --env=dev
\library> ./make.ps1 clear-cache (optional)dev|test

# 7. Herramienta de analisis estático para encontrar errores en PHP de todo el proyecto  - default path=src/
\library> ./make.ps1 code-review (optional)src/orders

# 8. Instalar dependencias con Composer
\library> ./make.ps1 composer-install
```

</p>
</details>
<p></p>
<details>
<summary>
  <label style="font-size: 16px; font-weight: bold;">Bash</label>
  <label>(Linux, macOS y Windows)</label>
</summary>
<p>

```bash
# 1. Clona este repositorio en tu máquina local:
git clone https://github.com/Luispfa/library.git

# 2. levanta los contenedores Docker:
\library> .\make.sh start

# 3. Parar los contenedores Docker:
\library> .\make.sh stop

# 4. Ejecutar los tests de una carpeta - default path=tests/
\library> .\make.sh execute-tests (optional)tests/orders/list/application/

# 5. Ejecutar los tests de un archivo - default path=tests/
\library> .\make.sh execute-tests (optional)tests/orders/list/infrastructure/controller/GetOrdersListerControllerTest.php

# 6. Limpiar cache - default --env=dev
\library> .\make.sh clear-cache (optional)dev|test

# 7. Herramienta de analisis estático para encontrar errores en PHP de todo el proyecto - default path=src/
\library> .\make.sh code-review (optional)src/orders

# 8. Instalar dependencias con Composer
\library> .\make.sh composer-install
```
</p>
</details>

## Estructura de Directorios

La estructura de directorios del proyecto **"Library"** está organizada de la siguiente manera:

```plaintext
library/
│
├── config/                         # Configuración de la aplicación
├── docker/                         # Configuración de docker-compose
│   ├── db/                         # Dockerfile para el servidor de Base de datos
│   ├── nginx/                      # Dockerfile para el servidor Web
│   └── php/                        # Dockerfile para PHP
├── public/                         # Archivos públicos y punto de entrada
├── src/                            # Código fuente de la aplicación
│   ├── orders/                     # Modulo ORDENES
│   │    ├── list/                  # Acción LISTAR del modulo ORDENES
│   │    │   ├── application/       # Capa de Aplicación
│   │    │   ├── domain/            # Capa de Dominio
│   │    │   └── infrastructure/    # Capa de Infraestructura
│   │    └── create/                # Acción CREAR del modulo ORDENES
│   │        ├── application/       # Capa de Aplicación
│   │        ├── domain/            # Capa de Dominio
│   │        └── infrastructure/    # Capa de Infraestructura
│   ├── customer/                   # Modulo CLIENTE
│   │    ├── list/                  # Acción LISTAR del modulo CLIENTE
│   │    │   ├── application/       # Capa de Aplicación
│   │    │   ├── domain/            # Capa de Dominio
│   │    │   └── infrastructure/    # Capa de Infraestructura
│   │    └── create/                # Acción CREAR del modulo CLIENTE
│   │        ├── application/       # Capa de Aplicación
│   │        ├── domain/            # Capa de Dominio
│   │        └── infrastructure/    # Capa de Infraestructura
│   └── ...
├── tests/                          # Pruebas unitarias y funcionales
├── var/                            # Datos generados por la aplicación
├── vendor/                         # Dependencias de Composer
├── .env.dist                       # Archivo de variables de entorno de ejemplo
├── .gitignore                      # Archivo Gitignore
├── composer.json                   # Archivo de configuración
├── docker-compose.yml              # Archivo de configuración de contenedores Docker
└── Makefile                        # Receta para automatizar tareas con Docker
```