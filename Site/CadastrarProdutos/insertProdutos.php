<?php

include('conn.php');

$diretorio = "imagens/";
$codigo = $_POST['codigo'];
$categoria = $_POST['categoria'];
$nome = $_POST['nome'];
$imagem = $diretorio . basename($_FILES['imagem']['name']);
$tipo = strtolower(pathinfo($imagem, PATHINFO_EXTENSION));
$descricao = $_POST['descricao'];
$valor = $_POST['valor'];


move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem);

$sql = "SELECT * FROM produtos WHERE nome = '$nome'";

$resultado = $conn->query($sql);

if($resultado->num_rows > 0){
    header("Location: ../CadastrarProdutos/form.php");
}
else{
    $sql = "INSERT INTO produtos(codigo, categoria, nome, imagem, descricao, valor_unitario) VALUES ('$codigo', '$categoria', '$nome', '$imagem', '$descricao', '$valor')";

    if(empty($codigo) || empty($categoria) || empty($nome) || empty($valor)){
        header("Location: ../CadastrarProdutos/form.php");
    }
    elseif ($conn->query($sql) == TRUE ) {
        header("Location: ../Estoque/form.php");
    }
    else{
        echo "Erro: " . $conn->error;
    }
}




