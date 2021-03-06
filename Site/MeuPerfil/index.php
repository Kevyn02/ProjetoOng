<?php
    include('../database/conn.php');
    session_start();
    if(!isset($_SESSION['id_usuario'])){
        header('Location: ../Login');
    }
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = $conn->query($sql);
    if($resultado->num_rows == 1){
        while($linha = $resultado->fetch_assoc()){
            $nome = $linha['nome'];
        }
    }

    if($_SESSION['acesso'] == true){
        $tipo_usuario = "Administrador";
    }else{
        $tipo_usuario = "Usuário comum";
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../Menu/menu.css" />
    <link rel="icon" href="../Menu/logoigreja.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="estilo.css">
    <title>Meu perfil</title>
</head>

<body>
    <?php require '../Menu/menu.php'; ?>
    <main class="container primary">
        <div class="display-4 text-left">
            <h1>Meu perfil</h1>
            <hr />
        </div>
        <div class="col-12 col-lg-6 text-left">
            <img src="user.png" id="user" class="img-fluid card-img-top" alt="">
            <label class="col-12 px-0"><strong>Nome: </strong><?php echo $nome;?></label>
            <label class="col-12 px-0"><strong>Email: </strong><?php echo $email;?></label>
            <label class="col-12 px-0"><strong>Tipo de usuário: </strong><?php echo $tipo_usuario;?></label>
            <button type="submit" class="btn btn-lg btn-outline-info m-4"><a href="../AtualizarPerfil">Alterar
                    dados</a></button>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>