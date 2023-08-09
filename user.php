<?php
class User {
  private $nome = '';
  private $genero = '';
  private $cidade = '';
  private $pais = '';
  private $username = '';
  private $email = '';
  private $idade = 0;
  private $telefone = '';
  private $imagem = '';
  private $pdo;

  public function __construct()
  {
      try {
        $this->pdo = new PDO('mysql:host=localhost;dbname=apiuser', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      } 
      catch(PDOException $e) {
        throw new Exception($e->getMessage());
      }	
  }

  function get_nome() {
    return $this->name;
  }
  function set_nome($nome) {
    $this->nome = $nome;
  }

  function get_genero() {
    return $this->genero;
  }
  function set_genero($genero) {
    $this->genero = $genero;
  }

  function get_cidade() {
    return $this->cidade;
  }
  function set_cidade($cidade) {
    $this->cidade = $cidade;
  }

  function get_pais() {
    return $this->pais;
  }
  function set_pais($pais) {
    $this->pais = $pais;
  }

  function get_username() {
    return $this->username;
  }
  function set_username($username) {
    $this->username = $username;
  }

  function get_email() {
    return $this->email;
  }
  function set_email($email) {
    $this->email = $email;
  }

  function get_idade() {
    return $this->idade;
  }
  function set_idade($idade) {
    $this->idade = $idade;
  }

  function get_telefone() {
    return $this->telefone;
  }
  function set_telefone($telefone) {
    $this->telefone = $telefone;
  }

  function get_imagem() {
    return $this->imagem;
  }
  function set_imagem($imagem) {
    $this->imagem = $imagem;
  }

  public function insert_table() {
    try {
        
        $stmt = $this->pdo->prepare('INSERT INTO USERS  (nome, genero, cidade, pais, username, email, idade, telefone, imagem) 
          VALUES(:nome, :genero, :cidade, :pais, :username, :email, :idade, :telefone, :imagem)');

        $res = $stmt->execute(array(
          ':nome' => $this->nome,
          ':genero' => $this->genero,
          ':cidade' => $this->cidade,
          ':pais' => $this->pais,
          ':username' => $this->username,
          ':email' => $this->email,
          ':idade' => $this->idade,
          ':telefone' => $this->telefone,
          ':imagem' => $this->imagem,
        ));

        if ($res) {
 
            $arr = array(   'nome' => $this->nome, 
                            'genero' => $this->genero, 
                            'cidade' => $this->cidade, 
                            'pais' => $this->cidade,
                            'username' => $this->username, 
                            'email' => $this->email,
                            'idade' => $this->idade,
                            'telefone' => $this->telefone, 
                            'imagem' => $this->imagem
                        );
  
            return json_encode($arr);
        }
        else{
            return '[]';
        }

        
    } catch(PDOException $e) {
        return 'Error: ' . $e->getMessage();
    }
 }

 public function return_all() {
    try {
        
        $stmt = $this->pdo->prepare('SELECT * from users order by idUser desc');

        $res = $stmt->execute();
        
        if ($res) {

            $record = $stmt->fetchAll();

            if (count($record) > 0) {
                $items = array();

                foreach ($record as $key=>$row) {
                    $items[] = array(   'nome' => $row['nome'], 
                                        'genero' => $row['genero'], 
                                        'cidade' => $row['cidade'], 
                                        'pais' => $row['pais'],
                                        'username' => $row['username'], 
                                        'email' => $row['email'],
                                        'idade' => $row['idade'], 
                                        'telefone' => $row['telefone'], 
                                        'imagem' => $row['imagem']
                                    );
                 }

                 return json_encode($items);
            }
            
        }
        else{
            return '[]';
        }

        
    } catch(PDOException $e) {
        return 'Error: ' . $e->getMessage();
    }
 }

}

?>