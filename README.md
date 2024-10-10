

# Post Microservice

## Descripcion Backend
Este repositorio alberga un microservicio desarrollado en Lumen 9 diseñado para gestionar post y usuarios, con autenticacion.
## Descripcion Backend
Este repositorio alberga un proyecto para frontend desarrollado en next.js diseñado para gestionar post y usuarios, con autenticacion.
## Requisitos
- Composer
- PHP >= 8.1
- nodejs


## Instalacion y ejecucion en local
Clona este repositorio en tu máquina local:
- ` git clone https://github.com/cindysanchez06/BlogFullStack.git`
Accede al directorio del proyecto
Correr en consola:
### Sin docker
- `composer install/` para instalar dependencias.
- `php artisan key:generate`
- `php -S localhost:8000 -t public` para arrancar el servidor en el puerto 8000.

## URLs
- **Login**:
  - [http://host:puerto/api/login](http://host:puerto/api/store)  -  [http://localhost:8000/api/login](http://localhost:8000/api/store)
    - La URL base de nuestra API se emplea para enviar solicitudes destinadas a autenticacion, recibe un body con email y password, su respuesta es un token que expira en 1 hora.
- **Crear post**:
  - [http://host:puerto/api/posts](http://host:puerto/api/store/ingredients)  -  [http://localhost:8000/api/posts](http://localhost:8000/api/store/ingredients)
    - Esta URL de la API se emplea crear un post, es necesario enviar en el header toker para autorizacion.
- **Obtener el historial de compras al mercado**:
    - [http://host:puerto/api/register](http://host:puerto/api/store/purchase-history)  -  [http://localhost:8000/api/register](http://localhost:8000/api/store/purchase-history)
        - Esta URL de la API se utiliza para registro de un nuevo usuario, recibe un body en json con las propiedades name:email:password.

