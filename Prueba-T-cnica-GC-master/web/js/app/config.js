app.config(function ($routeProvider) {
  $routeProvider
      .when('/', {
          templateUrl: 'pages/inicio.html',
          controller: 'InicioController',
      })
      .when('/peliculas', {
          templateUrl: 'pages/peliculas.html',
          controller: 'PeliculasController',
      })
      .otherwise({
          redirectTo: '/',
      });
});