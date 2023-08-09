# projectVuePHP

rodar vue: 
1. npm start
2. npm run serve

rodar PHP:
php -S localhost:8080 index.php

banco de dados:
1. Criar localmente banco de dados mariadb
CREATE  DATABASE IF NOT EXISTS apiuser

CREATE TABLE IF NOT EXISTS USERS(
    idUser INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(80),
    genero VARCHAR(10),
    cidade VARCHAR(40),
    pais  VARCHAR(30),
    username VARCHAR(60),
    email VARCHAR(50),
    idade INT ,
    telefone VARCHAR(40),
    imagem VARCHAR(300)
);
