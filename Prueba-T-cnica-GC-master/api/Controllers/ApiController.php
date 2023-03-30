<?php

require $_SERVER['DOCUMENT_ROOT'] . '/Controllers/CommentsController.php';

class ApiController
{
  private CommentsController $commentsController;

  public function __construct()
  {
    $this->commentsController = new CommentsController();
    $this->initAPI();
  }

  /**
   * Inicializa la API.
   * 
   * Lógica encargada de recibir todas las peticiones que envian desde la API.
   */
  private function initAPI()
  {
    // Obtendremos todas las solicitudes de GET.
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if ($_SERVER['REQUEST_URI'] === '/comments') {
        echo $this->commentsController->getAll();
        return;
      }
    }
    // Obtendremos todas las solicitudes de GET.
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if ($_SERVER['REQUEST_URI'] === '/todasLasMovies') {
        echo $this->commentsController->getAllmovies();
        return;
      }
    }
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      // Verifica si la solicitud es para obtener comentarios de una película en particular
      if (strpos($_SERVER['REQUEST_URI'], '/buscarComentario') === 0) {
          // Obtener el ID de la película de la variable $_GET
          $idMovie = $_GET['id'];
          
          // Llamar al método para obtener los comentarios de la película
          echo $this->commentsController->getAllByMovie($idMovie);
          return;
      }
    }

    // Obtendremos todas las solicitudes de POST.
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if ($_SERVER['REQUEST_URI'] === '/create') {
        echo $this->commentsController->create();
        return;
      }
    }

    // Obtendremos todas las solicitudes de PATCH.
    if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
      $req = explode('/', $_SERVER['REQUEST_URI']);
      
      if (('/' . $req[1]) === '/editarComentario') {
        echo $this->commentsController->update($req[2]); // => Envía el id del registro a actualizar
        return;
      }
    }

    // Obtendremos todas las solicitudes de DELETE.
    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
      $req = explode('/', $_SERVER['REQUEST_URI']);
      
      if (('/' . $req[1]) === '/delete') {
          $idComment = $req[2];
          
          echo  $this->commentsController->delete($idComment);
          return;
      }
  }

    return $this->methodNotFound();
  }

  /**
   * Lógica encargada de envíar una respuesta de Endpoint no encontrado.
   */
  private function methodNotFound()
  {
    http_response_code(404);
    echo json_encode(['error' => 'Endpoint not found.']);
  }
}
