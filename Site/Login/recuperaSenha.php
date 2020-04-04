<?php
    include '../database/conn.php';
    date_default_timezone_set('America/Sao_Paulo');

    if(isset($_GET['token'])){
        $token = $_GET['token'];
        $sql = "SELECT * FROM token, usuarios WHERE token.token = '$token' AND token.email = usuarios.email";
        $resultado = $conn->query($sql);
        if($resultado->num_rows > 0){
            while($linha = $resultado->fetch_assoc()){
                if(strtotime(date('Y-m-d H:i:s')) >= strtotime($linha['datafinal'])){
                    $del = "DELETE FROM token WHERE token = '$token'";
                    $conn->query($del);
                    header('Location: ../Login');
                }else{
                    $email = $linha['email'];
                }
            }
        }
    }
    else{
        header('Location: ../Login');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar senha</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link rel="stylesheet" href="../Menu/menu.css" />
    <script src="../AdicionarCategoria/js/jquery-3.4.1.min.js"></script>
    <link rel="icon" href="../Menu/logoigreja.png" type="image/png" sizes="16x16">
</head>

<body>
    <?php require "../Menu/menu.php"?>
    <main class="container text-left primary">
        <div class="row">
            <div class="col-12 display-4 text-left">
                <h1>Recuperar Senha</h1>
                <hr />
            </div>
            <form action="updateSenha.php?email=<?php echo $email;?>" class="col-12 col-lg-6" method="POST">
                <div class="form-group text-left">
                    <label for="novaSenha">Nova senha:</label>
                    <input type="password" name="novaSenha" id="novaSenha" class="form-control">
                </div>
                <div class="form-group text-left">
                    <label for="confirmaSenha">Confirme a nova senha:</label>
                    <input type="password" name='confirmaSenha' id="confirmaSenha" class="form-control">
                </div>
                <button type="submit" class="btn btn-lg btn-outline-success mt-3">Enviar</button>
            </form>
        </div>

    </main>
</body>

</html>