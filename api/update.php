<?php
require('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if ($method === 'put') {

  parse_str(file_get_contents('php://input'), $input);

  $id = $input['id'] ?? null;
  $title = $input['title'] ?? null;
  $text = $input['text'] ?? null;

  $id = filter_var($id);
  $title = filter_var($title);
  $text = filter_var($text);

  if ($id && $title && $text) {
    $sql = $pdo->prepare("SELECT * FROM notes WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if ($sql->rowCount() > 0) {
      $sql = $pdo->prepare("UPDATE notes SET title = :title, text = :text WHERE id = :id");
      $sql->bindValue(':id', $id);
      $sql->bindValue(':title', $title);
      $sql->bindValue(':text', $text);
      $sql->execute();

      $array['result'] = [
        'id' => $id,
        'title' => $title,
        'text' => $text
      ];
    } else {
      $array['error'] = 'ID inexistente';
    }
  } else {
    $array['error'] = 'Preencha os dados';
  }
} else {
  $array['error'] = 'Método não permitido (apenas PUT)';
}

require('return.php');
