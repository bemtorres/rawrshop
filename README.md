# Rawrshop

Rawrshop es un sistema de gestión de contenidos, enfocado en la creación de cualquier tipo de página web, con licencia MIT.

<center>
  <img src="https://raw.githubusercontent.com/bemtorres/rawrshop/main/public/base/assets/rawrshop/shop.gif" width="200" style="border-radius:16px" />
</center>

## Descripción

**Rawrshop** es una herramienta fácil de usar para la creación de tiendas en línea y páginas web. Con el enfoque en la creación de nuevos módulos, Rawrshop ofrece una amplia gama de soluciones para satisfacer las necesidades de diferentes proyectos y usuarios. También puede ser utilizado como herramienta de estudio, proporcionando una biblioteca de funcionalidades y patrones reutilizables.

## Objetivos

Los objetivos de Rawrshop son los siguientes:

- Facilidad de uso: Rawrshop tiene como objetivo ser fácil de instalar, administrar y gestionar, para que los usuarios puedan crear su tienda en línea sin dificultades.
- Amplia gama de soluciones: Rawrshop busca apoyar a los desarrolladores en la creación de nuevos módulos y dar una amplia gama de soluciones para adaptarse a las necesidades de diferentes proyectos y usuarios.
- Herramienta de estudio: Rawrshop busca proporcionar una biblioteca de funcionalidades y patrones reutilizables que puedan ser utilizados en otros proyectos, para ayudar a los desarrolladores a aprender y mejorar sus habilidades.
- Herramienta inicial: Rawrshop se puede utilizar como herramienta inicial para la creación de páginas web y tiendas en línea, ya que ofrece la creación de usuarios, mejoras en la carga de imágenes, partials que se pueden utilizar, y otras características que pueden ser personalizadas.

## Características

Las características de Rawrshop incluyen:

- [x] Creacion de tienda base
- [X] Añadir redes sociales
- [X] Configuracion total del SEO
- [X] Configuración de icono .ico y título de la página
- [X] Añadir botón de chat de WhatsApp
- [X] Personzalizar css y js con POWER!!! YOLO
- [X] Banner de entradas
- [X] Agregar categorías y subcategorías del producto
- [X] Agregar producto y sus variantes
- [X] Agregar etiquetas personalizadas
- [X] Dar de baja el producto
- [X] Configuración del carrito de compra (SOLO WHATSAPP)
- [X] Busquedas a partir de su categoría o nombre
- [ ] Pagos en linea
- [ ] Pagos en una cuenta bancaría
- [x] Reducción de imagen (2MB a 100KB), creando tambien miniaturas de 70x70
- [x] Módulo mantención
- [X] Personalizar footer y modo suscriptor

## INSTALACION

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

## Advertencia

Rawrshop aún contiene mucho código espagueti que buscamos mejorar con el tiempo.

## Contribuciones

Si está interesado en contribuir al proyecto escribenos

## Licencia

Rawrshop se lanza bajo la Licencia MIT. Consulte el archivo LICENSE.md para obtener más información.


