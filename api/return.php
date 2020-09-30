<?php
header("HTTP/1.0 200 "); // defino e status code da resposta
// http_response_code(404);
header("Access-Control-Allow-Origin: *"); //permito os ip que poder fazer uma requisião
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); //defino os métodos que eu aceito 
header("Content-Type: application/json"); //ja defino que que meu retorno é um JSON
echo json_encode($array);
exit;

//  para receber json
// $json = file_get_contents('php://input');
// $obj = json_decode($json);
// print_r($obj);