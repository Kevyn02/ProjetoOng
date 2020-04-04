<?php
    require("../database/conn.php");
    $id = "";
    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }
    $tabela = 0;
    if(isset($_POST['tabela'])){
        $tabela = $_POST['tabela'];
    }
    if($id != ""){
        if($tabela == 0){
            $preco = "";
            $cx_imagem = "";
            $sql = "SELECT * FROM produtos WHERE id_produto = $id";
            $resultado = $conn->query($sql);
            if($resultado->num_rows == 1){
                while($linha = $resultado->fetch_assoc()){
                    $preco = $linha['valor_unitario'];
                    $cx_imagem = $linha['imagem'];
                }
            }
            echo $preco .",". $cx_imagem;
        }
        else{
            $nome = "";
            $sql = "SELECT * FROM produtos WHERE id_produto = $id";
            $resultado = $conn->query($sql);
            if($resultado->num_rows == 1){
                while($linha = $resultado->fetch_assoc()){
                    $nome = $linha['nome'];
                }
            }
            echo $nome;
        }
    }
    else{
        $sql = "SELECT * FROM produtos";
        $resultado = $conn->query($sql);
        $numero = 1;
        if($resultado->num_rows > 0){
            while($linha = $resultado->fetch_assoc()){
                $id= $linha['id_produto'];
                $nome= $linha['nome'];
                echo "<option value='$id'>$numero - $nome</option>";
                $numero++;
            }
        }
    }
?>