app.controller("PeliculasController", ["$scope", "$http", function($scope, $http) {
  $scope.movies = [];
  $scope.genero= "";
  $scope.query = "";
  $scope.setActive("menuPeliculas");
  var apiKey = '5253e4146a75dec3eefd0018bf6c4a21';

  // Listar comentarios
  $scope.comentarios = [];
  $http.get('http://localhost:8000/comments')
  .then(function(response) {
    // Manejar respuesta de la API
  $scope.comentarios = response.data.data;
    console.log($scope.comentarios);
  });
 
  // Realiza una solicitud HTTP GET para obtener los géneros de las películas
  $http.get('https://api.themoviedb.org/3/genre/movie/list', {
    params: {
      api_key: apiKey
    }
  }).then(function(response) {
    $scope.genero = response.data;
    // console.log($scope.genero);
  });

  $scope.search = function() {
    $http.get("https://api.themoviedb.org/3/search/movie", {
      params: {
        api_key: "5253e4146a75dec3eefd0018bf6c4a21",
        query: $scope.query
      }
    }).then(function(res) {
      $scope.movies = res.data.results;
      // console.log($scope.movies);
      for (let index = 0; index < $scope.movies.length; index++) {
        // console.log($scope.movies[index].genre_ids)
        for (let y = 0; y < $scope.movies[index].genre_ids.length; y++) {
          const genreId = $scope.movies[index].genre_ids[y];
          const genre = $scope.genero.genres.find(g => g.id === genreId);
          if (genre) {

            $scope.movies[index].genre_ids[y] = genre.name;

          }
        }
        
      }

    });
  };

}]);

app.controller("PeticionesController", ['$scope', '$window', '$http', function($scope, $window, $http) {
// Crear datos
$scope.enviarDatos = function(idEnviarComentario) {
  // Definir los datos que se enviarán en la solicitud POST
  var data = {
    comment: $scope.comment,
    idMovie: parseInt(idEnviarComentario)
  };
  console.log(idEnviarComentario);
  console.log(data);
  if (!data.comment || data.comment.trim() === '') {
    // Si comment es nulo, undefined o una cadena vacía, muestra un mensaje de error
    console.error('El comentario no puede estar vacío.');
  }
  else{
    console.log(data);
    // Convertir los datos a un formato de array
    var dataArray = $.param(data);
    // Configurar las opciones para la solicitud POST
    var options = {
      method: 'POST',
      url: 'http://localhost:8000/create',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      data: dataArray
    };
    // // Realizar la solicitud POST utilizando la librería http de AngularJS
    $http(options)
      .then(function(response) {
        // Agrega el nuevo comentario a la matriz de comentarios
        console.log(response.data);
        $scope.comentarios.push(response.data);
        // Mostrar mensaje de éxito en una alerta
        alert("El comentario se agregó correctamente.");
        // Redireccionar al usuario a la nueva página después de 3 segundos
        $window.location.href = 'http://localhost/Prueba-T-cnica-GC-master/web/';
      })
      .catch(function(error) {
        // Manejar errores de la solicitud
        alert("El comentario no se pudo agregar, intentalo de nuevo.");
        console.log(error);
      });

  }

  }
}]);

app.controller("EditarController", ["$scope", "$http", function($scope, $http) {
  $scope.editarComentario = function(idComentario) {
    var idNuevoComentario = document.getElementById('idNuevoComentario' + idComentario).value;
    var nuevoComentario = document.getElementById('nuevoComentario' + idComentario).value;
    var datosE = {
      nuevoComment: nuevoComentario,
    };
    var options = {
      method: 'PATCH',
      url: 'http://localhost:8000/editarComentario/'+idNuevoComentario,
      headers: {
        'Content-Type': 'application/json'
      },
      data: datosE
    };
    $http(options)
    .then(function(response) {
      // Manejar la respuesta del API
      // $scope.comentarios.push(response.data);
            console.log(response.data);
      alert("El comentario se actualizó correctamente.");

    })
    .catch(function(error) {
      // Manejar errores de la solicitud
      alert("El comentario no se pudo actualizar, intentalo de nuevo.");
      console.log(error);
    });
}

}]);

app.controller("eliminarController", ["$scope", "$window", "$http", function($scope,$window ,$http) {
  $scope.eliminarComentario = function(idComentario) {
  var idEliminarComentario = document.getElementById('idNuevoComentario' + idComentario).value;
  // var nuevoComentario = document.getElementById('nuevoComentario' + idComentario).value;
    console.log(idEliminarComentario);
    var options = {
      method: 'DELETE',
      url: 'http://localhost:8000/delete/'+idEliminarComentario
    };
    $http(options)
    .then(function(response) {
      // Mostrar una alerta de que se eliminó el comentario
      alert('El comentario se eliminó correctamente.');
      $window.location.href = 'http://localhost/Prueba-T-cnica-GC-master/web/';
      // console.log(response.data);

    })
    .catch(function(error) {
      // Manejar errores de la solicitud
      console.log(error);
    });
}
}]);

app.controller("InicioController", ["$scope", "$http", function($scope, $http) {

  $scope.comentarios = [];
  $http.get('http://localhost:8000/comments')
  .then(function(response) {
    // Manejar respuesta de la API
  $scope.comentariosInicio = response.data.data;
  });
  
  $http.get('http://localhost:8000/todasLasMovies')
  .then(function(response) {
    // Manejar respuesta de la API
    $scope.idTodasMovies = response.data.data;
    $scope.soloIdMovies = $scope.idTodasMovies.map(function(movieSoloId) {
      return movieSoloId.idMovie;
    });
    var apiKey = '5253e4146a75dec3eefd0018bf6c4a21';
    var movieIds = $scope.soloIdMovies; // array de IDs de películas
    var promises = [];
  
    // Iterar a través de los IDs de las películas y crear una promesa para cada solicitud HTTP
    movieIds.forEach(function(movieId) {
      var promise = $http.get("https://api.themoviedb.org/3/movie/" + movieId, {
        params: {
          api_key: apiKey
        }
      }).then(function(res) {
        return res.data;
      });
  
      promises.push(promise);
    });
  
    // Esperar a que se resuelvan todas las promesas y combinar los resultados en un solo array
    Promise.all(promises).then(function(results) {
      $scope.moviesComentadas = results;
    });
  });
}]);