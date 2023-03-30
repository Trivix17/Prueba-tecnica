# Plataforma de Peliculas

- [Garantias Comunitarias Grupo S.A.](https://www.garantiascomunitarias.com/)

---

## Explicación de la prueba técnica

¡Hola! Esta será tu prueba técnica para el puesto de programador. En esta prueba se te presentarán varios problemas que deberás resolver mediante la implementación de código. Además, también deberás crear tu propio código para satisfacer los requisitos específicos del puesto. ¡Buena suerte!

Las tecnologías a utilizar son:
- AngularJS
- PHP
- MySQL

Tienes total libertad para cambiar el diseño o la interfaz de la plataforma. Sin embargo, es importante que cumplas con todos los requisitos exigidos para la postulación.

## Estructura del proyecto

A continuación, encontrarás la estructura básica del proyecto, donde se recomienda seguir la misma nomenclatura en general.

```
📦api
 ┃ 📂Controllers
 ┃ ┣ 📜ApiController.php
 ┃ ┣ 📜CommentsController.php
 ┃ ┣ 📜DBContextController.php
 ┃ 📂Models
 ┃ ┣ 📜CommentsMovies.php
 ┃ 📂DB
 ┃ ┗ 📜structure.sql
 ┃ 📜index.php
 ┗ 📜package.json
📦web
 ┃ 📂css
 ┃ ┣ // Archivos de Bootstrap CSS
 ┃ 📂js
 ┃ ┣ 📂app
 ┃ ┃ ┣ 📜app.js
 ┃ ┃ ┣ 📜config.js
 ┃ ┃ ┣ 📜inicio.js
 ┃ ┃ ┣ 📜peliculas.js
 ┃ ┣ 📂core
 ┃ ┃ ┣ 📜angularjs-route.min.js
 ┃ ┃ ┣ 📜angularjs-route.min.js.map
 ┃ ┃ ┣ 📜angularjs.min.js
 ┃ ┃ ┗ 📜angularjs.min.js.map
 ┃ ┣ // Archivos de Bootstrap JS
 ┃ 📂pages
 ┃ ┣ 📜inicio.html
 ┃ ┣ 📜peliculas.html
 ┃ 📂shared
 ┃ ┗ 📜navbar.html
 ┗ 📜index.html
📜README.MD
```

## Trabajo a desarrollar

Se te presentará una estructura base del proyecto, dónde en algunos casos deberás corregir código e incluso crear la lógica necesaria
para su correcto funcionamiento. Puedes revisar los trabajos a realizar con el inspector que ofrece Visual Studio Code.

Todos los trabajos están comentados con la palabra ``TODO``.

## Pasos

No es necesario instalar librerías adicionales, por defecto la prueba está lista para ser desarrollada, pero antes de empezar, te recomendamos seguir una serie de pasos.

- I) Crea la base de datos utilizando el archivo "structure.sql". <br/>
- II) En caso de ser necesario, modifica las credenciales de acceso a la base de datos en el controlador "DBContextController.php". <br/>
- III) Sumérgete en la documentación de TheMovieDB (https://developers.themoviedb.org/3/getting-started/introduction) para aprender cómo funciona su - API. Recuerda que debes registrarte para poder obtener un token de acceso para realizar las solicitudes. <br/>
- IV) Después de registrarte en la página, crea un token de acceso en https://www.themoviedb.org/settings/api/request. <br/>
- V) Cuanto tengas el token de acceso, cambiar el texto de ``YOU_KEY_ACCESS`` por el token, en el archivo ``peliculas.js``.
- VI) Consuma la API desde la web, ya sea utilizando una librería de terceros o fetch. Idealmente usar el mismo sistema $http que ofrece AngularJS,<br/>
- VII) Muestra las películas en el diseño de las tarjetas en la vista de las películas. <br/>
- VIII) Agrega la lógica necesaria para el funcionamiento del buscador. <br/>
- IX) Inicia la API de php usando el comando ``npm run start`` en la carpeta raíz de la API. <br/>
- X) Realiza el respectivo CRUD para la visualización de los comentarios de las películas en la API de PHP. <br/>
- XI) Conecta la API de PHP con la web. Recuerda que algunas películas pueden no tener comentarios aún, mientras que otras pueden tener uno o más comentarios.

## Entregable esperado

[ ] Desarrollar una interfaz de usuario que permita a los usuarios buscar películas por título. <br/>
[ ] Utilizar la API de IMDb o The Movie Database para obtener información sobre las películas que coindicen con la búsqueda del usuario. La API podría devolver información como el título de la película, el año de lanzamiento, el género, una breve descripción y su respectiva imagen. <br/>
[ ] Mostrar la información obtenida de la API en la web. <br/>
[ ] Mostrar a los usuarios los comentarios ya existentes de la película que se encuentra visualizando. <br/>
[ ] Permitir a los usuarios comentar las películas. Estos comentarios van almacenados en la base de datos usando la API de PHP. <br/>
[ ] La visualización y creación de nuevos comentarios, deberá ser dentro de un modal.

## Fecha límite del entregable

Cabe recarlacar que tienen un tiempo de 4 días hábiles para hacer la entrega de la misma, siendo la fecha límite el jueves 30 de marzo.

## Información adicional

Una vez finalizada la prueba, deberá subir el proyecto en su propio repositorio de git de forma pública y enviar el link al correo aospina@garantiascomunitarias.com, con el asunto POSTULADO RED SOPORTE TECNOLÓGICO, además deberá incluir sus datos personales como nombre, cédula y contacto.

Nuestro equipo de trabajo desarrolló este proyecto con el propósito de filtrar la gran cantidad de solicitudes que recibimos para este puesto y facilitar el proceso de selección. Agradecemos tu interés y esperamos que este proceso sea beneficioso tanto para nosotros como para ti.
