<?php

    session_start();

    include('conn.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    
    $resultado = $conn->query($sql);

    if($resultado->num_rows > 0){
        $linha = $resultado->fetch_assoc();
        if($linha['senha'] == hash('sha256', $password)){
            $_SESSION ['login'] = true;
<<<<<<< HEAD
            $_SESSION ['acesso'] = $linha['acesso'];
            if($_SESSION['acesso']){
                header('Location: ../RelatorioFinanceiro/RelatorioFinanceiro.php');
            }else{
                header('Location: ../CadastrarProdutos/form.php');
            }
            
=======
            if($linha['adm'] == 0){
            header('Location: ../CadastrarProdutos/form.php');
            }else{
                header('Location: ../relatoriofinanceiro/form.php');
            }
>>>>>>> a5f368400deb512298ab3b019d6f64c092271c16
        }
        else{
            //substituir por cancelamento
            header('Location: ../Login/login.php');
        }
    }else{
        //substituir
        header('Location: ../Login/login.php');
    }