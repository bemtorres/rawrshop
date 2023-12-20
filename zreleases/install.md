#  Rawrshop 🦖 instalación
[Home](../README.md) > [Instalación](zreleases/install.md)

Bienvenido a Rawrshop, un proyecto de código abierto para crear una tienda en línea con Laravel 9.19 y PHP 8.0.2

En zrelasese escribiremos las actualizaciones que se vayan realizando en el proyecto y las locuras de propuestas que se nos ocurran.

- PHP 8.0.2 - Laravel 9.19
- Mysql 5.7

### Instalación
Copy .env
```shell
cp .env.example .env
```

#### Instalación de componentes básicos
```shell
composer install
php artisan storage:link
```

Migraciones
```shell
php artisan migrate:fresh --seed
```
