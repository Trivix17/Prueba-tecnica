<?php

require $_SERVER['DOCUMENT_ROOT'] . '/Models/CommentsMovies.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Controllers/DBContextController.php';

class CommentsController
{
  private DBContextController $context;

  public function __construct()
  {
    $this->context = new DBContextController();
  }

  public function getAll()
  {
    // Prepará la conexión con la base de datos.
    $pdo = $this->context->prepareConnectionToDatabase();

    // Realizará la respectiva consulta.
    $query = $pdo->query("SELECT * FROM comments;");
    $comments = $query->fetchAll();

    $data = [];

    foreach ($comments as $item) {
      $data[] = new CommentsMovies($item['comment'], $item['idMovie'], $item['id']);
    }

    unset($pdo);

    http_response_code(200);
    return json_encode(['message' => 'successfully', 'data' => $data]);
  }

  public function getAllmovies()
  {
    // Prepará la conexión con la base de datos.
    $pdo = $this->context->prepareConnectionToDatabase();

    // Realizará la respectiva consulta.
    $query = $pdo->query("SELECT * FROM comments GROUP by idMovie;");
    $comments = $query->fetchAll();

    $data = [];

    foreach ($comments as $item) {
      $data[] = new CommentsMovies($item['comment'], $item['idMovie'], $item['id']);
    }

    unset($pdo);

    http_response_code(200);
    return json_encode(['message' => 'successfully', 'data' => $data]);
  }

  // TODO: Realizar la lógica para obtener los comentarios de una película en especifico.
  public function getAllByMovie($idMovie)
  {
        // Prepará la conexión con la base de datos.
        $pdo = $this->context->prepareConnectionToDatabase();

        // Realizará la respectiva consulta.
        $query = $pdo->query("SELECT * FROM comments WHERE idMovie =$idMovie");

        $comments = $query->fetchAll();
    
        $data = [];
    
        foreach ($comments as $item) {
          $data[] = new CommentsMovies($item['comment'], $item['idMovie'], $item['id']);
        }
    
        unset($pdo);
    
        http_response_code(200);
        return json_encode(['message' => 'successfully', 'data' => $data]);
  }

  public function create()
  {
    // Obtiene los datos del cuerpo.
    // $nombre = $_POST['nombre'];
    // $apellido = $_POST['apellido'];
    $data = $_POST;
    // Crear el objeto.
    $obj = new CommentsMovies($data['comment'], $data['idMovie'], null);

    // Prepará la conexión con la base de datos.
    $pdo = $this->context->prepareConnectionToDatabase();

    // Realizará la respectiva creación.
    $query = $pdo->prepare("INSERT INTO comments(comment, idMovie) VALUES (?, ?)");
    $query->execute([$obj->comment, $obj->idMovie]);

    http_response_code(201);
    return json_encode(['message' => 'successfully', 'data' => [ 'comment' => $obj->comment, 'idMovie' => $obj->idMovie ]]);
  }

  // TODO: Realizar la lógica de actualización de un comentario.
  public function update($id)
  {
    // Obtiene los datos del cuerpo.
    $data = json_decode(file_get_contents("php://input"));
    // Preparar la conexión con la base de datos.
    $pdo = $this->context->prepareConnectionToDatabase();

    // Realizar la actualización.
    $query = $pdo->prepare("UPDATE comments SET comment = ? WHERE id = ?");
    $query->execute([$data->nuevoComment, $id]);


    http_response_code(200);
    return json_encode(['message' => 'successfully', 'data' => $data]);
  }

  // TODO: Realizar la lógica de eliminación de un comentario.
  public function delete($id)
  {
    // Preparar la conexión con la base de datos.
    $pdo = $this->context->prepareConnectionToDatabase();

    // Realizar la eliminación.
    $query = $pdo->prepare("DELETE FROM comments WHERE id = ?");
    $query->execute([$id]);
    
    http_response_code(200);
    return json_encode(['message' => 'successfully']);
  }
}
