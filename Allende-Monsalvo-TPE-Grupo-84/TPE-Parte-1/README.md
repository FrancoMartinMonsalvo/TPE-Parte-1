------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- 
Emails de los integrantes del grupo: 
  aleallende07@gmail.com  / franco.monsalvo24@gmail.com
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- 
Temática: 
  Se realizará un proyecto de ecommerce gaming (venta de juegos online).
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- 
  Breve descripcion de la tematica: - Lo que buscamos en este proyecto, es satisfacer las necesidades de las personas interesadas en comprar videojuegos proporcionándole una plataforma sencilla de usar, donde se brinda información detallada de cada producto.
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- 
  Se tomó en consideración la inclusión de un rol de superAdmin propuesta por Gastón, el cual permite otorgar permisos de administrador a una lista de usuarios que se encuentra en la base de datos (ademas de tener las funcionalidades que tendria un admin normal), sin necesidad de tener que hacerlo directamente desde la misma.
-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------   Estos superAdmin que implementamos, son únicamente para los siguientes usuarios : 
    SuperAdmin1: Username: Ale 2.0 - Password: ale2.0
    SuperAdmin2: Username: CCindor - Password: hola123
  El siguiente usuario es el planteado según la consigna como administrador requerido:
    Administrador: Username: webadmin - Password: admin
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- 
  La vista de la página web únicamente va a proporcionarse para aquellos usuarios que existan en la base de datos (en el caso de no exista, creamos un formulario de registro para crear el usuario en la misma).
  Una vez logueados, la vista se mostrará de una u otra forma dependiendo de si el usuario es normal (solo visualizacion de los juegos/categorias), administrador (permite funcionalidades CRUD en la lista de juegos y categorias )  o superAdmin (además de realizar las mismas funcionalidades del administrador, posibilita otorgar roles de administrador a usuarios en la seccion "Users" ubicada en el header).
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- 

Imagen de la tabla de relacion entidad (DER):
![image](https://github.com/FrancoMartinMonsalvo/TPE-Parte-1/blob/main/Allende-Monsalvo-TPE-Grupo-84/TPE-Parte-1/DER.jpg)
