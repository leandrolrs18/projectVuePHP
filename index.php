<?php
  
  // if(!array_key_exists('path', $_GET)){
  //   echo 'Error. Path missing.' . array_key_exists('path', $_GET);
  //   exit;
  // }

  // $path = explode('/', $_GET['path']);
  
  // if(count($path)==0 || $path[0] == ""){
  //   echo 'Error. Path missing.';
  //   exit;
  // }

  // $param1 = "";
  // if(count($path)>1){
  //   $param1 = $path[1];
  // }
  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
  header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
  header('Content-Type: application/json');

  $method = $_SERVER['REQUEST_METHOD'];
  header('Content-type: application/json');
  $body = file_get_contents('php://input');

  if($method === 'GET'){

    $contents = file_get_contents('licitacoes.json');
    $json = json_decode($contents, true);

    if($json){
        echo json_encode($json);
    }else{
      echo '[]';
    }
  }
  // if($method === 'POST'){
  //   $jsonBody = json_decode($body, true);
  //   $jsonBody['id'] = time();
    
  //   if(!$json[$path[0]]){
  //     $json[$path[0]] = [];
  //   }
  //   $json[$path[0]][] = $jsonBody;
  //   echo json_encode($jsonBody);
  //   file_put_contents('db.json', json_encode($json));
  // }


  // if($method === 'PUT'){
  //   if($json[$path[0]]){
  //     if($param1==""){
  //       echo 'error';
  //     }else{
  //       $encontrado = findById($json[$path[0]], $param1);
  //       if($encontrado>=0){
  //         $jsonBody = json_decode($body, true);
  //         $jsonBody['id'] = $param1;
  //         $json[$path[0]][$encontrado] = $jsonBody;
  //         echo json_encode($json[$path[0]][$encontrado]);
  //         file_put_contents('db.json', json_encode($json));
  //       }else{
  //         echo 'ERROR.';
  //         exit;
  //       }
  //     }
  //   }else{
  //     echo 'error.';
  //   }
  // }