﻿# Bilingual README / README Bilingüe

**This repository is bilingual. Below you will find the English version followed by the Spanish version.  
Este repositorio es bilingüe. A continuación encontrarás la versión en inglés seguida de la versión en español.**

---

<div style="display: block; text-align: center;">
  <img src="youtube-banner.png" alt="@fitCoding - Library" style="max-width: 30%; float: left; margin-right: 20px;">
  <div style="max-width: 70%; text-align: left;">
    <strong style="font-size: 30px; font-weight: bold;">Proyecto "Library"</strong>
    <br>
    <span style="font-size: 24px;">Software Development with Symfony 6, PHP 8.2, and Hexagonal Architecture</span>
    <br><br>
    <span style="font-size: 24px;">Desarrollo de Software con Symfony 6, PHP 8.2 y Arquitectura Hexagonal</span>
  </div>
</div>
<p></p>

## English

The **"Library"** project is a sample application that demonstrates the use of **Symfony 6**, **PHP 8.2**, **Docker**, and various best development practices such as **SOLID**, **TDD**, **DDD**, **Clean Code**, and **Hexagonal Architecture**. The application simulates the management of book purchase orders by an employee for a customer.

## Table of Contents

- [Installation](#installation)
- [Update the "hosts" file](#update-the-hosts-file)
- [Initialize the Project](#initialize-the-project)
- [Directory Structure](#directory-structure)

## Installation

1. Make sure you have **Docker** and **Docker Compose** installed on your system before proceeding.

2. First, **Start Docker Desktop**

3. Below are the steps to execute the necessary commands to work with the project. The commands can be executed in your operating system's terminal.

<details>
<summary>
  <label style="font-size: 16px; font-weight: bold;">Makefile</label>
  <label>(If you have Makefile installed, you can use it)</label>
</summary>
<p>

```bash
# 1. Clone this repository to your local machine:
git clone https://github.com/Luispfa/library.git

# 2. Navigate to the project directory:
cd library

# 3. Build and start the Docker containers:
\library> make prepare

# 4. Install PHPUnit and its dependencies:
\library> make prepare-test

# 5. Run all tests
\library> make execute-tests

```

</p>
</details>
<p></p>

<details>
<summary>
  <label style="font-size: 16px; font-weight: bold;">PowerShell</label>
  <label>(You can use PowerShell for Windows)</label>
</summary>
<p>

```bash
# 1. Clone this repository to your local machine:
git clone https://github.com/Luispfa/library.git

# 2. Navigate to the project directory:
cd library

# 3. Build and start the Docker containers:
\library> ./make.ps1 prepare

# 4. Install PHPUnit and its dependencies:
\library> ./make.ps1 prepare-test

# 5. Run all tests
\library> ./make.ps1 execute-tests

```

</p>
</details>
<p></p>
<details>
<summary>
  <label style="font-size: 16px; font-weight: bold;">Bash</label>
  <label>(Linux, macOS, and Windows)</label>
</summary>
<p>

```bash
# 1. Clone this repository to your local machine:
git clone https://github.com/Luispfa/library.git

# 2. Navigate to the project directory:
cd library

# 3. Build and start the Docker containers:
\library> .\make.sh prepare

# 4. Install PHPUnit and its dependencies:
\library> .\make.sh prepare-test

# 5. Run all tests
\library> .\make.sh execute-tests

```

</p>
</details>

## Update the **"hosts"** file

```plaintext
    Add: 127.0.0.1 dev.library.com

    Windows:
        Path: C:\Windows\System32\drivers\etc\hosts

    Linux:
        Path: /etc/hosts

    macOS:
        Path: /etc/hosts
```

Access the application in your web browser or Postman at http://dev.library.com. You should be able to see the application running.

## Initialize the Project

After the initial installation, when accessing the project at a later time, follow these steps to perform common daily tasks:

<details>
<summary>
  <label style="font-size: 16px; font-weight: bold;">Makefile</label>
  <label>(If you have Makefile installed, you can use it)</label>
</summary>
<p>

```bash
# 1. Navigate to the project directory:
cd library

# 2. Start the Docker containers:
\library> make start

# 3. Stop the Docker containers:
\library> make stop

# 4. Run tests from a folder - default path=test/
\library> make execute-tests (optional)path=tests/orders/list/application/

# 5. Run tests from a file - default path=test/
\library> make execute-tests (optional)path=tests/orders/list/infrastructure/controller/GetOrdersListerControllerTest.php

# 6. Clear cache - default env=dev
\library> make clear-cache (optional)env=dev|test

# 7. Static analysis tool to find PHP errors in the entire project - default path=src/
\library> make code-review (optional)path=src/orders

# 8. Install dependencies with Composer
\library> make composer-install

```

</p>
</details>
<p></p>

## Directory Structure

The **"Library"** project directory structure is organized as follows:

```plaintext
library/
│
├── config/                         # Application configuration
├── docker/                         # Docker-compose configuration
│   ├── db/                         # Dockerfile for the Database server
│   ├── nginx/                      # Dockerfile for the Web server
│   └── php/                        # Dockerfile for PHP
├── public/                         # Public files and entry point
├── src/                            # Application source code
│   ├── orders/                     # ORDERS module
│   │    ├── list/                  # LIST action of the ORDERS module
│   │    │   ├── application/       # Application Layer
│   │    │   ├── domain/            # Domain Layer
│   │    │   └── infrastructure/    # Infrastructure Layer
│   │    └── create/                # CREATE action of the ORDERS module
│   │        ├── application/       # Application Layer
│   │        ├── domain/            # Domain Layer
│   │        └── infrastructure/    # Infrastructure Layer
│   ├── customer/                   # CUSTOMER module
│   │    ├── list/                  # LIST action of the CUSTOMER module
│   │    │   ├── application/       # Application Layer
│   │    │   ├── domain/            # Domain Layer
│   │    │   └── infrastructure/    # Infrastructure Layer
│   │    └── create/                # CREATE action of the CUSTOMER module
│   │        ├── application/       # Application Layer
│   │        ├── domain/            # Domain Layer
│   │        └── infrastructure/    # Infrastructure Layer
│   └── ...
├── tests/                          # Unit and functional tests
├── var/                            # Application-generated data
├── vendor/                         # Composer dependencies
├── .env.dist                       # Example environment variables file
├── .gitignore                      # Gitignore file
├── composer.json                   # Configuration file
├── docker-compose.yml              # Docker container configuration file
└── Makefile                        # Recipe for automating tasks with Docker
```

---

---

## Español

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
