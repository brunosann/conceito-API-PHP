<?php
$db_host = "127.0.0.1";
$db_name = "api_notes";
$db_user = "root";
$db_pass = "";

try {
  $pdo = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_pass);
} catch(PDOException $e) {
  echo "Erro: ".$e->getMessage();
}

$array = [
  'error' => '',
  'result' => []
];