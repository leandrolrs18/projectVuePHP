<?php

require_once('user.php');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];
header('Content-type: application/json');
$body = file_get_contents('php://input');
$user = new User();

if($method === 'GET'){

  if ($_SERVER['REQUEST_URI'] == '/new') {
    $response = file_get_contents('https://randomuser.me/api/');
    $json = json_decode($response);

    if($json) {
      
      $user->set_nome(str_replace('"','', (string)json_encode($json->results[0]->name->first).' '.json_encode($json->results[0]->name->last)));
      $user->set_genero(str_replace('"','', (string) json_encode($json->results[0]->gender)));
      $user->set_cidade(str_replace('"','', (string)json_encode($json->results[0]->location->city)));
      $user->set_pais(str_replace('"','', (string)json_encode($json->results[0]->location->country)));
      $user->set_username(str_replace('"','', (string)json_encode($json->results[0]->login->username)));
      $user->set_email(str_replace('"','', (string)json_encode($json->results[0]->email)));
      $user->set_idade(str_replace('"','', (string)json_encode($json->results[0]->dob->age)));
      $user->set_telefone(str_replace('"','', (string)json_encode($json->results[0]->phone)));
      $user->set_imagem(str_replace('"','', (string)json_encode($json->results[0]->picture->large)));

      echo $user->insert_table();

    }
    else {
      echo 'erro na requisição';
    }

  }
  else if ($_SERVER['REQUEST_URI'] == '/all') {
    echo $user->return_all();
  }

}

?>