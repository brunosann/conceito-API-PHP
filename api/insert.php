<?php
require('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method === 'post') {

  $title = filter_input(INPUT_POST, 'title');
  $text = filter_input(INPUT_POST, 'text');

  if($title && $text) {
    $sql = $pdo->prepare("INSERT INTO notes (title, text) VALUES (:title, :text)");
    $sql->bindValue(':title', $title);
    $sql->bindValue(':text', $text);
    $sql->execute();

    $id = $pdo->lastInsertId();

    $array['result'] = [
      'id' => $id,
      'title' => $title,
      'text' => $text
    ];
  } else {
    $array['error'] = 'Dados errados';
  }

} else {  
  $array['error'] = 'Método não permitido (apenas POST)';
}

require('return.php');