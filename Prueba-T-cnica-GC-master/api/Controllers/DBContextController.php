<?php

/**
 * Clase encargada de realizar la respectiva lógica de conexión con la base de datos.
 */
class DBContextController
{
  private String $port = "3306";
  private String $username = "root";
  private String $host = "localhost";
  private String $password = "";
  private String $database_name = "prueba_tecnica";

  /**
   * Prepará la conexión con la base de datos para realizar peticiones a la misma.
   * 
   * @return PDO Representación de la conexión entre PHP y la base de datos.
   */
  public function prepareConnectionToDatabase(): PDO
  {
    try {
      $pdo = new PDO("mysql:host=$this->host;dbname=$this->database_name;port=$this->port", $this->username, $this->password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // Establecer el conjunto de caracteres a UTF-8
      $pdo->exec("set names utf8");

      return $pdo;
    } catch (PDOException $th) {
      // Mostrar error y detener la ejecución del script en caso de falla
      die("Error al conectar a la base de datos: " . $th->getMessage());
    }
  }
}
