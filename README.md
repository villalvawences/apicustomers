
# API Customers

## Servicios
- Registro usuario
POST | http://apicustomers.test/api/registro
{
    "name": "Jaqueline",
    "email": "jaqui@mail.com",
    "password": "123"
}

- Inicio de sesión
POST | http://apicustomers.test/api/acceso
{
    "email": "jaqui@mail.com",
    "password": "123"
}

- Eliminar token
POST | http://apicustomers.test/api/eliminarToken

- Crear cliente
POST | http://apicustomers.test/api/customers
{
    "dni": "1872564563",
    "id_com": 1,
    "id_reg": 1,
    "email": "jona@gmail.com",
    "name": "Jonathan",
    "last_name": "Bravo",
    "address": "direccion",
    "date_reg": "2023-10-28 23:39:23",
    "status": "I",
    "deleted": false
}

- Consultar cliente
GET | http://apicustomers.test/api/customers/search
{
    "search":"1872564563"
}

- Borrar logicamente a cliente
DELETE | http://apicustomers.test/api/customers/1

## Instalación

Para esta API se decidió usar Laravel 8
- Pasos (Ejecutar los siguientes comandos desde su terminal)
- Clonar el repostorio de github (https://github.com/villalvawences/apicustomers)
- composer install
- Modificar variables de entorno de .env

## Requerimientos mínimos
- PHP versión 7.2 | 8.0
- Laravel 8
- Sanctum 2.15
- Postman
