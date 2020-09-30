<?php
require('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']); //pegar o metodo da requisição

if($method === 'get') {
  $sql = $pdo->prepare("SELECT * FROM notes");
  $sql->execute();

  if($sql->rowCount() > 0) {
    $dados = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($dados as $item) {
      $array['result'][] = [
        'id' => $item['id'],
        'title' => $item['title']
      ];
    }
  }
} else {
  $array['error'] = 'Método não permitido (apenas GET)';
}

require('return.php');