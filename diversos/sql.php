<?php

    $servername = "localhost";
    $username = "root";
    $password = "1234";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "CREATE DATABASE IF NOT EXISTS loja";

    if ($conn->query($sql) === TRUE) {
      mysqli_select_db($conn,'loja');
    } else {
      echo "Error creating database: " . $conn->error;
    }

    $criacao = array(

      "CREATE TABLE IF NOT EXISTS Clientes(
        id_cliente int(5) AUTO_INCREMENT NOT NULL,
        nome_completo varchar(100) NOT NULL,
        email varchar(250) NOT NULL,
        telefone varchar(15),
        username varchar(25) NOT NULL,
        password varchar(20) NOT NULL,
        primary key (id_cliente)
      );",

      "CREATE TABLE IF NOT EXISTS Produtos(
        id_produto int(5) AUTO_INCREMENT NOT NULL,
        descricao varchar(100) NOT NULL,
        quantidade int NOT NULL,
        imagem int(5),
        preco decimal(10,3) NOT NULL,
        primary key (id_produto)
      );",

      "CREATE TABLE IF NOT EXISTS Pedidos(
        id_pedido int(5) AUTO_INCREMENT NOT NULL,
        id_cliente int(5) NOT NULL,
        date_time_pedido date NOT NULL,
        primary key (id_pedido)
      );"
      
    );
    


     foreach ($criacao as $value) $conn->query($value); 
    
?>