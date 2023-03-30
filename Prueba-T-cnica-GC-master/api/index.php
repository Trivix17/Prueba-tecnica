<?php

/**
 * Prueba técnica desarrollada y maquetada por
 * Juan Camilo López Morales para 
 * Garantías Comunitarias Grupo S.A.
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/Controllers/ApiController.php';

header("Access-Control-Allow-Origin: http://localhost");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: GET, POST, PATCH, DELETE");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}
  

$apiController = new ApiController();