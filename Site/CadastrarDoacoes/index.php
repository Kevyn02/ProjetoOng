<?php
    session_start();
    if(!isset($_SESSION['id_usuario'])){
        header('Location: ../Login');
    }
    include('../database/conn.php');
    $sql="SELECT * FROM produtos";
    $resultado=$conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../Menu/menu.css" />
    <link rel="icon" href="../Menu/logoigreja.png" type="image/png" sizes="16x16">
    <title>Cadastro de doações</title>
</head>

<body>
    <?php require '../Menu/menu.php';?>
    <main class="container d-flex justify-content-start primary">
        <div class="row">
            <div class="text-left display-4 my-2 col-12">
                <h1>Cadastro de Doações</h1>
                <hr />
            </div>
            <form action="insertDoacao.php" class="col-12" method="POST">
                <div class="form-group text-left">
                    <label>Quantidade: </label>
                    <input type="text" name="quantidade" class="form-control" required>
                </div>
                <div class="form-group text-left">
                    <label>O que foi doado?</label>
                    <select name="produto" id="produto" class="form-control" required>
                    </select>
                </div>
                <button type="submit" class="btn btn-lg btn-outline-success m-2">Cadastrar</button>
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="../Mascaras/js/jquery.mask.min.js"></script>
    <script src="../CadastrarProdutos/js/mask-val.js"></script>
    <script src="js/produtos.js"></script>
</body>

</html>