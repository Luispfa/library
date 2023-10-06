<div style="display: flex; align-items: center;">
  <div style="flex: 3;">
    <strong style="font-size: 30px; font-weight: bold;">Proyecto "Library"</strong>
    <br>
    <span style="font-size: 24px;">Desarrollo de Software con Symfony 6, PHP 8.2 y Arquitectura Hexagonal</span>
  </div>
  <div style="flex: 1;">
    <img src="youtube-banner.png" alt="@fitCoding - Library" style="width: 100%;">
  </div>
</div>


<br />
<br />

El proyecto **"Library"** es una aplicación de ejemplo que demuestra el uso de **Symfony 6**, **PHP 8.2**, **Docker** y varias buenas prácticas de desarrollo como **SOLID**, **TDD**, **DDD**, **Clean Code** y **Arquitectura Hexgonal**. La aplicación simula la gestión de órdenes de compra de libros por parte de un empleado para un cliente.

## Tabla de Contenidos
- [Instalación](#instalación)
- [Inicializar el proyecto](#inicializar-el-proyecto)
- [Actualiza el archivo "hosts"](#actualiza-el-archivo-hosts)
- [Estructura de Directorios](#estructura-de-directorios)

## Instalación

1. Asegúrate de tener **Docker** y **Docker Compose** instalados en tu sistema antes de continuar.


2. Lo primero es **Iniciar Docker Desktop**

3. A continuación, se describen los pasos para ejecutar los comandos necesarios para trabajar con el proyecto. Los comandos pueden ejecutarse en la terminal de su sistema operativo. 

Si tiene instalado Makefile, puede utilizarlo.

<details>
<summary style="font-size: 16px; font-weight: bold;">Makefile</summary>
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
<br />

De lo contrario, puede usar PowerShell.

<details>
<summary style="font-size: 16px; font-weight: bold;">PowerShell</summary>
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

Si tiene instalado Makefile, puede utilizarlo.

<details>
<summary style="font-size: 16px; font-weight: bold;">Makefile</summary>
<p>

```bash
# 1. Navega al directorio del proyecto:
cd library

# 2. levanta los contenedores Docker:
\library> make start

# 3. Parar los contenedores Docker:
\library> make stop

# 4. Ejecutar los tests de "tests/orders/list/application/"
\library> make execute-tests path=tests/orders/list/application/

# 5. EEjecutar los tests de "tests/orders/list/infrastructure/controller/"
\library> make execute-tests path=tests/orders/list/infrastructure/controller/

# 6. Limpiar cache
\library> make clear-cache
```

</p>
</details>
<br />

De lo contrario, puede usar PowerShell.

<details>
<summary style="font-size: 16px; font-weight: bold;">PowerShell</summary>
<p>

```bash
# 1. Navega al directorio del proyecto:
cd library

# 2. levanta los contenedores Docker:
\library> ./make.ps1 start

# 3. Parar los contenedores Docker:
\library> ./make.ps1 stop

# 4. Ejecutar los tests de "tests/orders/list/application/"
\library> ./make.ps1 execute-tests path=tests/orders/list/application/

# 5. EEjecutar los tests de "tests/orders/list/infrastructure/controller/"
\library> ./make.ps1 execute-tests path=tests/orders/list/infrastructure/controller/

# 6. Limpiar cache
\library> ./make.ps1 clear-cache
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