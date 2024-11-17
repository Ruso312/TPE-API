# Api para Clientes

**:computer:Desarrolladores:**
* Dacenzo Marco
  *  :email:: marcodace00@gmail.com
* Santillan Ramos Patricio
  *  :email:: Patricio21102000@hotmail.com

### Descripción:
Este proyecto tiene como objetivo crear una API de gestión de clientes para un gimnasio. La API permite acceder a los datos de los clientes almacenados en la base de datos, así como realizar operaciones de *creación, modificación y eliminación* de clientes. Además, los usuarios pueden obtener una lista de clientes con opciones de filtrado personalizadas, facilitando la gestión y análisis de la información.

### Endpoints:
Se detalla la lista de endpoints disponibles en la API para la gestión de clientes en el gimnasio:

 **GET** /api/clientes: Devuelve todos los clientes almacenados en la base de datos.

 **GET** /api/cliente/:id: Devuelve los detalles de un cliente específico según su ID.

 **POST** /api/cliente: Permite crear un nuevo cliente proporcionando la información requerida en el cuerpo de la solicitud.

 **PUT** /api/cliente/:id: Actualiza un cliente existente por ID.

 **DELETE** /api/cliente/:id: Elimina un cliente específico por ID.

### Ordenamiento:
Los clientes se pueden ordenar por campos específicos y elegir la dirección de este orden (ASC o DESC).

*Ejemplos:*

 /api/clientes?ordenadoPor=nombre&direccion=ASC

 /api/clientes?ordenadoPor=email&direccion=DESC
