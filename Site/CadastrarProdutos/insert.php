<?php

include('conn.php');

$codigo = $_POST['codigo'];
$categoria = $_POST['categoria'];
$nome = $_POST['nome'];
$imagem = basename($_FILES['imagem']['name']);
$descricao = $_POST['descricao'];

move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem);

$sql = "INSERT INTO produtos(codigo, categoria, nome, imagem, descricao) VALUES ('$codigo', '$categoria', '$nome', '$imagem', '$descricao')";

//deixar a categoria vazia
if(empty($_POST['codigo']['categoria']['nome'])){
    echo "Campos obrigatórios não preenchidos";
}
elseif ($conn->query($sql) == TRUE) {
    echo "Dado inserido com sucesso";
}
else{
    echo "Erro: " . $conn->error;
}